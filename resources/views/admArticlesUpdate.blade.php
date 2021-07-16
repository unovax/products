@extends('layouts.app')

@section('content')

<div class="container shadow text-center p-5">
  <h1 class="mt-3"> Actualizar Producto</h1>
          <form method="POST" action="{{ route('admArticlesUpdate.crear') }}">
          @csrf
          <input
            type="text"
            name="id"
            hidden
            value="{{ $products['product_id'] }} "
            class="form-control mb-2 w-75 mx-auto"
          />
          <input
            type="text"
            name="name"
            value="{{ $products['name'] }} "
            class="form-control mb-2 w-75 mx-auto"
          />
          <input
            type="text"
            name="price"
            value="{{ $products['price'] }} "
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
