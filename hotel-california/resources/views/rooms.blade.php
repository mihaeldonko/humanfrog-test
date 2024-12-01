@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row g-4">
        @foreach ($rooms as $room)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="card h-100 shadow-sm">
                    <div class="room-img position-relative">
                        <img src="{{$room['main_image']}}" class="card-img-top" alt="room image">
                        <a href="/reservation" class="icon-overlay">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$room['name']}}</h5>
                        <p class="card-text">{{$room['short_description']}}</p>
                        <p class="card-text"><strong>Price per night:</strong> {{$room['price']}} €</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection