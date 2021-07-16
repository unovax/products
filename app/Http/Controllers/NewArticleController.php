<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class NewArticleController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('admincheck');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
      return view("newArticle");
  }

  public function crear(Request $request)
  {

        $request->validate([
          'name' => 'required',
          'price' => 'required'
        ]);
        $new = new Product;
        $new->name = $request->name;
        $new->price = $request->price;

        $new->save();

       return back()->with('mensaje', 'Nota agregada');
  }

}
