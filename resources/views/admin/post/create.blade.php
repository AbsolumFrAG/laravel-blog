@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', ['page_title' => 'Ajouter'])
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <form method="post" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputTitle1">Titre</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputTitle1"
                                           placeholder="Titre" value="{{ old('title') }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Contenu</label>
                                    <textarea class="form-control" name="content" id="content" rows="3"
                                              placeholder="Écrivez ici...">{{ old('content') }}</textarea>
                                    @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile0">Ajout d'un aperçu</label>
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
                                            {{ $category->id == old('category_id') ? ' selected' : '' }}
                                            >{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Tags" style="width: 100%;">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                            {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }}
                                            >{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Ajouter">
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
