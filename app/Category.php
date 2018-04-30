<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable= ['name','cat_slug'];

   public function products()
    {
    	return $this->hasMany(Product::class);
    }


     /**
     *    Scope a query to select category by its slug
     * @param $query
     * @param $name
     * @return mixed
     */

     public function scopeCatSlug($query,$cat_slug)
    {
        return $query->where('cat_slug','=',$cat_slug);
    }

}
