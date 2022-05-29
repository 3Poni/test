@extends('layouts.app')
@section('content')
    <main class="blog-post-single">
        <div class="container">
            <h1 class="post-title wow fadeInUp">{{ $article->title }}</h1>
            <div class="row">
                <div class="col-md-8 blog-post-wrapper">
                    <div class="post-header wow fadeInUp">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="blog post" class="post-featured-image">
                        <p class="post-date">Дата публикации: {{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} · {{ $date->format('H:i') }} ·</p>
                    </div>
                    <div class="post-content wow fadeInUp">
                        <p><span>{!! $article->content !!}</span></p>
                    </div>
                    <form class="text-right" action="{{ route('article.like.store', $article->id) }}" method="post">
                        @csrf
                        <button type="submit" class=" border-0 bg-transparent">
                            @auth
                                <span>{{ $article->liked_users_count }}</span>
                                <i class="d-flex fa{{ auth()->user()->likedArticles->contains($article->id) ? 's' : 'r' }} fa-heart"></i>
                            @endauth
                        </button>
                    </form>

                    @guest
                        <div class="text-right">
                            <span>{{ $article->liked_users_count }}</span>
                            <i class="far fa-heart"></i>
                        </div>
                    @endguest
                    <div class="comment-section wow fadeInUp mb-6">
                        <h3 class="mb-6 title">Комментарии: ({{ $article->comments->count() }})</h3>
                       @foreach($article->comments as $comment)
                        <div class="comment-text mb-3">
                            <span class="username">
                                <div>{{ $comment->user->name }}</div>
                                <span class="text muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }} </span>
                                @auth
                                    @if($comment->user->id === auth()->user()->id)
                                        <form action="{{ route('personal.comment.delete', $comment->id)}}"
                                              method="POST">
                                        @csrf
                                            @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fas fa-trash text-danger" role="button"></i>
                                        </button>
                                        </form>
                                    @endif
                                @endauth
                            </span>
                            {{ $comment->message }}
                        </div>
                        @endforeach
                        @auth
                        <form method="post" action="{{ route('article.comment.store', $article->id) }}" class="oleez-comment-form">
                            @csrf
                            <div class="line-highlight row">
                                <div class="form-group col-12">
                                    <label for="message">*текст комментария</label>
                                    <textarea name="message" id="message" rows="10" class="oleez-textarea" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit">Отправить</button>
                                </div>
                            </div>
                        </form>
                            @endauth
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-widget wow fadeInUp">
                        <h3 class="widget-title">Тэги</h3>
                        @foreach( $article->tags as $tag)
                            <span><i>#{{ $tag->title}}</i></span></br>
                            @endforeach

                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h3 class="widget-title">Похожие статьи:</h3>
                        <div class="widget-content">
                            <ul class="category-list">
                                @foreach($relatedArticles as $article)
                                <li class="text-warning pb-3"><h5><a class="text-decoration-none text-reset" href="{{ route('main.articles.show', $article->id) }}" </a>{{ $article->title }}</h5></li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
