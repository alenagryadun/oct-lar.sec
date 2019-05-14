@extends('layouts.app')
@section('content')
<h2>Привет!</h2>
<p>Ты можешь увидеть все задачи <a href = "{{route('tasks_index')}}">здесь</a></p>
<p>Ты можешь увидеть все новости <a href = "{{route ('news_index')}}">здесь</a></p>
@endsection
