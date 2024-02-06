@extends('admin.layouts.app')
@section('content')
    @include('admin.parts.content-header', ['page_title' => 'Créer'])

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <form method="post" action="{{ route('admin.user.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputTitle1">Nom</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputTitle1"
                                           value="{{ old('name') }}"
                                           placeholder="Nom">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                           value="{{ old('email') }}"
                                           placeholder="Email">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPass">Mot de passe</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPass" placeholder="Mot de passe">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Rôle</label>
                                    <select name="role" class="form-control">
                                        @foreach ($roles as $k => $role)
                                            <option value="{{ $k }}"
                                            {{ $k == old('role') ? ' selected' : '' }}
                                            >{{ $role }}</option>
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
