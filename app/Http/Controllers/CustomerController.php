<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerEditRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $admin = Customer::with('user');
            return DataTables::of($admin)
                ->addColumn('user_email', function ($admin) {
                    return $admin->user ? $admin->user->email : 'No Email';
                })
                ->addColumn('user_password', function ($admin) {
                    return $admin->user ? $admin->user->password : 'No User';
                })
                ->make(true);
        }
        return view('admin.customers.tables');
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
    public function store(CustomerRequest $request)
    {
        $data = $request->all();

        $data = $request->validated(); // Mengambil data validasi

        // Buat user baru
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'customer'
        ]);

        // Buat admin baru dan kaitkan dengan user yang baru dibuat
        Customer::create([
            'user_id' => $user->id,
            'phone' => $data['phone'],
            'name' => $data['name'],
            'address' => $data['address'],
            'sim_card' => $data['sim_card']
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerEditRequest $request, $id)
    {
        $data = $request->all();

        $customer = Customer::findOrFail($id);
        $user = User::findOrFail($customer->user_id);

        $customer->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'sim_card' => $data['sim_card']
        ]);

        $updateUser = [
            'email' => $data['email'],
        ];
        if($data['password'] != null){
            $updateUser['password'] = Hash::make($data['password']);
        };
        $user->update($updateUser);

        return redirect()->route('customers.index')->with('success', 'Customer berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan data kendaraan berdasarkan ID
        $customer = Customer::findOrFail($id);
        $user = User::findOrFail($customer->user_id);

        // Hapus data kendaraan
        $customer->delete();
        $user->delete();

        // Berikan respons bahwa data telah dihapus
        // return redirect()->route('vehicles.index')->with('success', 'Vehicle berhasil dihapus.');
        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
