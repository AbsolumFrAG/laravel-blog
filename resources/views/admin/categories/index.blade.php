@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', ['page_title' => 'Catégorie', 'url_create' => route('admin.categories.create')])
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th>Créé le</th>
                                    <th>Modifié le</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.show', $category->id) }}"><i class="far fa-eye"></i></a>
                                                <a class="btn btn-success btn-sm" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-sm" href="{{ route('admin.categories.edit', $category->id) }}"
                                                   onclick="event.preventDefault(); document.getElementById('delete-{{ $category->id }}').submit();"><i class="fas fa-trash"></i></a>
                                            </div>
                                            <form action="{{ route('admin.categories.delete', $category->id) }}" id="delete-{{ $category->id }}" method="post" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
