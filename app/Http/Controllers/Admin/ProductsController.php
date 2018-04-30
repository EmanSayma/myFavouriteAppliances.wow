<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Yajra\DataTables\Facades\Datatables;
use Validator;
use Illuminate\Validation\Rule;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;



class ProductsController extends Controller
{
    
    private $helperObj;

    /*  constructor 
    *
    *
    */

    public function __construct(Helper $helper)
    {
       $this->helperObj= $helper; 
    }

    /*  function index 
    *   return Products index page
    *
    */
    public function index()
    {
       return response()
             ->view('admin.products.index');
    }

    /* function get Products
    *  return datatable of Products
    *
    */

    public function getProducts()
    {
       $products= Product::select('id','name','created_at');
       return DataTables::of($products)
       ->addColumn('action',function($product){
        return '<a id="'.$product->id.'" class="view btn btn-primary btn-simple btn-xs" href="/admin/products/'.$product->id.'" rel="tooltip" title="View Product"><i class="material-icons">view_headline</i></a>
          <a id="'.$product->id.'" class="edit btn btn-primary btn-simple btn-xs" href="#" rel="tooltip" title="Edit product"><i class="material-icons">edit</i></a>
          <a id="'.$product->id.'" class="delete btn btn-danger btn-simple btn-xs" href="#" rel="tooltip" title="Delete Product"><i class="material-icons">close</i></a>';
       })
       ->editColumn('name', function(Product $product) {
                    return str_limit($product->name, 50, '...');
       })
       ->editColumn('created_at', function(Product $product) {
                    return date('M j,Y', strtotime($product->created_at));
       })
       ->addColumn('checkbox','<input type="checkbox" name="customer_checkbox[]" class="product_checkbox" value="{{$id}}" />')
       ->rawColumns(['checkbox','action'])
       ->make(true);
    }

     /* function show
    *  get Products from DB
    *
    */

    public function show($id)
    {
          return response()
             ->view('admin.products.show',['id'=>$id]);
    }


    /* function post Products
    *  post and update Products
    *
    */

    public function postProduct(Request $request)
    {
      $validation = Validator::make($request->all(),[
        'name'=>'required|min:20|max:255',
        'slug'=>['required','alpha_dash','min:5','max:255',Rule::unique('products','slug')->ignore($request->get('product_id'))],
        'price'=>'required',
        'brand'=>'required',
        'features'=>'required',
        'stock'=>'required',
        'overview'=>'required',
        'cover_image'=>'nullable|mimes:jpeg,bmp,png,jpg|max:1999'
      ]);


      $error_array= array();
      $success_output='';
      if($validation->fails())
      {
         foreach($validation->messages()->getMessages() as $field_name=>$messages)
         {
             $error_array[]= $messages;
         }
      }
      else
      {
          $fields=$request->all(); 

         if($request->get('button_action')== "insert")
         {
          $fileNameToStore= $this->helperObj->storeImage($request);
          $fields['cover_image']=$fileNameToStore;
          $product= Product::create($fields);

          $success_output="New Product Added successfuly";
         }

         if($request->get('button_action')== "update")
         {
          $product=Product::find($request->get('product_id'));
                // handle File upload
              if($request->hasFile('cover_image')){
                  $fileNameToStore= $this->helperObj->storeImage($request);
                  $this->helperObj->deleteImage($product->cover_image);
                  $fields['cover_image']  = $fileNameToStore;
              }
              
          $product->update($fields);

           $success_output="Product updated successfuly";


         }
      }

      $output=array(
        'error'=>$error_array,
        'success'=>$success_output
      );

      echo json_encode($output);
    }


 /* function fetch Products
    *  get Products from DB
    *
    */

    public function fetchProduct(Request $request)
    {
      $id=$request->input('id');
      $product= Product::find($id);

      $output= array(
        'name'=>$product->name,
        'slug'=>$product->slug,
        'price'=>$product->price,
        'brand'=>$product->brand,
        'features'=>$product->features,
        'stock'=>$product->stock,
        'overview'=>$product->overview,
        'cover_image'=>$product->cover_image,
        'category_id'=>$product->category_id,
        'category'=>$product->category->name,
        'category_slug'=>$product->category->cat_slug,
        'date'=>date('M j,Y', strtotime($product->created_at))

      );
      echo json_encode($output);
    }

     /* function delete Products
    *  delete  Products from DB
    *
    */


    public function deleteProduct(Request $request)
    {
      $product= Product::find($request->input('id'));
      if($product->delete())
      {
        $this->helperObj->deleteImage($product->cover_image);
        echo "Product Deleted Successfuly";
      }

    }


     /* function delete multiple Products
    *  delete  Products from DB
    *
    */

    public function deleteMultipleProducts(Request $request)
    {
       $product_id_array= $request->input('id');
        $product= Product::whereIn('id',$product_id_array);
        if($product->delete())
        {
            echo "Data Deleted";
        }
    }

  /*
  * function ckeckSlugUnique
  *
  */
   function ckeckSlugUnique(Request $request){
         $validation = Validator::make($request->all(),[
        'slug'=>['alpha_dash',Rule::unique('products','slug')->ignore($request->get('product_id'))],
      ]);


      $error_array= array();
      if($validation->fails())
      {
         foreach($validation->messages()->getMessages() as $field_name=>$messages)
         {
             $error_array[]= $messages;
         }
      }

       $output=array(
        'error'=>$error_array,
      );

      echo json_encode($output);
    }

}
