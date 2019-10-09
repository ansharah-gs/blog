<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//
	public function tasks()
	{
		return $this->hasMany(Task::class);
		
	}
	public function addTask($task){

		$this->tasks()->create($task);

		 // return Task::create([
   // 		'post_id'=>$this->id,
   // 		'description' =>$description
   	// ]);
	}
}
