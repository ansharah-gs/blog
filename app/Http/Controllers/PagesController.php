<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        //dd(\App::environment());
    	$title = 'Welcome to Laravel!';
    	//return view('pages.index', compact('title')) ;
    	return view('pages.index')-> with('title',$title);

    }
    public function about(){
    	$name = 'About Us.';
    	return view('pages.about')->with('name',$name);
    }
    public function services(){
    	$data = array(
    		'title' => 'Services',
    		'services' => ['Web Design','SEO','Programming']
    	);
    	return view('pages.services')->with('data',$data) ;
    }
}
