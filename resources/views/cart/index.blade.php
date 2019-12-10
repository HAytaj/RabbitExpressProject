@extends('layout.main')

@section('content')

@if (count($products)>0)
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Size</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td><img style="width:200px;height:250px;" src="/storage/product_images/{{$product->image_name}}"
                    alt="{{$product->name}}">
            </td>
            <td>{{$product->name}}</td>
            <td>{{$product->size}}</td>
            <td>{{$product->price}}</td>
        </tr>

        @endforeach
    </tbody>
</table>
@else
<h2>No products</h2>
@endif
@endsection