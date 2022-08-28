<?php

namespace App\Http\Controllers\Admin\SiteSetting;

use App\Http\Controllers\Controller;
use App\Http\Requests\AskSiteSettingRequest;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Image;

class SiteSettingController extends Controller
{
    public function setting(){
        $site_setting_update = Sitesetting::first();
        
        $site_setting_create = new SiteSetting();
        
        return view('admin.site_setting.address_setting.create',compact('site_setting_create','site_setting_update'));
    }
    public function settingStore(AskSiteSettingRequest $request){
        
        $setting = new SiteSetting;   
        $setting->site_name =  $request->site_name; 
        $setting->site_email =  $request->site_email; 
        $setting->phone =  $request->phone; 
        $setting->phone2 =  $request->phone2; 
        $setting->address =  $request->address; 
        $setting->facebook_url =  $request->facebook_url;

        $img = $request->file('logo');

        if($img){
            $img_name= date('dmy_H_s_i').'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save(public_path('/media/site_setting/'.$img_name));
            $setting->logo = 'media/site_setting/'.$img_name;                                          
        }

        $setting->save();
        
        return back()->with('message','Successfully Site Setting Create');
    }
    public function settingUpdate(AskSiteSettingRequest $request, $id){

        $setting = SiteSetting::find($id);

        $old_logo = $request->old_logo; 

        $setting->site_name =  $request->site_name; 
        $setting->site_email =  $request->site_email; 
        $setting->phone =  $request->phone; 
        $setting->phone2 =  $request->phone2; 
        $setting->address =  $request->address; 
        $setting->facebook_url =  $request->facebook_url;
        
        $img = $request->file('logo');

        if($img && $old_logo){
            unlink($old_logo);
            $img_name = date('dmy_H_s_i').'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save(public_path('/media/site_setting/'.$img_name));
            $setting->logo = 'media/site_setting/'.$img_name;    
        }elseif($img){
            $img_name = date('dmy_H_s_i').'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save(public_path('/media/site_setting/'.$img_name));
            $setting->logo = 'media/site_setting/'.$img_name;
        }
        $setting->update();
        return back()->with('message','Successfully Site Setting Updated');
    }
}
