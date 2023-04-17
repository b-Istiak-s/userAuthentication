<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;
use App\Models\Child;
use App\Http\Requests\ChildLoginRequest;
use Illuminate\Support\Facades\Hash;


class ChildController extends Controller
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
    public function store(StoreChildRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Child $child)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Child $child)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChildRequest $request, Child $child)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Child $child,$id)
    {
        $user = Child::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function login(ChildLoginRequest $request)
    {
        $child = Child::where('child_username', $request->input('child_username'))->first();

        if ($child && Hash::check($request->input('password'), $child->password)) {
            // login successful, create token

            return response()->json([
                'message' => 'Login successful',
            ]);
        } else {
            // login failed
            return response()->json([
                'message' => 'Invalid child username or password'
            ], 401);
        }
    }
}
