@extends('admin.layout.admin')
@section('content')
<h1>Add Country</h1>
<div class="row">
       <div class="col-md-6 col-md-offset-3">
              {!! Form::open(["action" => "CountriesController@store","method"=>"POST"])
              !!}
              <div class="form-group">
                     {{Form::label('name', 'Enter name')}}
                     {{Form::text('name', '', ['class' => 'form-control'])}}
              </div>
              <div class="form-group">
                     {{Form::label('code', 'Enter code')}}
                     {{Form::text('code', '', ['class' => 'form-control'])}}
              </div>
              <div class="form-group">
                     {{Form::submit('Submit',["class"=>"btn btn-primary"])}}
              </div>
              {{ csrf_field() }}
              {!! Form::close() !!}
       </div>
</div>
@endsection