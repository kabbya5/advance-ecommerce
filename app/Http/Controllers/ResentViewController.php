<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResentView;
use Auth;

class ResentViewController extends Controller
{
    public function user_all_resent_view (){
        $products = ResentView::where('user_id',Auth::id())->latest()->paginate(25);
        return view('pages.shops_page.resent_view_page',compact('products'));
    }
}
