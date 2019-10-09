<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Datatables;
use App\Post;

class UsersController extends Controller
{
    public function index()
     {
    	return view('users'); 	
    
     } 
     public function usersList()
      {
     	// $users = DB::table('users') -> select('*');
     	// return datatables()->of($users)
     	// ->make(true);
        $posts = Post::with('tasks');
        //dd($posts->get());
        // ->rightJoin('tasks', 'posts.id', '=', 'tasks.post_id');
        
         return datatables()->of($posts)
             ->make(true);
     
      } 
}
