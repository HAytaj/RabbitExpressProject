@extends('admin.layout.admin')
@section('content')
<h1>{{$city->name}}</h1>
<td><a href="{{url('admin/city/'.$city->id.'/edit')}}" class="btn btn-warning mb-3">Edit</a></td>
<td>
    {!! Form::open(["action" => ["CitiesController@destroy",$city->id],"method"=>"DELETE"])
    !!}
    <div class="form-group">
        {{Form::submit('Delete',["class"=>"btn btn-danger"])}}
    </div>
    {{ csrf_field() }}
    {!! Form::close() !!}
</td>
@endsection