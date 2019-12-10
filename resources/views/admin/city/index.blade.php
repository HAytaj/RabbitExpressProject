@extends('admin.layout.admin')
@section('content')
<div class="container">
        <h1>All Cities</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>City</th>
                    <th>Country</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                <tr>
                    <td><a href="{{url('admin/city/'.$city->id)}}">{{$city->name}}</a></td>
                    <td>{{$city->country->name}}</td>
                    <td><a href="{{url('admin/city/'.$city->id."/edit")}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        {!! Form::open(["action" => ["CitiesController@destroy",$city->id],"method"=>"DELETE"])
                        !!}
                        <div class="form-group">
                            {{Form::submit('Delete',["class"=>"btn btn-danger delete-btn"])}}
                        </div>
                        {{ csrf_field() }}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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