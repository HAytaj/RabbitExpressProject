@extends('admin.layout.admin')
@section('content')
<h1>Add City</h1>
<div class="row">
       <div class="col-md-6 col-md-offset-3">
              {!! Form::open(["action" => "CitiesController@store","method"=>"POST"])
              !!}
              <div class="form-group">
                     {{Form::label('name', 'Enter name')}}
                     {{Form::text('name', '', ['class' => 'form-control'])}}
              </div>
              <div class="form-group">
                     {{Form::label('country_id', 'Enter category')}}
                     {{Form::select('country_id',$countries, null, ["class"=>"form-control",'placeholder' => 'Pick a country'])}}
              </div>
              <div class="form-group">
                     {{Form::submit('Submit',["class"=>"btn btn-primary"])}}
              </div>
              {{ csrf_field() }}
              {!! Form::close() !!}
       </div>
</div>
@endsection