<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable= ['name'];

   public function products()
    {
    	return $this->hasMany(Product::class);
    }


     /**
     *    Scope a query to select category by its name
     * @param $query
     * @param $name
     * @return mixed
     */

     public function scopeCatName($query,$name)
    {
        return $query->where('name','=',$name);
    }

}
