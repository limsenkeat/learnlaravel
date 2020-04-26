@extends('layouts.app')

@section('content')

<h3>Posts {{$post->title}}</h3>
<p>{{$post->content}}</p>
<a href="{{route('posts.edit', $post->id)}}">edit</a>

@endsection