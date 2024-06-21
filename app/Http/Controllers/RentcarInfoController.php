<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentcarEditRequest;
use App\Http\Requests\RentcarRequest;
use App\Models\Customer;
use App\Models\RentCar;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RentcarInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('name', 'asc')->get();
        $vehicles = Vehicle::orderBy('brand', 'asc')->get();

        if (request()->ajax()) {
            $rentcars = RentCar::with(['customer', 'vehicle'])
                ->get();

            return DataTables::of($rentcars)
                ->addColumn('customer', function ($rentcar) {
                    return $rentcar->customer ? $rentcar->customer->name : 'No Customer';
                })
                ->addColumn('vehicle', function ($rentcar) {
                    return $rentcar->vehicle ? $rentcar->vehicle->brand . ' - ' . $rentcar->vehicle->model : 'No Vehicle';
                })
                ->rawColumns(['customer', 'vehicle'])
                ->make(true);
        }

        return view('admin.rentcars.tables', compact('customers', 'vehicles'));
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
    public function store(RentcarRequest $request)
    {
        RentCar::create($request->all());

        return redirect()->route('rentcar-info.index')->with('success', 'Rentcar berhasil ditambahkan.');
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
    // public function update(RentcarEditRequest $request, $id)
    public function update(Request $request, $id)
    {
        RentCar::where('id', $id)->update([
            'customer_id' => $request->input('customer_id'),
            'vehicle_id' => $request->input('vehicle_id'),
            'start_rent' => $request->input('start_rent'),
            'end_rent' => $request->input('end_rent'),
            'unit_price' => $request->input('unit_price'),
            'total_price' => $request->input('total_price'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('rentcar-info.index')->with('success', 'Rentcar berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan data kendaraan berdasarkan ID
        $vehicle = RentCar::findOrFail($id);

        // Hapus data kendaraan
        $vehicle->delete();

        // Berikan respons bahwa data telah dihapus
        return response()->json(['message' => 'Data Rentcar deleted successfully']);
    }

    public function getVehicleUnitPrice($id)
    {
        $vehicle = Vehicle::find($id);

        if ($vehicle) {
            return response()->json([
                'unit_price' => $vehicle->charge,
            ]);
        }

        return response()->json([
            'error' => 'Vehicle not found',
        ], 404);
    }
}
