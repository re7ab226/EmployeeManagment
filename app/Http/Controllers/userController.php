<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Tables\Users;
use Illuminate\Http\Request;
use App\Http\Requests\storeUserRequest;
use ProtoneMedia\Splade\Facades\Splade;
use App\Http\Requests\updateUserRequest;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.users.index",[
            "users"=>Users::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeUserRequest $request,User $user)
    {
        $user->create($request->validated());
        Splade::toast('user Created')->autoDismiss('3');
        return to_route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("admin.users.edit",compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateUserRequest $request, user  $user)
    {
        $user->update($request->validated());
        Splade::toast('user updated')->autoDismiss('3');//message
       return to_route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Splade::toast('user Deleted')->autoDismiss('3');//message

        return to_route('admin.users.index');
    }
}