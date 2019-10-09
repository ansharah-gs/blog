<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $guarded=[];

    public function post(){
    	
    	return $this->belongsTo(Post::class);

    }

    public function complete($completed = true){
    	
    	// return $this->update(['complete'=>true]);
    	// return $this->update(['complete'=>$completed]);
    	return $this->update(compact('completed'));
    }
    public function incomplete(){
    	$this->complete(false);

    }
}
