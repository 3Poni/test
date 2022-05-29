@extends('layouts.app')
@section('content')
    <main class="blog-grid-page">
    <div class="container">
        <h1 class="oleez-page-title wow fadeInUp">Список Статей</h1>
        <div class="row">
            @foreach($data as $article)
                <div class="col-md-4">
                    <div class="blog-post-card wow fadeInUp">
                        <div class="blog-post-thumbnail-wrapper">
                            <a href="{{ route('main.articles.show', $article->id) }}" ><img src="{{ url('storage/' . $article->image) }}" alt="blog"></a>
                        </div>

                        <div class="row">
                            <div class="pb-3 col">
                                <span class="text-left  blog-post"><em>{{ $article->category->title }}</em></span><br>
                                <span class="text-left  blog-post">{{ $article->comments->count() }} Комментариев</span>
                            </div>
                            <div class="pb-3 col">
                                <p class="text-right blog-post-date">{{ $article->created_at->translatedFormat('F') }} {{ $article->created_at->day }}, {{ $article->created_at->year }} · {{ $article->created_at->format('H:i') }}</p>
                                <div class="text-right">
                                    <form class="text-right" action="{{ route('article.like.store', $article->id) }}" method="post">
                                        @csrf
                                        <span>{{ $article->liked_users_count }}</span>
                                        @auth
                                            <button type="submit" class=" border-0 bg-transparent">
                                                <i class="d-flex fa{{ auth()->user()->likedArticles->contains($article->id) ? 's' : 'r' }} fa-heart"></i>
                                                @endauth
                                                @guest
                                                    <i class="far fa-heart"></i>
                                                @endguest
                                            </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('main.articles.show', $article->id) }}" class="text-decoration-none text-reset link-dark">
                            <h5 class="blog-post-title">{{ $article->title }}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 pb-5 mb-5">
                <nav class="oleez-pagination d-flex align-items-center justify-content-center wow fadeInUp">
                    <div class="next-post">
                        {{ $data->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </div>
    </main>
@endsection
