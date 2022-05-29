    @extends('personal.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создание статьи</h1>
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
                        <form action="{{ route('personal.article.store') }}" method="POST" class="w-50 pt-3" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group w-25">
                                <label>
                                    <input type="hidden" class="form-control" name="user_id"
                                           value="{{Auth::user()->id}}">
                                </label>
                                <label>
                                    <input type="text" class="form-control" name="title" placeholder="Название статьи"
                                           value="{{ old('title') }}">
                                </label>
                                @error('title')
                                <div class="text-danger">
                                    Это поле необходимо заполнить
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="summernote"></label>
                                <textarea id="summernote" name="content"
                                          value="{{ old('content') }}">
                                    </textarea>
                                @error('content')
                                <div class="text-danger">
                                    Это поле необходимо заполнить
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="image">Добавить изображение</label>
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
                                            {{ $category->id == old('category_id') ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Тэги</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                                    @foreach ( $tags as $tag)
                                        <option {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Создать">
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
