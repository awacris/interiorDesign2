<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Combination extends Model
{
    //
     //

     use SoftDeletes;
     
     //
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'product_id',
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
    public function product_option()
    {
        return $this->belongsToMany('App\Models\Option_value');
    }


}
