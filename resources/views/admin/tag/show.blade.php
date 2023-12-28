@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', ['page_title' => $tag->title])
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
                                    <td>{{ $tag->id }}</td>
                                </tr>
                                <tr>
                                    <th>Titre</th>
                                    <td>{{ $tag->title }}</td>
                                </tr>
                                <tr>
                                    <th>Créé le</th>
                                    <td>{{ $tag->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Modifié le</th>
                                    <td>{{ $tag->updated_at }}</td>
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
