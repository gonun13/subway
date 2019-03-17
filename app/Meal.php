<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status',
    ];

    /**
     * A meal can have multiple orders
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
