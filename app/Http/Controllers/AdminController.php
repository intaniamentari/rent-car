<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $admin = Admin::with('user');
            return DataTables::of($admin)
                ->addColumn('user_email', function ($admin) {
                    return $admin->user ? $admin->user->email : 'No Email';
                })
                ->addColumn('user_password', function ($admin) {
                    return $admin->user ? $admin->user->password : 'No User';
                })
                ->make(true);
        }
        return view('admin.admins.tables');
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
    public function store(AdminRequest $request)
    {
        $data = $request->all();

        $data = $request->validated(); // Mengambil data validasi

        // Buat user baru
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'admin'
        ]);

        // Buat admin baru dan kaitkan dengan user yang baru dibuat
        Admin::create([
            'user_id' => $user->id,
            'phone' => $data['phone'],
            'name' => $data['name'],
            'address' => $data['address'],
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin berhasil ditambahkan.');
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
    public function update(AdminEditRequest $request, $id)
    {
        $data = $request->all();

        $admin = Admin::findOrFail($id);
        $user = User::findOrFail($admin->user_id);

        $admin->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);

        $updateUser = [
            'email' => $data['email'],
        ];
        if($data['password'] != null){
            $updateUser['password'] = Hash::make($data['password']);
        };
        $user->update($updateUser);

        return redirect()->route('admins.index')->with('success', 'Admin berhasil diubah.');
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
        $admin = Admin::findOrFail($id);
        $user = User::findOrFail($admin->user_id);

        // Hapus data kendaraan
        $admin->delete();
        $user->delete();

        // Berikan respons bahwa data telah dihapus
        // return redirect()->route('vehicles.index')->with('success', 'Vehicle berhasil dihapus.');
        return response()->json(['message' => 'Admin deleted successfully']);
    }
}
