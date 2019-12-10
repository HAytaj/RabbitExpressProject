@extends('layout.main')
@section("title","Cart Items")
@section('content')
@if (Session::has("cart"))
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product["item"]["name"]}}</td>
                    <td>${{$product["item"]["price"]}}</td>
                    <td>{!! Form::open(["route" => ["cart.updateSize",$product["item"]["id"]],"method"=>"PUT"]) !!}
                        {{ csrf_field() }}
                        {{Form::select('size',["S"=>"Small","M"=>"Medium","L"=>"Large"], $product["item"]["size"], ["class"=>"form-control","style"=>"width:100px;"])}}
                        <div class="form-group">
                            {{Form::submit('OK',["class"=>"btn btn-primary my-3"])}}
                        </div>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(["route" => ["cart.quantityUpdate",$product["item"]["id"]],"method"=>"PUT"]) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{Form::text('quantity', $product["quantity"], ['class' => 'text-right text-white pr-3','style'=>'width:80px;height:50px;background:rgb(33, 153, 232);border:none;'])}}
                        </div>
                        <div class="form-group">
                            {{Form::submit('Submit',["class"=>"btn btn-primary"])}}
                        </div>
                        {!! Form::close() !!}
                    </td>
                    <td>{!! Form::open(["route" => ["cart.destroy",$product["item"]["id"]],"method"=>"POST"]) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{Form::submit('Delete',["class"=>"btn btn-primary"])}}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Tax for Total Price: {{$tax}}%</strong><br>
            <strong>Total Price: ${{$totalPrice}}</strong> <br>
            <strong>Total Quantities: {{$totalQuantity}}</strong>
        </div>
    </div>
    

    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <hr>
            <a href="{{url('/address/create')}}" type="button" class="btn btn-success">Checkout</a>
            <a class="btn btn-danger float-right" href="/cart/emptyCart">Empty Cart</a>

        </div>
       
    </div>
    @else
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No items in the cart</h2>
        </div>
    </div>
@endif
@endsection 