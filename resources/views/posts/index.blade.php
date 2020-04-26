@extends('layouts.app')

@section('content')

<h1>Posts</h1>
<hr>
<ul>
@foreach($posts as $post)
    <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
@endforeach
</ul>

@endsection