<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Meal;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // check for current open order
        $meal = Meal::where('status', 'open')->first();
        $order = false;
        if (isset($meal->id)) {
            $order = Order::where('user_id', Auth::user()->id)->where('meal_id', $meal->id)->first();
        }
        // list previous orders
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        // show home
        return view('home', ['order'=>$order, 'orders'=>$orders, 'meal'=>$meal]);
    }
}
