@extends('admin.layout.admin')
@section('content')
<h3 class="text-center">Users</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Registered</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{date('d/m/Y',strtotime($user->created_at))}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection