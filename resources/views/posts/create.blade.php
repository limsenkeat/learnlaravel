@extends('layouts.app')

@section('content')

<h1>Create Post</h1>

<!-- <form method="post" action="/posts">
    @csrf
    <input type="text" name="title" value="" placeholder="Enter Title">
    <input type="submit" value="Submit">
</form> -->

{!! Form::open(['method' => 'POST', 'action' => 'PostsController@store', 'files' => true]) !!}
    @csrf
    <div class="form-group">
        {!! Form::label('title', 'Title: ') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::file('file', ['class' => 'form-control']) !!}
        @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::submit('Create Post', ['class' => 'btn-primary']) !!}
    </div>
{!! Form::close() !!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
