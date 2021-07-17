<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Client;
use App\Product;
use Auth;
class CarritoController extends Controller
{
  public function __construct()
  {
   $this->middleware('auth');
  }
  public function index(){
    //  $client = Client::where('user_id', Auth::user()->id)->get();
    //  $order = Order::where('client_id', $client[0]->client_id);
      //


      //  return view('carrito', ['shop'=>$order,'products'=>$products]);


    $client = Client::where('user_id', Auth::user()->id)->get();

    $order = Order::where('client_id', $client[0]->id)->get();

    $products = Product::all();



    return view('carrito', ['orders'=>$order,'products'=>$products]);

  }

  public function crear(Request $request)
  {
        $client_id = Client::where('user_id', $request->client_id)->get();
        $new = new Order;
        $new->client_id = $client_id[0]->client_id;
        $new->product_id = $request->product_id;
        $new->quantity = 1;
        $new->status = False;


        $new->save();

       return back()->with('mensaje', 'Nota agregada');
  }

}
