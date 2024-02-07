@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <h3 class="text-center">{{ __('Ads') }}</h3>
            <hr>
            <form method="POST" action="{{ route('car.update', $car) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row p-2">
                    <label for="img" class="col-lg-1 col-form-label">{{ __('Images') }}</label>
                    <div class="col-lg-5 input-box">
                        <div class="input-group col-lg-4">
                            <input type="file" class="form-control @error('img.*') is-invalid @enderror" id="img"
                                name="img[]" value="{{ old('img') }}" multiple>
                            @error('img.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- prolazak kroz tabelu slike i prikaz slika --}}
                    @foreach ($images as $image)
                        <img src="{{ asset('storage/' . $image->path) }}" style="width: 100px;" alt="">
                    @endforeach
                </div>
                <div class="col-lg-3 input-box">
                    <input class="form-check-input" type="checkbox" value="1" id="keep_old_images"
                        name="keep_old_images">
                    <label for="keep_old_images">{{ __('Keep old images') }}</label>

                    <p>{{ __('if you checked Keep old images, you can add new images without deleting previous ones') }}</p>
                </div>


                <label for="img" class="col-lg-1 col-form-label">{{ __('Cover image') }}</label>
                <div class="col-lg-5 input-box">
                    <div class="input-group col-lg-4">
                        <input type="file" class="form-control @error('cover_img') is-invalid @enderror" id="cover_img"
                            name="cover_img" value="{{ old('icover_img') }}" multiple>
                        @error('cover_img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <img src="{{ asset('storage/' . $car->cover_img) }}" style="width: 100px;" alt="">



                <div class="row p-2">
                    <label for="brend" class="col-lg-1 col-form-label ">{{ __('Brend') }}</label>
                    <div class="col-lg-3  input-box">
                        <input type="text" class="form-control @error('brend') is-invalid @enderror" id="brend"
                            name="brend" value="{{ $car->brend }}">
                        @error('brend')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="model" class="col-lg-1 col-form-label ">{{ __('Model') }}</label>
                    <div class="col-lg-3  input-box">
                        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model"
                            name="model" value="{{ $car->model }}">
                        @error('model')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="year" class="col-lg-1 col-form-label ">{{ __('Year') }}</label>
                    <div class="col-lg-3  input-box">
                        <input type="number" class="form-control @error('year') is-invalid @enderror" id="model"
                            name="year" value="{{ $car->year }}">
                        @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="row p-2">
                    <label for="NumberOfDoors" class="col-lg-2 col-form-label ">{{ __('Number of doors') }}</label>
                    <div class="col-lg-4 input-box">
                        <input type="text" class="form-control @error('NumberOfDoors') is-invalid @enderror"
                            id="NumberOfDoors" name="NumberOfDoors" value="{{ $car->NumberOfDoors }}">
                        @error('NumberOfDoors')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="NumberOfSeats" class="col-lg-2 col-form-label ">{{ __('Number of seats') }}</label>
                    <div class="col-lg-4 input-box">
                        <input type="text" class="form-control @error('NumberOfSeats') is-invalid @enderror"
                            id="NumberOfSeats" name="NumberOfSeats" value="{{ $car->NumberOfSeats }}">
                        @error('NumberOfSeats')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row p-2">
                    <label for="engineDisplacement"
                        class="col-lg-2 col-form-label ">{{ __('Engine Displacement') }}</label>
                    <div class="col-lg-4 input-box">
                        <input type="text" class="form-control @error('engineDisplacement') is-invalid @enderror"
                            id="engineDisplacement" name="engineDisplacement" value="{{ $car->engineDisplacement }}">
                        @error('engineDisplacement')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="mileage" class="col-lg-2 col-form-label ">{{ __('Mileage') }}</label>
                    <div class="col-lg-4 input-box">
                        <input type="text" class="form-control @error('mileage') is-invalid @enderror" id="mileage"
                            name="mileage" value="{{ $car->mileage }}">
                        @error('mileage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row p-2">
                    <label for="AvgFuelConsumption"
                        class="col-lg-4 col-form-label ">{{ __('Average fuel consumption in liters per 100 kilometers') }}</label>
                    <div class="col-lg-2 input-box">
                        <input type="number" class="form-control @error('AvgFuelConsumption') is-invalid @enderror"
                            id="AvgFuelConsumption" name="AvgFuelConsumption" value="{{ $car->AvgFuelConsumption }}">
                        @error('AvgFuelConsumption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="city" class="col-lg-2 col-form-label ">{{ __('City/Region') }}</label>
                    <div class="col-lg-4 input-box">
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                            name="city" value="{{ $car->city }}">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="p-2 row">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <p class="col-sm-2 col-form-label">{{ __('Transmission') }}</p>
                        <div class="p-2">
                            <input type="radio" class="btn-check" name="transmission" id="automatic"
                                value="automatic" @if (old('transmission', $car->transmission) === 'automatic') checked @endif>
                            <label class="btn btn-outline-danger" for="automatic">{{ __('Automatic') }}</label>

                            <input type="radio" class="btn-check" name="transmission" id="manuel" value="manuel"
                                @if (old('transmission', $car->transmission) === 'manuel') checked @endif>
                            <label class="btn btn-outline-danger" for="manuel">{{ __('Manuel') }}</label>


                        </div>
                    </div>
                </div>

                <div class="p-2 row">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <p class="col-sm-2 col-form-label">{{ __('air Condition') }}</p>
                        <div class="p-2">
                            <input type="radio" class="btn-check" name="airCondition" id="auto"
                                value="automatic" @if (old('airCondition', $car->airCondition) === 'automatic') checked @endif>
                            <label class="btn btn-outline-danger" for="auto">{{ __('Automatic') }}</label>

                            <input type="radio" class="btn-check" name="airCondition" id="manuelno" value="manuel"
                                @if (old('airCondition', $car->airCondition) === 'manuel') checked @endif>
                            <label class="btn btn-outline-danger" for="manuelno">{{ __('Manuel') }}</label>

                            <input type="radio" class="btn-check" name="airCondition" id="none" value="none"
                                @if (old('airCondition', $car->airCondition) === 'nonel') checked @endif>
                            <label class="btn btn-outline-danger" for="none">{{ __('None') }}</label>


                        </div>
                    </div>
                </div>

                <div class="p-2 row">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <p class="col-sm-2 col-form-label">{{ __('Type of fuel') }}</p>
                        <div class="p-2">
                            <input type="radio" class="btn-check" name="fuel" id="gasoline" value="gasoline"
                                @if (old('fuel', $car->fuel) === 'gasoline') checked @endif>
                            <label class="btn btn-outline-danger" for="gasoline">{{ __('Gasoline') }}</label>

                            <input type="radio" class="btn-check" name="fuel" id="diesel" value="diesel"
                                @if (old('fuel', $car->fuel) === 'diesel') checked @endif>
                            <label class="btn btn-outline-danger" for="diesel">{{ __('Diesel') }}</label>

                            <input type="radio" class="btn-check" name="fuel" id="gas"
                                value="gas"@if (old('fuel', $car->fuel) === 'gas') checked @endif>
                            <label class="btn btn-outline-danger" for="gas">{{ __('Gas') }}</label>

                            <input type="radio" class="btn-check" name="fuel" id="gasoline+gas"
                                value="gasoline+gas" @if (old('fuel', $car->fuel) === 'gasoline+gas') checked @endif>
                            <label class="btn btn-outline-danger" for="gasoline+gas">{{ __('Gasoline+Gas') }}</label>

                            <input type="radio" class="btn-check" name="fuel" id="hybrid" value="hybrid"
                                @if (old('fuel', $car->fuel) === 'hybrid') checked @endif>
                            <label class="btn btn-outline-danger" for="hybrid">{{ __('Hybrid') }}</label>
                        </div>
                    </div>
                </div>

                <div class="p-2 row">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <p class="col-sm-2 col-form-label">{{ __('Category') }}</p>
                        <div class="p-2">
                            <input type="radio" class="btn-check" name="category" id="limousine" value="limousine"
                                @if (old('category', $car->category) === 'limousine') checked @endif>
                            <label class="btn btn-outline-danger" for="limousine"><img
                                    src="{{ URL::asset('img/limo.png') }}" alt="">{{ __('Limousine') }}</label>

                            <input type="radio" class="btn-check" name="category" id="pickup" value="pickup"
                                @if (old('category', $car->category) === 'pickup') checked @endif>
                            <label class="btn btn-outline-danger" for="pickup"><img
                                    src="{{ URL::asset('img/pickup.png') }}" alt="">{{ __('Pickup') }}</label>

                            <input type="radio" class="btn-check" name="category" id="hatchback"
                                value="hatchback"@if (old('category', $car->category) === 'hatchback') checked @endif>
                            <label class="btn btn-outline-danger" for="hatchback"><img
                                    src="{{ URL::asset('img/hatchback.png') }}"
                                    alt="">{{ __('Hatchback') }}</label>

                            <input type="radio" class="btn-check" name="category" id="station Wagon"
                                value="station Wagon" @if (old('category', $car->category) === 'station Wagon') checked @endif>
                            <label class="btn btn-outline-danger" for="station Wagon"><img
                                    src="{{ URL::asset('img/stationWagon.png') }}"
                                    alt="">{{ __('Station Wagon') }}</label>

                            <input type="radio" class="btn-check" name="category" id="convertible/cabriolet"
                                value="convertible/cabriolet" @if (old('category', $car->category) === 'convertible/cabriolet') checked @endif>
                            <label class="btn btn-outline-danger" for="convertible/cabriolet"><img
                                    src="{{ URL::asset('img/kabrio.png') }}"
                                    alt="">{{ __('Convertible/cabriolet') }}</label>

                            <input type="radio" class="btn-check" name="category" id="coupe" value="coupe"
                                @if (old('category', $car->category) === 'coupe') checked @endif>
                            <label class="btn btn-outline-danger" for="coupe"><img
                                    src="{{ URL::asset('img/coupe.png') }}" alt="">{{ __('Coupe') }}</label>

                            <input type="radio" class="btn-check" name="category" id="minivan" value="minivan"
                                @if (old('category', $car->category) === 'minivan') checked @endif>
                            <label class="btn btn-outline-danger" for="minivan"><img
                                    src="{{ URL::asset('img/minivan.png') }}" alt="">{{ __('Minivan') }}</label>

                            <input type="radio" class="btn-check" name="category" id="jeep" value="jeep"
                                @if (old('category', $car->category) === 'jeep') checked @endif>
                            <label class="btn btn-outline-danger" for="jeep"><img
                                    src="{{ URL::asset('img/jeep.png') }}" alt="">{{ __('Jeep') }}</label>
                        </div>
                    </div>
                </div>

                <div class="p-2 row">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <p class="col-sm-2 col-form-label">{{ __('Fix Price') }}</p>
                        <div class="p-2">
                            <input type="radio" class="btn-check" name="fixPrice" id="yes" value="yes"
                                @if (old('fixPrice', $car->fixPrice) === 'yes') checked @endif>
                            <label class="btn btn-outline-danger" for="yes">{{ __('Yes') }}</label>

                            <input type="radio" class="btn-check" name="fixPrice" id="no" value="no"
                                @if (old('fixPrice', $car->fixPrice) === 'no') checked @endif>
                            <label class="btn btn-outline-danger" for="no">{{ __('No') }}</label>


                        </div>
                    </div>

                    <label for="price" class="col-lg-2 col-form-label ">{{ __('Price') }}</label>
                    <div class="col-lg-4 input-box">
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" value="{{ $car->price }}">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="row p-2">
                    <label for="color" class="col-lg-2 col-form-label ">{{ __('Color') }}</label>
                    <div class="col-lg-4 input-box">
                        <input type="text" class="form-control @error('color') is-invalid @enderror" id="color"
                            name="color" value="{{ $car->color }}">
                        @error('color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="registration" class="col-lg-2 col-form-label ">{{ __('Registration') }}</label>
                    <div class="col-lg-4 input-box">
                        <input type="text" class="form-control @error('registration') is-invalid @enderror"
                            id="registration" name="registration" value="{{ $car->registration }}">
                        @error('registration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row p-2">
                    <label for="demage" class="col-lg-1 col-form-label ">{{ __('Demage') }}</label>
                    <div class="col-lg-11">
                        <textarea name="demage" id="demage" cols="15"
                            rows="2"class="form-control @error('demage') is-invalid @enderror" id="descript" name="demage">{{ $car->demage }}</textarea>

                        @error('demage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="row p-2">
                    <label for="descript" class="col-lg-1 col-form-label ">{{ __('Description') }}</label>
                    <div class="col-lg-11">
                        <textarea name="descript" id="descript" cols="15"
                            rows="5"class="form-control @error('descript') is-invalid @enderror" id="descript" name="descript">{{ $car->descript }}</textarea>

                        @error('descript')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-md grey">
                        {{ __('Save') }}
                    </button><a href="{{ route('car.index') }}" class="btn btn-md dark">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
