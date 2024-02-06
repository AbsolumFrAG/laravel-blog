@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', ['page_title' => 'Post', 'url_create' => route('admin.post.create')])
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
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>{{ $post->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.post.show', $post->id) }}"><i class="far fa-eye"></i></a>
                                                <a class="btn btn-success btn-sm" href="{{ route('admin.post.edit', $post->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-sm" href="{{ route('admin.post.edit', $post->id) }}"
                                                   onclick="event.preventDefault(); document.getElementById('delete-{{ $post->id }}').submit();"><i class="fas fa-trash"></i></a>
                                            </div>
                                            <form action="{{ route('admin.post.delete', $post->id) }}" id="delete-{{ $post->id }}" method="post" class="d-none">
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
                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
