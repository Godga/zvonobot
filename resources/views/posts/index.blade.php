@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
    <ul>
    @foreach($posts as $post)
        <li><a href='/posts/{{$post->id}}'><h3>{{$post->title}}</h3></a></li>
    @endforeach
    </ul>
    @else
        <p>Net userov</p>
    @endif
@endsection