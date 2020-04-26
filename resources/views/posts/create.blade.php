@extends('layouts.app')

@section('content')

<h1>Create Post</h1>

<!-- <form method="post" action="/posts"> -->
{!! Form::open() !!}
    @csrf
    <input type="text" name="title" value="" placeholder="Enter Title">
    <input type="submit" value="Submit">
</form>

@endsection
