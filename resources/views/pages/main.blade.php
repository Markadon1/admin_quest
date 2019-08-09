@extends('layouts.header')
@section('content')

    <div class="main">
        <div class="main_page">
            <img src="{{asset('images/icons/games.png')}}">
            <h2>Игры</h2>
        </div>
        <div class="main_else">
            <div class="main_else_add">
        <button class="add_btn"><i class="fas fa-plus"></i></button>
            <p></p>
            </div>
        </div>
    </div>

    <div class="content_view">
        Content
    </div>

@endsection