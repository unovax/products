@extends('layouts.app')

@section('content')

<div class="container shadow p-5 text-center">

  <h1>Carrito de Compras</h1>

  <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">SubTotal</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($orders as $key => $order): ?>
        <?php foreach ($products as $key => $prd): ?>
          <?php if ($prd['product_id'] == $order['product_id']): ?>
            <tr>
            <th scope="row">{{$order['order_id']}}</th>
            <td>{{$prd['name']}}</td>
            <td>{{$prd['price']}}</td>
            <td>{{$order['quantity']}}</td>
            <td>{{$prd['price'] * $order['quantity']}}</td>

            <td>

              <?php if ($order['status']): ?>
                 True
              <?php endif; ?>
              <?php if (!$order['status']): ?>
                 False
              <?php endif; ?>

            </td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>

    <tr>



  </tbody>
</table>





</div>

@endsection
