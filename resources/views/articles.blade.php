@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<div class="container shadow p-5 mx-auto text-center">
    <h1>Articulos en Venta</h1>
  <div class="card-deck mt-5 mx-auto">
    <?php foreach ($articles as $key => $value): ?>

      <form class="" action="{{route('carrito.crear')}}" method="post">


        @csrf
        <input
          type="text"
          name="product_id"
          placeholder="id"
          class="form-control mb-2"
          value="{{$value['product_id']}}"
          hidden
        />
      <input
        type="text"
        name="name"
        placeholder="Nombre"
        class="form-control mb-2"
        value="{{$value['name']}}"
        hidden
      />
      <input
        type="number"
        name="price"
        placeholder="Precio"
        hidden
        class="form-control mb-2"
        value="{{$value['price']}}"
      />
      <?php if (Auth::user()): ?>
        <input
          type="number"
          name="client_id"
          placeholder="Precio"
          hidden
          class="form-control mb-2"
          value="{{Auth::user()->id}}"
        />
      <?php endif; ?>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$value['name']}}</h5>
          <p class="card-text">${{$value['price']}} Pesos</p>

          <button class="btn btn-dark btn-block" type="submit">Agregar</button>
        </div>
      </div>
      </form>
    <?php endforeach; ?>

  </div></div>

@endsection

<style media="screen">
@media (max-width: 767px) {
  .container{
    width: 100%;
  }
}
.container{
  width: 25%;
}
  .head{
    padding: 10px;
    border-bottom-style: solid;
    border-width: .5px;
  }
  .buton{
    background-color: gray;
  }
</style>
