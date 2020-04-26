@extends('layouts.app')

@section('content')

<h1>Edit Post</h1>

<form method="post" action="/posts/{{$post->id}}">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$post->title}}" placeholder="Enter Title">
    <input type="submit" value="Update">
</form>

<form method="post" action="/posts/{{$post->id}}">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
</form>

@endsection
