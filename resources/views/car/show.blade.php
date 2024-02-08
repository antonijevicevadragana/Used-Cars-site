@extends('layouts.app')
@section('content')
<div id="carouselDemo" class="carousel slide" data-bs-touch="false">
    <div class="carousel-inner">
        @foreach ($images as $key => $image)
            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100" alt="...">
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDemo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselDemo" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

    <div class="carousel-indicators">
        @foreach ($images as $key => $image)
            <button type="button" class="{{ $key === 0 ? 'active' : '' }}" data-bs-target="#carouselDemo"
                data-bs-slide-to="{{ $key }}">
                <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100" alt="...">
            </button>
        @endforeach
    </div>
</div>


@endsection
