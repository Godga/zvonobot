@extends('layouts.base')

@section('content')
    <h1>Posts</h1>
    @if($post)
        <h3>{{$post->title}}</h3>
    @else
        <p>Net userov</p>
    @endif
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection