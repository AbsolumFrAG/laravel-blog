@extends('admin.layouts.app')
@section('content')
    @include('admin.parts.content-header', ['page_title' => 'Utilisateur', 'url_create' => route('admin.user.create')])
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
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Créé le</th>
                                    <th>Modifié le</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ App\Models\User::getRole()[$user->role] }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.user.show', $user->id) }}"><i class="far fa-eye"></i></a>
                                                <a class="btn btn-success btn-sm" href="{{ route('admin.user.edit', $user->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-sm" href="{{ route('admin.user.edit', $user->id) }}"
                                                   onclick="event.preventDefault(); document.getElementById('delete-{{ $user->id }}').submit();"><i class="fas fa-trash"></i></a>
                                            </div>
                                            <form action="{{ route('admin.user.delete', $user->id) }}" id="delete-{{ $user->id }}" method="post" class="d-none">
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
