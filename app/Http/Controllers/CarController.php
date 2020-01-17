<?php

namespace App\Http\Controllers;

use App\Car;
use App\Carstock;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use DataTables;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = Car::all();
        return view('products/cars/index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products/cars/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        //
        $priceString = $request->price;
        $priceNum = str_replace(",", "", $priceString);
        $request->merge(["price" => $priceNum]);

        $firstInsert = $request->except('stock');
        $newCar = Car::create($firstInsert);

        $secondInsert['car_id'] = $newCar->id;
        $secondInsert['total_stock'] = $request->input('stock');
        $secondInsert['current_stock'] = $request->input('stock');
        $carStock = Carstock::create($secondInsert);

        return redirect('products/cars')->with('success', __('Information has been added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
        $currentStock = Carstock::where('car_id', $car->id)->first()->current_stock;
        return view('products/cars/edit', compact('car', 'currentStock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, Car $car)
    {
        //
        $priceString = $request->price;
        $priceNum = str_replace(",", "", $priceString);
        $request->merge(["price" => $priceNum]);

        $firstUpdate = $request->except('stock');
        //$car->update($firstUpdate);

        $carStock = Carstock::where('car_id', $car->id)->first();

        $secondUpdate['current_stock'] = $carStock->current_stock + $request->stock;
        $secondUpdate['total_stock'] = $carStock->total_stock + $request->stock;
        $carStock->update($secondUpdate);

        return redirect('products/cars')->with('success', __('Information has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
        $car->delete();
        return redirect('products/cars')->with('success', __('Information has been deleted'));
    }
}
