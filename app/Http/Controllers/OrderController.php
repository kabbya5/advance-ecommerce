<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Shipping;
use Cart;
use Session;
use Auth;
use Carbon\Carbon;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Mail\AdminOrder;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\SiteSetting;

class OrderController extends Controller
{
    public function cartCheckout(){
        $shipping = Shipping::where('user_id', Auth::id())->first();
        if($shipping == null){
            $shipping = new Shipping();
        }
        $carts = Cart::content();     
        
        return view('pages.cart.checkout',compact('shipping','carts'));
    }

    public function deliveryMethod(Request $request){
        Session::forget('charge');
        Session::put('charge',[
            'charge' => $request->input('charge')
        ]);
        return response()->json(['success' =>'Successfully Update Delivery Method']); 
    }

    public function paymentMethod(Request $request){
        Session::put('payment',['method'=>$request->input('payment')]);
    }

    public function confirmOrder(Request $request){
        $request->validate([
            'agree' => "required",
            'first_name' => 'required|min:2|max:100',
            'last_name'  => 'required|max:100',
            "address" => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'city' => 'required',
            'zone' => 'required',
        ],[
            'agree.required' => 'You must agree to the Terms and Conditions!'
        ]);

        // insert order 
        $order_code = 'MDBD'. rand();
        
        $input = [
            'user_id' => Auth::id(),
            'order_code' => $order_code,
            'slug' => str_slug($order_code),
            'status' => 0,
            'payment' => Session::get('payment')['method'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        if(Session::has('coupon')){
            $input['coupon'] = Session::get('coupon')['name'];
            $input['discount'] = Session::get('coupon')['discount'];
            $input['subtotal'] = (int)Session::get('coupon')['finalAmount'] + Session::get('charge')['charge'];
        }else{
            $input['subtotal'] = (int)Cart::subtotal() + Session::get('charge')[ 'charge'];
        }
        $order_id = Order::insertGetId($input);

        //insert shipping 

        $shipping = Shipping::where('user_id', Auth::id())->first();

        $data = $request->except(['agree','payment']);
        $data['user_id'] = Auth::id();
        $data['order_id'] = $order_id;

       
        Shipping::create($data);
      
        

        // insert order details
        $cart = Cart::content();

        foreach ($cart as $row) {
            $details = array(
                'order_id' => $order_id,
                'product_id' => $row->id,
                'product_name' => $row->name,
                'color' => $row->options->color,
                'size' => $row->options->size,
                'seller_id' => $row->options->seller_id,
                'quantity' => $row->qty,
                'single_price' => $row->price,
                'total_price' => $row->qty*$row->price,
            );
            OrderDetail::create($details); 
        }

        foreach($cart as $row){
            $product = Product::find($row->id);
            $product->increment('top_rated');

        }


        $this->sendOrderConfirmationMail($input,$data,$cart);
        $this->sendAdminOrderConfirmationMail($input,$data,$cart);
        return redirect()->route('dashboard');
    }
    public function sendOrderConfirmationMail($input,$data,$cart)
    {
        Mail::to($data['email'])->send(new OrderMail($input,$data,$cart));
        Cart::destroy();

    }
    
    public function sendAdminOrderConfirmationMail($input,$data,$cart){
        $email_address = SiteSetting::first()->site_email;
        
        Mail::to($email_address)->send(new AdminOrder($input,$data,$cart));

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        Session::forget('charge');
        Session::forget('payment');
    }
}
