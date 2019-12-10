@extends('admin.layout.admin')
@section('content')
<h1>{{$country->name}}</h1>
<td><a href="{{url('admin/country/'.$country->id.'/edit')}}" class="btn btn-warning mb-3">Edit</a></td>
<td>
    {!! Form::open(["action" => ["CountriesController@destroy",$country->id],"method"=>"DELETE"])
    !!}
    <div class="form-group">
        {{Form::submit('Delete',["class"=>"btn btn-danger"])}}
    </div>
    {{ csrf_field() }}
    {!! Form::close() !!}
</td>
@endsection