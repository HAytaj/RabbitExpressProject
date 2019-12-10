@extends('layouts.app')
@section('title', "Problem")
@section('content')
<div class="alert alert-danger">
<p>Problem occured. Please go to <a href="{{url('/')}}">home page</a>.</p>
</div>
@endsection