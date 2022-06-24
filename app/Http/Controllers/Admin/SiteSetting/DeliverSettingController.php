<?php

namespace App\Http\Controllers\Admin\SiteSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryCharge;
use DB;

class DeliverSettingController extends Controller
{
    public function index(){
        $charges = DeliveryCharge::all();
        
        return view('admin.site_setting.delivery_charge.index',compact('charges'));
    }
    public function create(){
        $delivery_charge = new DeliveryCharge();
        return view('admin.site_setting.delivery_charge.create',compact('delivery_charge'));
    }

    public function store (Request $request){
        DeliveryCharge::create([
            'text' => $request->text,
            'charge' => $request->charge,
        ]);
        return back()->with('message','Successfully Added');
    }

    public function edit($id){
        $charge = DeliveryCharge::find($id);
        return view ('admin.site_setting.delivery_charge.edit',compact('charge'));
    }
    public function update(Request $request, DeliveryCharge $delivery_charge){
        $delivery_charge->update($request->all());
        return back()->with('message','SuccessFully Update Delivery Charge');
        
    }
    public function destory($id){
        $charge = DeliveryCharge::find($id);
        $charge->delete();
    }
}
