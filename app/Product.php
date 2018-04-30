<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['category_id','name','slug','price','overview','brand','features','stock','cover_image'];
    

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

     /***
     *  Local Scopes
     * *     Scope a query to select products with the same  category-id
     */
    public function scopeOfCat($query, $category_id)
    {
        return $query->where('category_id','=', $category_id);
    }

    /*** Scope a query to select products by its slug
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeBySlug($query,$slug)
    {
        return $query->where('slug','=',$slug);
    }


    public function scopeFilter($query, $filters)
    {

       if($field=  $filters['field'] && $order= $filters['order']   )
       {
          $query->orderBy($field,$order);
        }

    }
}
