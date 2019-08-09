<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Messages;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Messages::all();
        return view('posts.index')->with('posts', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'title' => 'required',
            'receiver' => 'required',
            'body' => 'required'
        ]);
        $receiver_name = $request->input('receiver');
        $user = User::where('name', $receiver_name)->first();
        if ($user === null){
            return redirect('/home')->with('error', 'Такого пользователя не существует.');
        }
        $message = new Messages;
        $sender_name = auth()->user()->name;
        $message->sender_name = $sender_name;
        $receiver_id = User::where('name', $receiver_name)->first();
        $message->title = $request->input('title');
        $message->body = $request->input('body');
        $message->receiver_id = $receiver_id->id;
        $message->save();

        return redirect('/home')->with('success', 'Сообщение отправлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Messages::find($id);
        if (Auth::user()->id == $message->receiver_id){
            return view('posts.show')->with('message', $message);
        } 
        else{
            return redirect('/home')->with('error', 'Нет доступа.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'title' => 'required'
        ]);
        $post = Posts::find($id);
        $post->title = $request->input('title');
        $post->save();

        return redirect('/posts')->with('success', 'post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'post deleted');
    }
}
