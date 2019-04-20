@extends('layouts.user')

@section('content')
    <div class="title">Профиль</div>
    <div class="user-info">
        <div class="row">
            <div class="col-4">
                <div class="user-img">
                    <img src="{{  "$user->avatar" }}" alt="{{ $user->name }}">
                </div>
            </div>
            <div class="col-8">
                <div class="profile-name">
                    {{ $user->surname ? "$user->name $user->surname" : $user->name }}
                    <div class="profile-city">{{ $user->city?:''}}</div>
                </div>
                <div class="user-status">@if($user->isOnline()) Online @endif</div>
                <div class="user-stat-info d-flex justify-content-between">
                    <div class="usi-one">
                        <div class="usi-num">
                            256
                        </div>
                        <div class="usi-text">
                            подписчиков
                        </div>
                    </div>
                    <div class="usi-one">
                        <div class="usi-num">
                            124
                        </div>
                        <div class="usi-text">
                            проведенных
                            игр
                        </div>
                    </div>
                    <div class="usi-one">
                        <div class="usi-num">
                            54
                        </div>
                        <div class="usi-text">
                            подписок
                        </div>
                    </div>
                    <div class="usi-one">
                        <div class="usi-num">
                            24
                        </div>
                        <div class="usi-text">
                            фотоотчета
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tabs tabs-style-linemove">
        <nav>
            <ul>
                <li><a href="#section-linemove-1"><span>О себе</span></a></li>
                <li><a href="#section-linemove-2"><span>Новости</span></a></li>
                <li><a href="#section-linemove-3"><span>Отзывы</span></a></li>
            </ul>
        </nav>
        <div class="content-wrap">
            <section id="section-linemove-1"><p>Всем привет! Организую игры с 2012 года в залах Москвы и Омска!
                    Подписывайтесь,
                    указывайте вид спорта и получайте уведомления об играх на почту. Запись
                    обязательна для посещения игр!!!</p></section>
            <section id="section-linemove-2"><p>2</p></section>
            <section id="section-linemove-3"><p>3</p></section>
        </div><!-- /content -->
    </div><!-- /tabs -->
@endsection