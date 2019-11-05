<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
     //

     use SoftDeletes;

    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'name',
        'sku',
        'description',
        'cover',
        'quantity',
        'price',
    ];

       /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


       /**
     * The option_values that belong to the product.
     */
    public function option()
    {
        return $this->belongsToMany('App\Models\Option_value');
    }

      /**
     * The option_values that belong to the product.
     */
    public function category()
    {
        return $this->belongsToMany('App\Models\Category');
    }


    
}
