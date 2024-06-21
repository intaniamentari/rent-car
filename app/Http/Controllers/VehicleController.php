<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

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
        if ($request->file('image')) {
            // Buat nama file baru dengan UUID dan ekstensi asli
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();

            // Simpan file dengan nama baru di direktori 'public/uploads'
            $path = 'storage/' . $image->storeAs('uploads', $imageName, 'public');
        } else {
            $path = 'takde';
        }

        Vehicle::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'vehicle_number' => $request->vehicle_number,
            'charge' => $request->charge,
            'mileage' => $request->mileage,
            'transmission' => $request->transmission,
            'seats' => $request->seats,
            'lunggage' => $request->lunggage,
            'fuel' => $request->fuel,
            'image' => $path,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle berhasil ditambahkan.');
    }

    public function showAllVehicle()
    {
        $vehicles = Vehicle::all();

        return view('landing_page.car', compact('vehicles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('landing_page.car-single', compact('vehicle'));
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

        if ($request->file('image')) {
            // Buat nama file baru dengan UUID dan ekstensi asli
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();

            // Simpan file dengan nama baru di direktori 'public/uploads'
            $path = 'storage/' . $image->storeAs('uploads', $imageName, 'public');
        } else {
            $path = 'takde';
        }

        $vehicle->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'vehicle_number' => $request->vehicle_number,
            'charge' => $request->charge,
            'mileage' => $request->mileage,
            'transmission' => $request->transmission,
            'seats' => $request->seats,
            'lunggage' => $request->lunggage,
            'fuel' => $request->fuel,
            'image' => $path,
        ]);

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
        return response()->json(['message' => 'Vehicle deleted successfully']);
    }
}
