<?php

namespace App\Http\Controllers;

use App\ContohAxio;
use App\Http\Resources\ContohAxiosResource;
use Illuminate\Http\Request;

class ContohAxiosController extends Controller
{
    public function index(){
        $users = ContohAxio::orderBy('id', 'desc')->get();
        
        return ContohAxiosResource::collection($users);
        // return view('welcome', compact($users));
    }

    public function store(Request $request){

        $user = ContohAxio::create([
            'nama' => $request->nama
        ]);

        return $user;
    }

    public function delete($id){
        ContohAxio::destroy($id);
        return 'deleted';
    }

    public function edit(Request $request, $id){
        $user= ContohAxio::find($id);
        $user->update([
            'nama' => $request->nama
        ]);
        return $user;
    }
}
