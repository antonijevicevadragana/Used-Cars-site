@extends('layouts.app')
@section('content')
<div id="demo" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        @php
            $counter = 0;
        @endphp
        @foreach ($images as $key => $image)
            <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $counter }}" class="{{ $counter === 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $image->path) }}" alt="" class="d-block images">
            </button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $counter }}"
                        class="{{ $counter === 0 ? 'active' : '' }}"></button>
            @php
                $counter++;
            @endphp
        @endforeach
    </div>

    <!-- The slideshow -->
    <div class="carousel-inner">
        @php
            $counter = 0;
        @endphp
        @foreach ($images as $key => $image)
            <div class="carousel-item{{ $counter === 0 ? ' active' : '' }}">
                <img src="{{ asset('storage/' . $image->path) }}" alt="" class="d-block images">
                <div class="carousel-caption">
                    <h2 class="animate__animated animate__backInRight">{{ __('') }}</h2>
                </div>
            </div>
            @php
                $counter++;
            @endphp
        @endforeach

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</div>



@endsection
