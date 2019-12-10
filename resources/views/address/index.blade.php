@extends('layout.main')
@section("title","All Addresses")
@section('content')

<div class="container">
    <h1>All Addresses</h1>
    @if (!Auth()->user()->admin)
    <a class="btn btn-primary float-right my-3" href="/address/create">Create New Address</a>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                <th>ZIP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($addresses as $address)
            <tr>
                <td>{{$address->user->name}}</td>
                <td><a href="{{url('admin/address/'.$address->id)}}">{{$address->address}}</a></td>
                <td>{{$address->city}}</td>
                <td>{{$address->country}}</td>
                <td>{{$address->zip}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection