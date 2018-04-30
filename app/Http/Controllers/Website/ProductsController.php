<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;


class ProductsController extends Controller
{
    public function index($cat_slug)
    {
        $category=Category::catSlug($cat_slug)->first();
        $products= Product::ofCat($category->id)
                   ->latest()
                   ->paginate(5);
         

        return view('website.products.index',compact('products','category'));

    }

    public function show($cat_slug,$slug)
    {
          $category=Category::catSlug($cat_slug)->first();
          $product=Product::bySlug($slug)->first();

          if(Auth::user()){
            $wishlist= Wishlist:: where('user_id', '=', Auth::id())
                            ->where('product_id', '=', $product->id)
                             ->get();
             if($wishlist-> isEmpty()) {
              $wishlist= 'empty';
             }
             else{
              $wishlist= 'notEmpty';
             }               
                      return view('website.products.show', compact('product','category','wishlist'));
                 
          }

          return view('website.products.show', compact('product','category'));
   
    }
}
