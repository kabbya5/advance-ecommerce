<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function searchTags($query){
        $searchtags = Tag::where('tag_name', 'LIKE', "%{$query}%")
        ->get();
        $output = '';
        if(count($searchtags) > 0){
            $output .= '<ul>';
            foreach($searchtags as $tag){
                $output .='<li id="list" class="my-3 w-full test-gray-600 
                            semibold border-b-2 border-gray-200 
                            transition duration-300
                            hover:font-bold">'.$tag->tag_name .'
                            
                        </li>';
            }
            $output .= '</ul>';
        }else{
            $output .= '<li> No Data Found <li>';
        }
        return $output;

        return view('layouts.navbar._shared._midnav');

    }

    public function search(Request $request){
        $request->validate([
            'search' => 'required',
        ]);

        $query = $request->input('search');
        $tag = Tag::where('tag_name', 'LIKE', "%{$query}%")->first();
        
        $tagProducts = $tag->products()->paginate(1);
        $tagName = $tag->tag_name;
        $productsCount = $tag->products()->count();
        return view('pages.shops_page.shop', compact('tagProducts', 'tagName','productsCount'));



    }
}
