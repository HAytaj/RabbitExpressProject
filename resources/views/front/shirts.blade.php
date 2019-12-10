@extends('layout.main')
@section('title', "Products")
@section('content')

<!-- products listing -->
 <!-- All SHirts -->
<h1 class="text-center">All Products</h1>
@include('inc.products',["products"=>$products])
{{$products->links()}}

@endsection