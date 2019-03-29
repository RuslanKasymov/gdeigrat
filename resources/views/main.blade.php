@extends('layouts.app')

@section('content')
        <div class="title">Игры</div>
        <div class="game">
            <div class="row">
                <div class="col-6">
                    <div class="org">
                        <div class="org-img"><img src="images/simple_img.png" alt=""></div>
                        <div class="profile-small-name">Руслан Касымов</div>
                    </div>
                    <div class="info-l">
                        <div class="time">21:10</div>
                        <div class="date">22.10.18</div>
                        <div class="address">ул. Мира 27, СКК Блинова</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="sport-type">Баскетбол</div>
                    <div class="info-r">
                        <div class="num-h">25 чел</div>
                        <div class="price">350 р</div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button class="btn-game animate">Записаться</button>
                </div>
            </div>
        </div>
        <div class="game zaglushka">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">

                    <div class="zagl-data">
                        <img src="images/simple_img.png" alt="">
                        <p>Чтобы участвовать в играх организатора <a class="animate" href="#">Руслан
                                Касымов</a><br>
                            необходимо на него подписаться</p>
                        <button class="btn-game animate">Подписаться</button>
                    </div>
                </div>
            </div>
        </div>
@endsection