@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', ['page_title' => 'Édition'])
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <form method="post" action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputTitle1">Titre</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputTitle1"
                                           value="{{ $post->title }}"
                                           placeholder="Titre">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Contenu</label>
                                    <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
                                    @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile0">Ajout d'un aperçu</label>
                                    @if ($post->preview_image)
                                        <div class="w-25 mb-2">
                                            <img src="{{ url('storage/' . $post->preview_image) }}" class="img-fluid">
                                        </div>
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile0">
                                            <label class="custom-file-label" for="exampleInputFile">Choisir le fichier</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Uploader</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile1">Ajouter une image</label>
                                    @if ($post->main_image)
                                        <div class="w-25 mb-2">
                                            <img src="{{ url('storage/' . $post->main_image) }}" class="img-fluid">
                                        </div>
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="main_image" class="custom-file-input" id="exampleInputFile1">
                                            <label class="custom-file-label" for="exampleInputFile">Choisir le fichier</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Uploader</span>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Choisir une catégorie</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                            {{ $category->id == $post->category_id ? ' selected' : '' }}
                                            >{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Tags" style="width: 100%;">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                            {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                                            >{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Mettre à jour">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .custom-file-input:lang(en)~.custom-file-label::after {
            content: '...';
        }
    </style>
@endpush

@push('scripts')
    <script src="/vendor/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="/vendor/adminlte/plugins/select2/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/40.2.0/ckeditor.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();
            bsCustomFileInput.init();
        });

        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="/vendor/adminlte/dist/js/pages/dashboard.js"></script>
@endpush
