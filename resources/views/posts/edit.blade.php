@extends('layouts.app')

@section('content')

<h1>Edit Post</h1>

<!-- <form method="post" action="/posts/{{$post->id}}">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$post->title}}" placeholder="Enter Title">
    <input type="submit" value="Update">
</form>

<form method="post" action="/posts/{{$post->id}}">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
</form> -->

{!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostsController@update', $post->id] ]) !!}
    @csrf
    <div class="form-group">
        {!! Form::label('title', 'Title: ') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Post', ['class' => 'btn-primary']) !!}
    </div>
{!! Form::close() !!}

{!! Form::model($post, ['method' => 'DELETE', 'action' => ['PostsController@destroy', $post->id] ]) !!}
    @csrf
    <div class="form-group">
        {!! Form::submit('Delete Post', ['class' => 'btn-danger']) !!}
    </div>
{!! Form::close() !!}

@endsection
