@extends('layouts.app')

@section('content')


<div class="container cyan p-5 shadow text-center">


  <?php foreach ($clients as $key => $client): ?>
    <p >Id del Cliente: {{$client['user_id']}} </p>



    <table class="table mt-5 mb-5">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Producto</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">SubTotal</th>
        <th scope="col">Estado</th>
        <th scope="col">Aprobar</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($orders as $key => $order): ?>
        <?php if ($client['id'] == $order['client_id']): ?>

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
              <td>
                <form class="" action="{{ route('check.crear') }}" method="POST">
                  @csrf @method('PATCH')
                  <input
                    type="text"
                    name="order_id"
                    placeholder="id"
                    class="form-control mb-2"
                    value="{{$order['order_id']}}"
                    hidden
                  />


                    <?php if ($order['status']): ?>
                       <button class="btn btn-danger" type="submit" name="button">
                         Anular
                       </button>
                    <?php endif; ?>
                    <?php if (!$order['status']): ?>
                      <button type="submit" class="btn btn-success" name="button">
                        Aprobar
                      </button>
                    <?php endif; ?>

                </form>
              </td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php endif; ?>
      <?php endforeach; ?>

      <tr>



    </tbody>
  </table>

  <?php endforeach; ?>


</div>


@endsection
