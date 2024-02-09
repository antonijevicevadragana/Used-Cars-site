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


        <div class="container" style="padding-top: 70px;">
            <h1 class="text-light">{{ $car->brend }} {{$car->model}} </h1>

            <div class="row">
            <div class="col-md-7">
                <table >
                    <tr>
                        <th colspan="2" class="text-center">{{__('Information')}}</th>
                    </tr>
                    <tr>
                       <td>{{__('Brend')}}</td>
                       <td>{{$car->brend}}</td>
                    </tr>
                    <tr>
                        <td>{{__('Model')}}</td>
                        <td>{{$car->model}}</td>
                     </tr>
                     <tr>
                        <td>{{__('Year')}}</td>
                        <td>{{$car->year}}</td>
                     </tr>
                     <tr>
                        <td>{{__('Price')}}</td>
                        <td>{{$car->price}}</td>
                     </tr>
                     <tr>
                        <td>{{__('fix Price Yes/No')}}</td>
                        <td>{{$car->fixPrice}}</td>
                     </tr>
                     <tr>
                        <td>{{__('Mileage')}}</td>
                        <td>{{$car->mileage}}</td>
                     </tr>
                     <tr>
                        <td>{{__('engine Displacement (cm3)')}}</td>
                        <td>{{$car->engineDisplacement}}</td>
                     </tr>
                     <tr>
                        <td>{{__('Avg fuel comsumption')}}</td>
                        <td>{{$car->AvgFuelConsumption}}</td>
                     </tr>
    
                     <tr>
                        <td>{{__('Fuel type')}}</td>
                        <td>{{$car->fuel}}</td>
                     </tr>

                     <tr>
                        <td>{{__('Category')}}</td>
                        <td>{{$car->category}}</td>
                     </tr>
                     <tr>
                        <td>{{__('Transmission')}}</td>
                        <td>{{$car->transmission}}</td>
                     </tr>
                     <tr>
                        <td>{{__('Registration')}}</td>
                        <td>{{$car->registration}}</td>
                     </tr>

                     <tr>
                        <td>{{__('Color')}}</td>
                        <td>{{$car->color}}</td>
                     </tr>
                     <tr>
                        <td>{{__('air condition')}}</td>
                        <td>{{$car->airCondition}}</td>
                     </tr>

                     <tr>
                        <td>{{__('Number of doors')}}</td>
                        <td>{{$car->NumberOfDoors}}</td>
                     </tr>
                     <tr>
                        <td>{{__('aNumber of seats')}}</td>
                        <td>{{$car->NumberOfSeats}}</td>
                     </tr>
                     <tr>
                        <td>{{__('city/region ')}}</td>
                        <td>{{$car->city}}</td>
                     </tr>
                     <tr>
                        <td>{{__('Demage')}}</td>
                        <td><p>{{$car->demage}}</p></td>
                     </tr>
                     <tr>
                        <td>{{__('Description')}}</td>
                        <td><p>{{$car->descript}}</p></td>
                     </tr>
                </table>
            </div>
            <div class="col-md-5 text-light">
                <p class="text-center">{{__('Seller Infromation')}}</p>
                <div class="sellerInfo d-flex justify-content-center flex-column p-4">
                    <p><i class="fa-solid fa-user" style="color: #ffffff;"></i></p>
                    <p><i class="fa-solid fa-envelope" style="color: #ffffff;"></i></p>
                    <p><i class="fa-solid fa-phone-volume"  style="color: #ffffff;"></i></p>
                </div>
            </div>
        </div>
           
        </div>

@endsection
