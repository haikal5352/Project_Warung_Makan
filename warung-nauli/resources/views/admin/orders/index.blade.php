@extends('layouts.admin')

@section('content')
<h1>Daftar Pesanan</h1>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Pelanggan</th>
      <th>Alamat</th>
      <th>Total</th>
      <th>Status</th>
      <th>Detail</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->customer_name }}</td>
        <td>{{ $order->address }}<br>{{ $order->phone }}</td>
        <td>Rp{{ number_format($order->total_price,0,',','.') }}</td>
        <td>{{ ucfirst($order->status) }}</td>
        <td>
          <ul>
            @foreach($order->orderItems as $item)
              <li>{{ $item->menu->name }} × {{ $item->quantity }}</li>
            @endforeach
          </ul>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
