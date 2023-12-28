@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', ['page_title' => $post->title])

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $post->id }}</td>
                                </tr>
                                <tr>
                                    <th>Titre</th>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <th>Contenu</th>
                                    <td>{!! $post->content !!}</td>
                                </tr>
                                <tr>
                                    <th>Créé le</th>
                                    <td>{{ $post->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Modifié le</th>
                                    <td>{{ $post->updated_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
