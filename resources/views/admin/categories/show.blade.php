@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', ['page_title' => $category->title])

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
                                    <td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <th>Titre</th>
                                    <td>{{ $category->title }}</td>
                                </tr>
                                <tr>
                                    <th>Créé le</th>
                                    <td>{{ $category->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Modifié le</th>
                                    <td>{{ $category->updated_at }}</td>
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
