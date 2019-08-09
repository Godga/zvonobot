@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Отправка сообщения</h3></div>    
                <div class="card-body">
                    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{Form::text('receiver', '', ['class' => 'form-control', 'placeholder' => 'Получатель'])}}
                        </div>
                        <div class="form-group">
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Тема'])}}
                        </div>
                        <div class="form-group">
                            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body'])}}
                        </div>
                        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection