<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validate_rule = [
            'username' => ['required', 'string', 'max:128'],
            'password' => ['required', 'string', 'min:5', 'max:8'],
            'captcha' => ['required', 'captcha']
        ];
        $validation = Validator::make($request->all(),$validate_rule,['error' => 'LOGIN GAGAL']);


        if ($validation->fails()) {
            return redirect('login')->with('error','LOGIN GAGAL')->withInput();
        }
        
        $credentials = $request->only('username', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard')->with('success', 'LOGIN SUKSES');
        }
        else{
            return redirect('login')->with('error', 'LOGIN GAGAL');
        }

    }

    public function indexRegister()
    {
        return view('auth.tambah-user');
    }

    public function create(Request $request)
    {
        $validate_rule = [
            'username' => ['required', 'string', 'max:128'],
            'password' => ['required', 'string', 'min:5', 'max:8'],
        ];
        $validation = Validator::make($request->all(),$validate_rule,['error' => 'REGISTER GAGAL']);

        if ($validation->fails()) {
            return redirect('register')->withErrors($validation)->withInput();
        }
        
        $credentials = $request->only('username', 'password');
        $hashedPassword = Hash::make($credentials['password']);
        $user = new User;
        $user->username = $credentials['username'];
        $user->password = $hashedPassword;
        
        if($user->save()){
            return redirect('dashboard')->with('success', 'REGISTER SUKSES');
        } else{
            return redirect('register')->with('error', 'REGISTER GAGAL');
        }

    }

    public function delete(Request $request){
        $id = $request->id;
        $data = User::find($id);
        $data->delete();
        
        return redirect('dashboard')->with('success', 'DELETE SUKSES');
    }

    public function update(Request $request){
        $id = $request->id;
        $data = User::find($id);
        $data->username = $request->username;

        if($request->password != null){
            $data->password = Hash::make($request->password);
        }
        $data->save();
        return redirect('dashboard')->with('success', 'UPDATE SUKSES');
    }

}
