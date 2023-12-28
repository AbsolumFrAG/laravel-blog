@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1 class='mb-4'>
        {{ $post->title }}
    </h1>
    <div class="row">
        <div class="col-12 col-md-7 col-lg-9 mb-4">
            <div class="card">
                <div class="card-body">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-3 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-calendar-check-fill"></i>
                    <span>{{ $post->created_at->format('d/m/Y')  }}</span>
                </div>

                @if($post->preview_image)
                    <img src="{{ asset('storage/'.$post->preview_image)  }}" class="" alt="">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $post->category->title  }}</h5>
                </div>
                <div class="card-body">
                    <a href="/" class="btn btn-secondary btn-sm">&larr; Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
