<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Post::all();
        // return $posts;
        //return view('posts.index',compact('posts'));
         return view('posts.index',['posts'=>$posts]);


        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //For database
        //$posts = DB::select('select *from posts');        
        //$posts = Post::orderBy('title','desc')->paginate(1);
        //return view('posts.index')->with('posts',$posts);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
         request()->validate([
            'title' => ['required','min:3','max:255'] ,
            'description' =>  ['required','min:10','max:255']
        ]);
         //Post::create(request(['title','description']));
        $post = new post();
        $post->title =request('title');
        $post->body= request('description');
        $post->save();
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $post = Post::findorFail($id);
        return view('posts.show',compact('post'));        
        //return view('posts.show')->with('postt',$postt);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $id;
        $post= Post::where('id',$id)->first();
        // dd($post);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post= Post::findorFail($id);
       $post->title= request('title');
       $post->body= request('description');
       $post ->save();
       return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findorFail($id)->delete();
        return redirect('/posts');

   }
   public function view(){
    //return view('posts.demo');
    return view('image');
   }
    public function demo()
     {
       return view('imagedemo');    
    
     } 
}
