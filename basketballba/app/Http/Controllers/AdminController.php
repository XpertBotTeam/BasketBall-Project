<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class AdminController extends Controller
{
   
    public function index()
    {
        return admin::select('id','name','email','password')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        admin::create($request->post());
        return response()->json([
            'message'=> 'admin created successfully',
        ]);
    }

    public function show(admin $admin)
    {
        return response()->json([
            'Admin'=> $admin
        ]);
    }


    public function update(Request $request, admin $admin)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $admin->fill($request->post())->update();
        return response()->json([
            'message'=> 'Admin updated successfully',
        ]);
    }

    public function destroy(admin $admin)
    {
        $admin->delete();
        return response()->json([
            'message'=> 'Admin Deleted successfully',
        ]);
    }
}
