<?php

namespace App\Http\Controllers;

use App\Models\Basketballnew;
use Illuminate\Http\Request;
use DB;

class BasketballnewController extends Controller
{


    public function index()
    {
        return Basketballnew::select('id','img','title','content','info')->get();
    }


    public function store(Request $request)
    {
        $request->validate([
            'img'=>'required',
            'title'=>'required',
            'content'=>'required',
            'info'=>'required',
        ]);
        Basketballnew::create($request->post());
        return response()->json([
            'message'=> 'news created successfully',
        ]);
    }


    public function show(Basketballnew $basketballnew, $id)
    {
        $basketballnew = DB::select('select * from basketballnews where id='.$id);

        if($basketballnew){
            return response()->json([
                'message'=> $basketballnew
            ]);
        }
    }


    public function update(Request $request, Basketballnew $basketballnew, $id)
    {

        $basketballnew = Basketballnew::findOrFail($id);

        $this->validate($request, [
            'img' => 'required',
            'title' => 'required',
            'content' => 'required',
            'info' => 'required',
        ]);

        $input = $request->all();

        $basketballnew->fill($input)->save();

        return response()->json([
            'message'=> 'news updated successfully',
        ]);
    }


    public function destroy(Basketballnew $basketballnew, $id)
    {
        $basketballnew = DB::select('Delete from basketballnews where id='.$id);
        return response()->json([
            'message'=> 'news Deleted successfully',
        ]);
    }
}
