@extends('layouts.header')
@section('content')
    @if(session()->has('message'))
        <div class="done_modal">
            <i class="fas fa-times" style="cursor: pointer" onclick="close_modal()"></i>
            <p>{{session('message')}}</p>
            <div class="hr_done_modal"></div>
        </div>
        <script>
            $(document).ready(function () {
                $('.done_modal').animate({
                    top: "10px"
                },500,function () {
                    $('.hr_done_modal').animate({
                        width: "hide"
                    },5000,function () {
                        $('.done_modal').animate({
                            top: "-400px"
                        },1000,function () {

                        })
                    })
                });

            });
            function close_modal() {
                $('.done_modal').animate({
                    top: "-400px"
                },1000,function () {

                })
            }
        </script>
    @endif
    <div class="main">
        <div class="main_page">
            <img src="{{asset('images/icons/games.png')}}">
            <h2>Сотрудники</h2>
        </div>

    </div>
    <div class="workers_content">
        <div class="add_worker_btn">
            <a href="{{url('/workers/create')}}">
        <button><i class="fas fa-plus"></i> Добавить сотрудника</button>
            </a>
        </div>
        <div class="workers_all">
            <div class="workers_header">
                <div class="col-3">Имя</div>
                <div class="col-3">Должность</div>
                <div class="col-3">Телефон</div>
                <div class="col-2">Доступ к системе</div>
                <div class="col-1"></div>
            </div>
            <hr>
            <div class="workers_body">
                @foreach($user->workers as $worker)
                <div class="workers_body_item">
                <div class="col-3">{{$worker->name}}</div>
                <div class="col-3">{{$worker->position}}</div>
                <div class="col-3">{{$worker->phone}}</div>
                <div class="col-2">{{$worker->access}}</div>
                <div class="col-1 rest_worker">
                    <form type="GET" action="{{url('/workers/update')}}">
                        @csrf
                        <input type="hidden" value="{{$worker->id}}" name="id">
                        <button style="background: none;border: 0;"><i class="fas fa-edit" onclick=""></i></button>
                    </form>

                </div>
                </div>
                    <hr>
                    @endforeach
            </div>
        </div>
    </div>
@endsection