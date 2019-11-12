<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function  create(Request $request)
    {
        $user=Auth::id();
        $input=$request;
       Post::create([
           'descripcion'=>$input['description'],
           'user_id'=>$user
       ]);

       return;
    }

    public function index(){
        $cont=0;
        $datos = [];
        $poster=Post::all();
        foreach ($poster as $key => $dato) {
            $datos[$cont] = [
                'description' =>$dato->descripcion,
                'name'=> $dato->user->name,
            ];
            $cont += 1;
        }
            return response()->json($datos);
        }




}
