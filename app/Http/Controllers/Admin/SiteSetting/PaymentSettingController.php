<?php

namespace App\Http\Controllers\Admin\SiteSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;

class PaymentSettingController extends Controller
{
    public function create(){
        $payment_system_create = new PaymentSetting();
        $payment_system_update = PaymentSetting::first();

        return view('admin.site_setting.payment_setting.create_payment_system',compact('payment_system_create','payment_system_update'));
    }
    public function store(Request $request){
        PaymentSetting::create(
            $request->all()
        );

        return back()->with('message', 'Successfully Create Payment Setting');
    }

    public function update(Request $request, $id){
        $term_and_conditon = PaymentSetting::find($id);
        
        $term_and_conditon->update($request->all());

        return back()->with('message', 'Successfully Update Payment Setting');
    }
}
