<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = User::all();

        foreach($datas as $data){
            $data->CreateTime = date('d/m/Y ', strtotime($data->CreateTime));
        }

        

        if(Auth::check()){
            return view('dashboard', compact('datas'));
        }
        else{
            return redirect('login');
        }
    }

    public function edit(Request $request){
        $id = $request->id;
        $data = User::find($id);
        
        return view('auth.edit', compact('data'));
    }
}
