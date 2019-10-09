<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductsController extends Controller
{
    public function index(){
    	$products = Product::all();
    	return view('products.index',compact('products'));
    }


    public function create(){

    	return view('products.create');
    }
    
    public function store(Request $request){

        request()->validate([
            'name'=> ['required','min:5'],
            'description'=> ['required','min:5']
        ]);
    	$product = new product();
    	$product->name =request('name');
    	$product->description =request('description');
        $product->save();
        return redirect('/products');
    }

    public function edit($id){
        
        $product= Product::where('id',$id)->first();
        return view('products.edit',compact('product'));
    }

    public function show($id){
        

      $product = Product::findorFail($id);

      return view('products.show', compact('product'));

    }

     public function update(Request $request, $id){
        $product = Product::findorFail($id);
        $product->name= request('name');
        $product->description= request('description');
        $product->save();
        return redirect('/products');
    }

    public function destroy($id){
        $product = Product::findorFail($id)->delete();
        return redirect('/products');
    }

}
