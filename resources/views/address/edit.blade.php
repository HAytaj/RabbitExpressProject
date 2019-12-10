@extends('admin.layout.admin')
@section("title","Edit Address Form")
@section('content')
<h1>Shipping Information</h1>
<div class="col-md-6 col-md-offset-3">
       {!! Form::open(["action" => ["AddressesController@update",$address->id],"method"=>"PUT"]) !!}
       <div class="form-group">
              {{Form::label('address', 'Enter Address')}}
              {{Form::text('address', $address->address, ['class' => 'form-control'])}}
       </div>
       <div class="form-group">
              {{Form::label('city', 'Enter City')}}
              {{Form::text('city', $address->city, ['class' => 'form-control'])}}
       </div>
       <div class="form-group">
              {{Form::label('country', 'Enter Country')}}
              {{Form::text('country', $address->country, ['class' => 'form-control'])}}
       </div>
       <div class="form-group">
              {{Form::label('zip', 'Enter Zip')}}
              {{Form::number('zip', $address->zip, ['class' => 'form-control'])}}
       </div>
       <div class="form-group">
              {{Form::submit('Submit',["class"=>"btn btn-primary"])}}
       </div>
       {{ csrf_field() }}
       {!! Form::close() !!}
</div>
@endsection