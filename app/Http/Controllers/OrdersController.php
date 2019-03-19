<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ListBreads;
use App\ListSauces;
use App\ListTastes;
use App\ListVegetables;
use App\Meal;
use App\Order;

class OrdersController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // find the open meal
        $meal = Meal::where('status', 'open')->first();
        // we can only order on an open meal
        if ($meal) {
            // if user already ordered, let him change it instead
            $order = Order::where('meal_id', $meal->id)->where('user_id', Auth::user()->id)->first();
            if ($order) {
                return redirect('/orders/'.$order->id.'/edit');
            }
            // populate with previous order in present
            $order = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            if ($order) {
                $order->vegetables = explode(',', $order->vegetables);
            }
            // new order
            else {
                $order = new Order();
                $order->vegetables = array();
            }
            // we need our dynamic ingridients to build form
            $breads = ListBreads::All();
            $sauces = ListSauces::All();
            $tastes = ListTastes::All();
            $vegetables = ListVegetables::All();
            return view('order.create', [
                'order'=>$order,
                'breads'=>$breads,
                'sauces'=>$sauces,
                'tastes'=>$tastes,
                'vegetables'=>$vegetables,
            ]);
        }
        // no open meal, go home
        else {
            return redirect('/home')->with('error', 'No open meal');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // join our vegetables
        $request->merge(['vegetables' => implode(",", $request->vegetables)]);
        // validate data
        $validatedData = $request->validate([
            'bread' => 'required|max:255',
            'bread_size' => 'required|max:255',
            'baked' => 'required',
            'taste' => 'required|max:255',
            'extras' => 'required|max:255',
            'vegetables' => 'required|max:1000',
            'sauce' => 'required|max:255',
        ]);
        // we need an open meal
        $meal = Meal::where('status', 'open')->first();
        if ($meal) {
            // add order
            $order = Order::firstOrCreate(['user_id'=>Auth::user()->id, 'meal_id'=>$meal->id], $validatedData);
            // go home
            return redirect('/home')->with('success', 'Order is placed');
        } 
        // no open meal is a failure
        else {
            // go home
            return redirect('/home')->with('error', 'No open meal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find order for this user
        $order = Order::where('user_id', Auth::user()->id)->findOrFail($id);
        // if meal is still open
        if ($order->meal->status == 'open')
        {
            // adapt order vegetables
            $order->vegetables = explode(',', $order->vegetables);
            // dynamic lists to build form
            $breads = ListBreads::All();
            $sauces = ListSauces::All();
            $tastes = ListTastes::All();
            $vegetables = ListVegetables::All();
            // display form
            return view('order.edit', [
                'order'=>$order,
                'breads'=>$breads,
                'sauces'=>$sauces,
                'tastes'=>$tastes,
                'vegetables'=>$vegetables,
            ]);
        }
        // else order cant be changed
        else {
            return redirect('/home')->with('error', 'Meal already closed');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // join our vegetables
        $request->merge(['vegetables' => implode(",", $request->vegetables)]);
        // validate data
        $validatedData = $request->validate([
            'bread' => 'required|max:255',
            'bread_size' => 'required|max:255',
            'baked' => 'required',
            'taste' => 'required|max:255',
            'extras' => 'required|max:255',
            'vegetables' => 'required|max:1000',
            'sauce' => 'required|max:255',
        ]);
        // we need an open meal
        $meal = Meal::where('status', 'open')->first();
        if ($meal) { 
            // change order by user/meal to prevent users from changing each others orders
            $order = Order::updateOrCreate(['user_id'=>Auth::user()->id, 'meal_id'=>$meal->id], $validatedData);
            // go home
            return redirect('/home')->with('success', 'Order is replaced');
        } 
        // fail to home
        else {
            return redirect('/home')->with('error', 'No open meal');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
