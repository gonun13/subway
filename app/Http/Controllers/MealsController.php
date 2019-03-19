<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;

class MealsController extends Controller
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
        $meals = Meal::all();
		return view('meal.index', ['meals' => $meals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validade meal
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
        ]);
        // we can only have one open meal
        $meal = Meal::where('status', 'open')->first();
        if ($meal && $validatedData['status']=='open') {
            return redirect('/meals')->with('error', 'There is already an open meal!');
        }
        // create new meal
        $meal = Meal::create($validatedData);
        // go back to meals
        return redirect('/meals')->with('success', 'Meal is successfully saved');
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
        // find meal
        $meal = Meal::findOrFail($id);
        // show edit view
        return view('meal.edit', compact('meal'));
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
        // validate form
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
        ]);
        // we can only have one open meal
        $meal = Meal::where('status', 'open')->first();
        if ($meal && $validatedData['status']=='open') {
            return redirect('/meals')->with('error', 'There is already an open meal!');
        }
        // update meal
        Meal::whereId($id)->update($validatedData);
        // go back to meals
        return redirect('/meals')->with('success', 'Meal is successfully saved');
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
