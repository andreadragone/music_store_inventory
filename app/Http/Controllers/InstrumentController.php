<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
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
        $instruments = Instrument::all();
        return view('instruments.list')->with('instruments', $instruments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('instruments.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = Category::all();
        $request->validate([
            'model' => 'required', 'brand' => 'required', 'quantity' => 'required', 'category_id' => 'required'
        ]);
        Instrument::create([
            'model' => $request->model, 'brand' => $request->brand, 'quantity' => $request->quantity, 'category_id' =>$request->category_id
        ]);
        return redirect()->route('instruments.index')->with('categories', $categories)->with('success', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function show(Instrument $instrument)
    {
        return view('instruments.show')->with('instrument', $instrument);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrument $instrument)
    {
        return view('instruments.edit')->with('instrument', $instrument);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instrument $instrument)
    {
        $request->validate(['model' => 'required', 'brand' => 'required']);
        $instrument->update([
            'model' => $request->model,
            'brand' => $request->brand,
            'quantity' => $request->quantity
        ]);
        return redirect('/cars')
            ->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrument $instrument)
    {
        $instrument->delete();
        return redirect()->route('instruments.index')->with('success', 'Item deleted successfully.');
    }
}
