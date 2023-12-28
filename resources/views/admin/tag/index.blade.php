@extends('admin.layouts.app')

@section('meta')
    <title>Admin - Tags</title>
@endsection

@section('content')
    @include('admin.parts.content-header', ['page_title' => 'Tag', 'url_create' => route('admin.tag.create')])
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
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td>{{ $tag->created_at }}</td>
                                        <td>{{ $tag->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.tag.show', $tag->id)  }}"><i class="far fa-eye"></i></a>
                                                <a class="btn btn-success btn-sm" href="{{ route('admin.tag.edit', $tag->id)  }}"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tag.edit', $tag->id)  }}"
                                                   onclick="event.preventDefault(); document.getElementById('delete-{{ $tag->id }}').submit();"><i class="fas fa-trash"></i></a>
                                            </div>
                                            <form action="{{ route('admin.tag.delete', $tag->id) }}" id="delete-{{ $tag->id }}" method="post" class="d-none">
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
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
