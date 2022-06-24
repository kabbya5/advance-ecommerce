<?php

namespace App\Http\Controllers\Admin\SiteSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TermAndCondition;


class TermsAndConditionsController extends Controller
{
    public function create(){
        $terms_create = new TermAndCondition();
        $terms_update = TermAndCondition::first();

        return view('admin.site_setting.terms_and_condition.create_update',compact('terms_create','terms_update'));
    }

    public function store(Request $request){
        TermAndCondition::create(
            $request->all()
        );

        return back()->with('message', 'Successfully Create Terms And Condition');
    }

    public function update(Request $request, $id){
        $term_and_conditon = TermAndCondition::find($id);
        
        $term_and_conditon->update($request->all());

        return back()->with('message', 'Successfully Update Terms And Condition');
    }

    // user view 

    public function terms(){
        $terms = TermAndCondition::first()->terms_and_condition;
        return view('terms_and_policy.terms_and_condition',compact('terms'));
    }
    public function privacy(){
        $privacy = TermAndCondition::first()->privacy_policy;
        return view('terms_and_policy.privacy',compact('privacy'));
    }
    public function retunPolicy(){
        $return_policy = TermAndCondition::first()->return_policy;
        return view('terms_and_policy.return_policy',compact('return_policy'));
    }
}
