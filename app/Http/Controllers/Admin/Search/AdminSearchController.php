<?php

namespace App\Http\Controllers\Admin\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminSearchController extends Controller
{
    public function orderSearch(Request $request){

        $order = $request->input('order_search');
        $order_search = Order::query()->where('order_code', 'LIKE', "%{$order}%")
        ->orWhere('user_id', 'LIKE', "%{$order}%")
        ->get();
        
        return view('admin.orders.search',compact('order_search'));
    }
}
