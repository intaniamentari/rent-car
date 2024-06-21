<?php

namespace App\Http\Controllers;

use App\Models\RentCar;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('landing_page.car-book')->with('vehicles', $vehicles);
    }

    public function landingPage()
    {
        $vehicles = Vehicle::all();
        return view('landing_page.index', compact('vehicles'));
    }

    public function checkAvailableVehicle(Request $request)
    {
        $startRent = $request->input('start_rent');
        $finishRent = $request->input('finish_rent');
        $vehicle = Vehicle::find($request->input('vehicle'));


        // Mengonversi string tanggal menjadi objek Carbon
        $startDate = Carbon::parse($startRent);
        $endDate = Carbon::parse($finishRent);

        // Menghitung jumlah hari antara dua tanggal
        $days = $startDate->diffInDays($endDate);

        $price = $vehicle->charge * $days;

        info([
            'days' => $days,
            'start_date' => $startDate->toDateString(),
            'end_date' => $endDate->toDateString(),
            'unit_price' => $vehicle->charge,
            'total' => $price
        ]);

        return response()->json([
            'status' => 'success',
            'vehicle' => $vehicle->id,
            'days' => $days,
            'start_date' => $startDate->toDateString(),
            'end_date' => $endDate->toDateString(),
            'unit_price' => $vehicle->charge,
            'total' => $price
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RentCar::create([
            'customer_id' => auth()->user()->id,
            'vehicle_id' => $request->vehicle_id,
            'start_rent' => $request->start_rent,
            'end_rent' => $request->end_rent,
            'unit_price' => $request->unit_price,
            'total_price' => $request->total_price,
        ]);

        return response()->json([
            'status' => 'success'
        ]);
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
        //
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
        //
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
