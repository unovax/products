<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Client;
use App\Product;
class CheckController extends Controller
{
  public function __construct()
  {
   $this->middleware('admincheck');
  }
  public function index(){

    $client = Client::all();

    $order = Order::all();

    $product = Product::all();

    return view('check', ['clients'=>$client, 'orders'=> $order, 'products'=>$product]);
  }

  public function crear(Request $request){

    $order = Order::where('order_id', $request->order_id);
    $orderString = Order::where('order_id', $request->order_id)->get();
    if ($orderString[0]->status){
      $order -> update(['status'=> 0]);
    }
    else{
      $order -> update(['status'=> 1]);
    }
    return back()->with('mensaje', 'Nota agregada');

    /*$request->order -> update([
      'status'=> 1
    ]);
    return back()->with('mensaje', 'Nota agregada');*/
  }

}
