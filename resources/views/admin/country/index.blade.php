@extends('admin.layout.admin')
@section('content')
<div class="container">
        <h1>All Countries</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Code</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                <tr>
                    <td><a href="{{url('admin/country/'.$country->id)}}">{{$country->name}}</a></td>
                    <td>{{$country->code}}</td>
                    <td><a href="{{url('admin/country/'.$country->id."/edit")}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        {!! Form::open(["action" => ["CountriesController@destroy",$country->id],"method"=>"DELETE"])
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