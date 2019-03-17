<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'meal_id', 'bread', 'bread_size', 'baked', 'taste', 'extras', 'vegetables', 'sauce',
    ];

    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the meal to which the order is made
     */
    public function meal()
    {
        return $this->belongsTo('App\Meal');
    }
}
