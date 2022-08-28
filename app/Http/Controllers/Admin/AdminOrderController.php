<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentSetting;
class AdminOrderController extends Controller
{
    public function index(){
        $orders = Order::latest()->paginate(20);
        return view('admin.orders.index',compact('orders'));
    }

    public function view(Order $order){

        return view('admin.orders.show',
        [
            'order' => $order,
            'payment_system' => PaymentSetting::first()->payment_setting,
        ]);
    }

    public function acceptOrder(Order $order){
        $order->update([
            'status' => 1
        ]);
        return back()->with('message','successfully Order Accepted');
    } 

    public function processOrder(Order $order){
        $order->update([
            'status' => 2
        ]);
        return back()->with('message','successfully Order Processing');
    }
    public function deliveryOrder(Order $order){
        $order->update([
            'status' => 3
        ]);
        return back()->with('message','successfully Order Deliveried');
    }
    public function cncleOrder(Order $order){
        $order->update([
            'status' => 4
        ]);
        return back()->with('message','successfully Order Cancled');
    }

}
