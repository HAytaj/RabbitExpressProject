@extends('admin.layout.admin')
@section('content')
<div class="row mb-3">
    <button type="button" class="btn btn-primary float-right col-md-6 col-sm-6" data-toggle="modal"
        data-target="#exampleModal">
        Add Category
    </button>
</div>
<div class="row">
    <div class="col-md-4">
        {{-- Category List--}}
        <ul class="list-group">
            @foreach ($categories as $category)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-6"><a class="float-left"
                            href="{{url('admin/categories/'.$category->id)}}">{{$category->name}}</a></div>
                    <div class="col-md-6">
                         {{--Edit Btn--}}
                         <a data-toggle="modal" data-target="#exampleModal_{{$category->id}}"
                                class="btn btn-warning float-right mb-1"
                                href="{{url('admin/categories/'.$category->id.'/edit')}}">Edit</a>

                        {!! Form::open(["action" => ["CategoriesController@destroy",
                        $category->id],"method"=>"DELETE","class"=>"float-right"]) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{Form::submit('Delete',["class"=>"delete-btn btn btn-danger"])}}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>


                <!-- Edit Modal -->
                <div class="modal fade" id="exampleModal_{{$category->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(["action" =>
                                [ "CategoriesController@update",$category->id],"method"=>"PUT"]) !!}
                                <div class="form-group">
                                    {{Form::label('name', 'Enter category')}}
                                    {{Form::text('name', $category->name, ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('parent_id', 'Enter Parent category')}}
                                    {{Form::select('parent_id',$selectCategories, $category->parent_id, ["class"=>"form-control",'placeholder' => 'Pick a category'])}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                {{ csrf_field() }}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal -->
            </li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-8">

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
        <div>
            <h2>No products</h2>
        </div>
        @endif
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(["action" =>
                "CategoriesController@store","method"=>"POST"]) !!}
                <div class="form-group">
                    {{Form::label('name', 'Enter category')}}
                    {{Form::text('name', '', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('parent_id', 'Enter Parent category')}}
                    {{Form::select('parent_id',$selectCategories, null, ["class"=>"form-control",'placeholder' => 'Pick a category'])}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    $(document).on("ready",function(){
            $(".delete-btn").on("click",function(){
            if(!confirm("Are you sure?"))
            {
                return false;
            }
});
        });
</script>
@endsection