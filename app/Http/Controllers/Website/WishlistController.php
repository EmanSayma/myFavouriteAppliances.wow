<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class WishlistController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {


     $wishlists = DB::table('wishlists')
            ->where('user_id', '=', Auth::id())
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('wishlists.*', 'products.*','categories.*')
            ->get();                        
 

                       
      return view('website.wishlist.index',compact('wishlists'));                       
    }
    /* function store wishlist
    *
    */

    public function store(Request $request)
    {
         
         if($request->get('button_action')== "store")
         {  
          $wishlist= Auth::User()->wishlists()->create([
          	'user_id'=>  Auth::id(),
          	'product_id' =>$request->product_id
          ]);
    	  echo json_encode('Wishlist Item Inserted');
        }
    }

    

    /* function delete wishlist
    *
    */

  /*  public function delete(Request $request)
    {
                  	 echo json_encode(Auth::id(),$request->input('product_id'));

         if($request->get('button_action')== "delete")
         {  

           $wishlist= Wishlist::where('user_id', '=', Auth::id())
                            ->where('product_id', '=', $request->input('product_id'))
                             ->get();
           if($wishlist->delete())
           {
    	  echo json_encode('Wishlist Item Inserted');
    	  }
        }
    }*/
   
}
