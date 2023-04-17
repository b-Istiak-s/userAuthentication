<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $admin = new Admin();

        $admin->phone_number = $request->input('phone_number');
        $admin->password = Hash::make($request->input('password'));

        $admin->save();

        return response()->json([
            'message' => 'Successfully created admin account',
            'value' => 'succeed'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, $phone_number)
{
    $admin = Admin::where('phone_number', $phone_number)->first();

    if (!$admin) {
        return response()->json([
            'message' => 'Admin not found',
            'value' => 'error'
        ], 404);
    }

    // Check the previous password
    $previousPasswordMatches = Hash::check($request->input('previous_password'), $admin->password);
    if (!$previousPasswordMatches) {
        return response()->json([
            'message' => 'Incorrect previous password',
            'value' => 'error'
        ], 400);
    }

    $admin->phone_number = $request->input('phone_number');
    $admin->password = Hash::make($request->input('password'));

    $admin->save();

    return response()->json([
        'message' => 'Successfully updated',
        'value' => 'updated',
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
