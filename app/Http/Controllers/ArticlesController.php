<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ArticlesController extends Controller
{
    public function index(){
      $articles = Product::all();
      return view('articles', ['articles'=> $articles]);
    }
    public function edit(){
      $articles = Product::all();
      return view('admArticles', ['products'=> $articles]);
    }
    public function update(Request $request){



      $producto = Product::where('product_id', $request->product_id)->get();
      return view('admArticlesUpdate', ['products'=> $producto[0]]);
    }
    public function updateItem(Request $request){
      $producto = Product::where('product_id', $request->id);
      $producto -> update(['name'=> $request->name, 'price' => $request->price]);
      return redirect('/admArticulos');

  }


}
