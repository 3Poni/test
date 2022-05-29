    @extends('personal.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование статьи</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('personal.article.update', $article->id) }}" method="POST" class="w-50 pt-3" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <label>
                                    <input type="text" class="form-control" name="title" placeholder="Название статьи"
                                           value="{{ $article->title }}">
                                </label>
                                @error('title')
                                <div class="text-danger">
                                    Это поле необходимо заполнить
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="summernote"></label>
                                <textarea id="summernote" name="content">
                                              {{ $article->content }}
                                    </textarea>
                                @error('content')
                                <div class="text-danger">
                                    Это поле необходимо заполнить
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="image">Добавить изображение</label>
                                <div class="w-50 mb-3">
                                    <img src="{{ url('storage/' . $article->image) }}" alt="image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Выберите файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                                @error('image')
                                <div class="text-danger">
                                    Выберите изображение
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <label for="category_id" >Выберите категорию</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $article->category_id ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Тэги</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                                    @foreach ( $tags as $tag)
                                        <option {{ is_array( $article->tags->pluck('id')->toArray()) && in_array($tag->id, $article->tags->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
