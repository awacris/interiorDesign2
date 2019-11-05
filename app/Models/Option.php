<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
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
    public function option_values()
    {
        return $this->hasMany('App\Models\Option_value');
    }

}
