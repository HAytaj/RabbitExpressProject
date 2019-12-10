@extends('admin.layout.admin')
@section("title","Your Address")
@section('content')

<div class="container">
    <h1>Address Details</h1>
    <ul class="unstyled">
        <li class="list-item">{{$address->user->name}}</li>
        <li class="list-item">{{$address->address}}</li>
        <li class="list-item">{{$address->city}} </li>
        <li class="list-item">{{$address->country}}</li>
        <li class="list-item">{{$address->zip}} </li>
    </ul>
<a class="btn btn-warning text-white my-3" href="{{url('admin/address/'.$address->id.'/edit')}}">Edit</a>
{!! Form::open(["action" => ["AddressesController@destroy", $address->id],"method"=>"DELETE"]) !!}
{{ csrf_field() }}
     <div class="form-group">
            {{Form::submit('Delete',["class"=>"btn btn-danger", "id" => "delete-btn"])}}
     </div>
     
{!! Form::close() !!}
</div>

@endsection
@section('scripts')
<script>
    $(document).on("ready",function(){
            $("#delete-btn").on("click",function(){
            if(!confirm("Are you sure?"))
            {
                return false;
            }
});
        });
</script>
@endsection