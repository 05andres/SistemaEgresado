<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function registeregresado(Request $request)
    {
        $input = $request->all();
        dd($input);
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dni' => ['required', 'string', 'max:255'],
        ]);
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'id_role' => 3,
            'dni'=> $input['dni'],
            'pais'=> $input['pais'],
            'genero'=> $input['genero'],
            'edad' => $input['edad']
        ]);
        return redirect()->back()->with('success','egresado registrado con exito');

    }

    public function listuser(){
        $userlist = User::where('id_role',3)->get();
        return view('auth.listusers')->with(['users'=> $userlist]);
    }
}
