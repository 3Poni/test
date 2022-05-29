@extends('personal.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Главная страница</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $data['likesCount'] }}</h3>
                                <p>Понравишееся посты</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-heart"></i>
                            </div>
                            <a href="{{ route('personal.likes.index') }}" class="small-box-footer">Подробнее<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $data['commentsCount'] }}</h3>
                                <p>Мои комментарии</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-comment"></i>
                            </div>
                            <a href="{{ route('personal.comments.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-warning">
                            <div class="inner">
                                <h3>{{ $data['articlesCount'] }}</h3>
                                <p>Мои статьи</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-comment"></i>
                            </div>
                            <a href="{{ route('personal.articles.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
