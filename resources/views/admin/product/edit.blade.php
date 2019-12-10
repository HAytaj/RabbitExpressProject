@extends('admin.layout.admin')
@section('content')
    <h1>Edit Product</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                {!! Form::open(["action" => ["ProductsController@update",$product->id],"method"=>"PUT","enctype"=>"multipart/form-data"]) !!}
                <div class="form-group">
                       {{Form::label('name', 'Enter name')}}
                       {{Form::text('name', $product->name, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                            {{Form::label('Price', 'Enter price')}}
                            {{Form::number('price', $product->price, ['class' => 'form-control'])}}
                     </div>
                <div class="form-group">
                        {{Form::label('description', 'Enter description')}}
                        {{Form::textarea('description', $product->description, ['class' => 'form-control'])}}
                 </div>
                 <div class="form-group">
                        {{Form::label('size', 'Enter size')}}
                        {{Form::select('size',["S"=>"Small","M"=>"Medium","L"=>"Large"], $product->size, ["class"=>"form-control",'placeholder' => 'Pick a size'])}}
                 </div>
                 <div class="form-group">
                        {{Form::label('category_id', 'Enter category')}}
                        {{Form::select('category_id',$categories, $product->category->id, ["class"=>"form-control",'placeholder' => 'Pick a category'])}}
                 </div>
                 <div class="form-group">
                        {{Form::label('image', 'Choose Image')}}
                     {{Form::file("image_name", ["class"=>"form-control"])}}
                 </div>
                 <div class="form-group">
                        {{Form::submit('Submit',["class"=>"btn btn-primary"])}}
                 </div>
                 {{ csrf_field() }}
            {!! Form::close() !!}
        </div>
    </div> 
@endsection 