<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return User::select('id','name','email','password')->get();
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        User::create($request->post());
        return response()->json([
            'message'=> 'User created successfully',
        ]);
    }


    public function show(User $user)
    {
        return response()->json([
            'User'=> $user
        ]);
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $user->fill($request->post())->update();
        return response()->json([
            'message'=> 'User updated successfully',
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message'=> 'User Deleted successfully',
        ]);
    }

}
