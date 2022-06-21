<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Shiping;
use Cart;
use Session;
use Auth;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Mail\AdminOrder;
use App\Models\OrderDetail;
class OrderController extends Controller
{
    public function cartCheckout(){
        $shipping = Shiping::where('user_id', Auth::id())->first();
        if($shipping == null){
            $shipping = new Shiping();
        }
        $carts = Cart::content();       
        return view('pages.cart.checkout',compact('shipping','carts'));
    }

    public function deliveryMethod(Request $request){
        Session::forget('charge');
        Session::put('charge',[
            'charge' => $request->input('charge')
        ]);
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
        ];
        if(Session::has('coupon')){
            $input['coupon'] = Session::get('coupon')['name'];
            $input['discount'] = Session::get('coupon')['discount'];
            $input['subtotal'] = Session::get('coupon')['finalAmount'] + Session::get('charge')['charge'];
        }else{
            $input['subtotal'] = Cart::subtotal();
        }
        // $order_id = Order::insertGetId($input);

        //insert shipping 
        $data = $request->except('agree');
        $data['user_id'] = Auth::id();
        // $data['order_id'] = $order_id;
        // Shiping::create($data);

        // insert order details
        $cart = Cart::content();
        foreach ($cart as $row) {
            $details = array(
                // 'order_id' => $order_id,
                'product_id' => $row->id,
                'product_name' => $row->name,
                'color' => $row->options->color,
                'size' => $row->options->size,
                'seller_id' => $row->options->seller_id,
                'quantity' => $row->qty,
                'singleprice' => $row->price,
                'totalprice' => $row->qty*$row->price,
            );
            // OrderDetail::save($details); 
        }


        $this->sendOrderConfirmationMail($input,$data,$cart);
        $this->sendAdminOrderConfirmationMail($input,$data,$cart);
        return back();
    }

    public function sendOrderConfirmationMail($input,$data,$cart)
    {
        Mail::to($data['email'])->send(new OrderMail($input,$data,$cart));
        Cart::destroy();

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        Session::forget('charge');
        Session::forget('payment');

    }
    public function sendAdminOrderConfirmationMail($input,$data,$cart){
        
        Mail::to($data['email'])->send(new AdminOrder($input,$data,$cart));
    }
}
