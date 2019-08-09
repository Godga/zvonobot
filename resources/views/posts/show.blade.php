@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">          
                @if(isset($message))
                <div class="card-header"><h3>{{$message->title}}<a href="/home" class="btn btn-primary float-right">Назад</a></h3></div>    
                <div class="card-body">
                    <h3>{{$message->body}}</h3>
                    <hr>
                    <small>Написано: {{$message->created_at}}, отправитель: {{$message->sender_name}}</small>
                    <hr>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection