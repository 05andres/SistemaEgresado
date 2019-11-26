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
        $poster=Post::orderBy('created_at','DESC')->get();
        $id = Auth::id();
        $user = User::find($id);
        $rol=$user->isAdmin2();
        foreach ($poster as $key => $dato) {
            $datos[$cont] = [
                'id' =>$dato->id,
                'description' =>$dato->descripcion,
                'name'=> $dato->user->name,
                'fecha'=>$dato->created_at
            ];
            $cont += 1;
        }
            return response()->json([
                'datos'=>$datos,
                'rol'=>$rol
            ]);
        }


        public function delete($id){
        Post::destroy($id);

        return response()->json($id);

        }




}


