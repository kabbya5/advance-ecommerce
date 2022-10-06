<?php
namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\View;

class NavigationComposer {
    public function compose(View $view){
        $this->composeCategories($view );
    }

    private function composeCategories(View $view){
        $categories = Category::with(['products','subcategories'])->take(9)->get();

        $view->with('categories', $categories);

    }
}







