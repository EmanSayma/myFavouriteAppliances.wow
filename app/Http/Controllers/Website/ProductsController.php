<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    public function index($name)
    {
        $category=Category::catName($name)->first();
        $products= Product::ofCat($category->id)
                   ->latest()
                   ->paginate(2);

        return view('website.products.index',compact('products','category'));

    }

    public function show($name,$slug)
    {
          $category=Category::catName($name)->first();
          $product=Product::bySlug($slug)->first();

          return view('website.products.show', compact('product','category'));
   
    }
}
