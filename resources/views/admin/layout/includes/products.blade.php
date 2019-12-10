@if (count($products) > 0)
<div class="row">

    @foreach ($products as $product)
    <div class="col-md-6 col-sm-6">
        <div class="card my-3" style="width: 18rem;">
            <img style="width:100%;height:200px;" src="{{route('image', $product->image_name)}}"
                class="card-img-top" alt="{{$product->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">${{$product->price}}</p>
            </div>

            <div class="card-body">
                <a href="{{url('admin/product/'.$product->id)}}" class="card-link btn btn-success">In Detail</a>
                <a href="{{url('admin/product/'.$product->id.'/edit')}}" class="btn btn-primary float-right mx-2">Edit</a>
            </div>
        </div>
    </div>

    @endforeach
</div>
@else
<h1>No Products</h1>
@endif