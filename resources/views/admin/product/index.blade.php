@extends('admin.layout.admin')
@section('content')
    <h3>Admin</h3>
    @if (count($products) > 0)
        @include('admin.layout.includes.products')
        {{$products->links()}}
    @else
        <h1>No Products</h1>
    @endif
@endsection