@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Входящие сообщения</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   @if(count($messages) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($messages as $message)
                                <tr>
                                    <td><a href="home/{{$message->id}}">{{$message->title}}</a></td>
                                    <td>{{$message->sender_name}}</td>
                                </tr>
                            @endforeach
                        </table>
                    {{ $messages->links() }}
                    @else
                        <p>У вас нет входящих сообщений :(</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
