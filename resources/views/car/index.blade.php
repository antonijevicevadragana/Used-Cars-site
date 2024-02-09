@extends('layouts.app')
@section('content')
    @include('partials._hero')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4 mx-auto p-2 ">
            @foreach ($dataCar as $car)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <a href="{{ route('car.show', $car) }}" type="button" class="btn btn-sm grey"><i
                                        class="fa fa-eye" aria-hidden="true"></i>
                                    {{ __('Show') }}</a>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="imgContainer" >
                                        <img src="{{ asset('storage/' . $car->cover_img) }}" class="coverIndex"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h4 class="card-text">{{ __('Price: ') }}{{ $car->price }} $</h4>
                                    <h4 class="card-text">{{ $car->brend }} {{ $car->model }}</h4>
                                    <p class="card-text">{{ __('Year: ') }} {{ $car->year }}</p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        <div class="mb-2 p-4 ">
            {{$dataCar->links()}}
           </div>
    </div>
   
@endsection
