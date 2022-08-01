<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Team::select('name','fullName','Description','country','city')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'fullName'=>'required',
            'Description'=>'required',
            'country'=>'required',
            'city'=>'required',
        ]);
        Team::create($request->post());
        return response()->json([
            'message'=> 'Team created successfully',
        ]);
    }

    public function show(Team $team)
    {
        return response()->json([
            'Team'=> $team
        ]);
    }



    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name'=>'required',
            'fullName'=>'required',
            'Description'=>'required',
            'country'=>'required',
            'city'=>'required',
        ]);
        $team->fill($request->post())->update();
        return response()->json([
            'message'=> 'Team updated successfully',
        ]);
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json([
            'message'=> 'Team Deleted successfully',
        ]);
    }
}
