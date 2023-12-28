@extends('layouts.app')

@section('title', 'Pages principales')

@section('content')
    <div class="list-group mb-4" id="link_list">
        @foreach ($posts as $post)
            <a href="{{ route('show.index', $post->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <i class="bi bi-bullseye fs-4 flex-shrink-0"></i>
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">{{ $post->title }}</h6>
                        <p class="mb-0 opacity-75">{{ $post->category->title }}</p>
                    </div>
                    <small class="opacity-50 text-nowrap">
                        <i class="bi bi-calendar-check-fill"></i> {{ $post->created_at->format('d/m/Y') }}
                    </small>
                </div>
            </a>
        @endforeach
    </div>
@endsection
