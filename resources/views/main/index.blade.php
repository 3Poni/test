@extends('layouts.app')
@section('content')
    <main>
        <section>
            <div class="container wow fadeIn">
                <div id="oleezLandingCarousel" class="oleez-landing-carousel carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">

                            <img src="{{ asset('plugins/111/assets/images/Banner_1@2x.jpg') }}" alt="First slide" class="w-100">
                            <div class="carousel-caption">
                                <h2 data-animation="animated fadeInRight"><span>Мой Блог</span></h2>
                                <h2 data-animation="animated fadeInRight"><span>Какой-то текст</span></h2>
                                <a href="#!" class="carousel-item-link" data-animation="animated fadeInRight">ЗДЕСЬ МОГЛА БЫТЬ ВАША ССЫЛКА</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('plugins/111/assets/images/Banner_2@2x.jpg') }}" alt="Second slide" class="w-100">
                            <div class="carousel-caption">
                                <h2 data-animation="animated fadeInRight"><span>Мой Блог</span></h2>
                                <h2 data-animation="animated fadeInRight"><span>Еще текст</span></h2>
                                <a href="#!" class="carousel-item-link" data-animation="animated fadeInRight">И ЗДЕСЬ</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('plugins/111/assets/images/Banner_3@2x.jpg') }}" alt="Third slide" class="w-100">
                            <div class="carousel-caption">
                                <h2 data-animation="animated fadeInRight"><span>Снова Блог</span></h2>
                                <h2 data-animation="animated fadeInRight"><span>И снова текст</span></h2>
                                <a href="#!" class="carousel-item-link" data-animation="animated fadeInRight">И ТУТ</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('plugins/111/assets/images/Banner_4@2x.jpg') }}" alt="Fourth slide" class="w-100">
                            <div class="carousel-caption">
                                <h2 data-animation="animated fadeInRight"><span>Блог</span></h2>
                                <h2 data-animation="animated fadeInRight"><span>Текст</span></h2>
                                <a href="#!" class="carousel-item-link" data-animation="animated fadeInRight">ССЫЛКА</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
