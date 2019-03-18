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
        $breads = ListBreads::All();
        $sauces = ListSauces::All();
        $tastes = ListTastes::All();
        $vegetables = ListVegetables::All();
        return view('order.create', [
            'breads'=>$breads,
            'sauces'=>$sauces,
            'tastes'=>$tastes,
            'vegetables'=>$vegetables,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bread' => 'required|max:255',
            'bread_size' => 'required|max:255',
            'baked' => 'required',
            'taste' => 'required|max:255',
            'extras' => 'required|max:255',
            'vegetables' => 'required|max:1000',
            'sauce' => 'required|max:255',
        ]);
        // identify owner
        $validatedData['user_id'] = Auth::user()->id;
        // we need an open meal
        $meal = Meal::where('status', 'open')->first();
        if ($meal) {
            $validatedData['meal_id'] = $meal->id; 
            // add order
            $order = Order::create($validatedData);
            // go home
            return redirect('/home')->with('success', 'Order is placed');
        } 
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
        $order = Order::findOrFail($id);
        $breads = ListBreads::All();
        $sauces = ListSauces::All();
        $tastes = ListTastes::All();
        $vegetables = ListVegetables::All();
        return view('order.edit', [
            'order'=>$order,
            'breads'=>$breads,
            'sauces'=>$sauces,
            'tastes'=>$tastes,
            'vegetables'=>$vegetables,
        ]);
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
        $validatedData = $request->validate([
            'bread' => 'required|max:255',
            'bread_size' => 'required|max:255',
            'baked' => 'required',
            'taste' => 'required|max:255',
            'extras' => 'required|max:255',
            'vegetables' => 'required|max:1000',
            'sauce' => 'required|max:255',
        ]);
        // identify owner
        $validatedData['user_id'] = Auth::user()->id;
        // we need an open meal
        $meal = Meal::where('status', 'open')->first();
        if ($meal) {
            $validatedData['meal_id'] = $meal->id; 
            // add order
            $order = Order::whereId($id)->update($validatedData);
            // go home
            return redirect('/home')->with('success', 'Order is replaced');
        } 
        else {
            // go home
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
