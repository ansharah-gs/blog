<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Post;

class PostTaskController extends Controller
{
   public function update(Task $task)
   {
      $method = request()->has('completed')?'complete':'incomplete';
      $task->$method();
   	// $task->update([
   	// 	'completed' => request()->has('completed')
   	
   	// ]);
   	return back();
   }
   public function store(Post $post){
    //  $attributes= request()->validate([
    //      'description'=>'required'
    //   ]);
   	// $post->addTask($attributes);
      $post->addTask(
         request()->validate(['description'=>'required'])
      );
   	// Task::create([
   	// 	'post_id'=>$post->id,
   	// 	'description' => request('description')
   	// ]);
   	return back();
   }
}
