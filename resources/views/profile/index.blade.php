@extends("layout.main")
@section('title', "Profile")
@section('content')
<p>Welcome, {{Auth()->user()->name}}:)</p>
<h1 class="text-center">All of Your Orders</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Products</th>
            <th>Total</th>
            <th>Order Created</th>
            <th>Delivered</th>
        </tr>
    </thead>
<tbody>
@foreach ($orders as $order)
    <tr>
        <td>
            @foreach ($order->products as $product)
                <p>{{$product->name}} (${{$product->pivot->total}}) {{$product->pivot->quantity}} of them</p>
            @endforeach
        </td>
        <td>${{$order->total}}</td>
        <td>${{date('d-m-Y', strtotime($order->created_at))}}</td>
        <td><input type="checkbox" {{($order->delivered == 0) ? "":"checked"}} disabled></td>
    </tr>
@endforeach
</tbody>
</table>
@endsection