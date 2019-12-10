@extends("layout.main")
@section('title', "Home")
@section('content')
<div class="text-center">
    <h2>
        Our Latest Products 
    </h2>
</div>

<!-- Latest SHirts -->
@include('inc.products',["products"=>$products])


@endsection