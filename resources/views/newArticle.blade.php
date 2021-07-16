@extends('layouts.app')

@section('content')


<div class="shadow container mx-auto p-5 text-center">

  <h1 class="mb-5">Nuevo Articulo</h1>

  <form method="POST" action="{{ route('notas.crear') }}">
  @csrf
  <input
    type="text"
    name="name"
    placeholder="Nombre"
    class="form-control mb-2 w-75 mx-auto"
  />
  <input
    type="number"
    name="price"
    placeholder="Precio"
    class="form-control mb-2 w-50 mx-auto"
  />
  <button class="btn btn-primary w-25 mt-5" type="submit">Agregar</button>

  <div class="mt-5">

      @error('name')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        El nombre es requerido
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @enderror @if ($errors->has('stock'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        El Stock es requerido
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @enderror @if ($errors->has('precio'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        El precio es requerido
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
  </div>

</form>


</div>


@endsection
