@extends('layouts.app')

@section('content')

<div class="container text-center shadow p-5">
  <h1 class="mt-3 mb-5">Productos</h1>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($products as $key => $prd): ?>

      <tr>
        <th scope="row">{{$prd['product_id']}}</th>
        <td>{{$prd['name']}}</td>
        <td>{{$prd['price']}}</td>

        <td>
          <form action="{{ route('admArticlesUpdate') }}" method="get">
            <input hidden type="text" name="product_id" value="{{$prd['product_id']}}">
            <button class="btn btn-success"  type="submit" name="button">Editar</button>
          </form>

          <button class="btn btn-danger" type="submit" name="button">Eliminar</button>

        </td>

      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>


@endsection
