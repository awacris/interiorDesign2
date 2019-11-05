<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option_value extends Model
{
    protected $table = 'option_values';
    
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
        
        'option_id', 
        'value',
    ];

       /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

      /**
     * Get the option that owns the values.
     */
    public function options()
    {
        return $this->belongsTo('App\Models\Option');
    }
}
