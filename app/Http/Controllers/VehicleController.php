<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = Vehicle::query();
            return DataTables::of($users)

                ->make();
        }
        return view('admin.vehicles.tables');
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
    public function store(VehicleRequest $request)
    {
        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehicle berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehicle berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan data kendaraan berdasarkan ID
        $vehicle = Vehicle::findOrFail($id);

        // Hapus data kendaraan
        $vehicle->delete();

        // Berikan respons bahwa data telah dihapus
        // return redirect()->route('vehicles.index')->with('success', 'Vehicle berhasil dihapus.');
        return response()->json(['message' => 'Vehicle deleted successfully']);
    }
}
