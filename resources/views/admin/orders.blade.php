@extends('admin.layout.admin')
@section('content')
<h3 class="text-left">Orders</h3>
<ul class="list-group">
    @foreach ($orders as $order)
    <li class="list-group-item">
        <h4 class="text-left">{{$order->user->name}}'s orders</h4>
        <h5 class="text-right">Total:${{$order->total}}</h5>

        {!! Form::open(["route" => ["orders.changeOrderStatus", $order->id],"method"=>"POST","class"=>"float-right"]) !!}

        <div class="form-group text-right"><input type="checkbox" class="delivered-input"  name="delivered" value="1" {{$order->delivered=="1"? "checked" : ""}}></div>
        {{ csrf_field() }}
        <div class="form-group text-right"> <input type="submit" class="btn btn-primary float-right" value="Submit"></div>
        {!! Form::close() !!}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                <tr>
                    <td>{{$product->pivot->quantity}}</td>
                    <td>${{$product->pivot->total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
    </li>
</ul>
@endsection
