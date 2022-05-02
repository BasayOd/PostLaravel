@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content" >
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-50">
                                <input type="text" class="form-control" placeholder="Название поста" name="title"
                                       value="{{old('title', $post->title)}}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                            <textarea id="summernote" name="content">
                                {{old('content', $post->content)}}
                            </textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Изменить превью</label>
                                <div class="mb-2">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($post->preview_image)}}" alt="preview_image"
                                         class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image" >
                                        <label class="custom-file-label" for="exampleInputFile">{{\Illuminate\Support\Facades\Storage::url($post->preview_image)}}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Изменить основное изображение</label>
                                <div class="mb-2">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($post->main_image)}}" alt="main_image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label" for="exampleInputFile">{{\Illuminate\Support\Facades\Storage::url($post->main_image)}}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Изменить категорию</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{$category->id==$post->category_id ? 'selected' : ''}}
                                        >{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Тэги</label>
                                <select class="select2" multiple="multiple" data-placeholder="Выберите тэги"
                                        style="width: 100%;" name="tag_ids[]">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}"
                                            {{is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''}}
                                        >{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" value="Обновить">
                        </form>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('sidebar')
    @include('admin.post.sidebar')
@endsection
