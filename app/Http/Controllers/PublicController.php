<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Order;

class PublicController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders()
    {
        // check for current open order
        $meal = Meal::where('status', 'open')->first();
        $order = false;
        if (isset($meal->id)) {
            $orders = Order::where('meal_id', $meal->id)->get();
        }
        // show home
        return view('public.orders', ['orders'=>$orders]);
    }
}
