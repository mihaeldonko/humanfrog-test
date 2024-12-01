@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Book your stay now!</h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="arrival_date">Arrival date*</label>
            <input type="date" id="arrival_date" name="arrival_date" class="form-control @error('arrival_date') is-invalid @enderror" value="{{ old('arrival_date') }}">
            @error('arrival_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="departure_date">Departure date*</label>
            <input type="date" id="departure_date" name="departure_date" class="form-control @error('departure_date') is-invalid @enderror" value="{{ old('departure_date') }}">
            @error('departure_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="room_id">Select room*</label>
            <select id="room_id" name="room_id" class="form-control @error('room_id') is-invalid @enderror">
                <option value="" data-price="0">select room</option>
                @foreach($rooms as $room)
                    <option value="{{ $room['id'] }}" data-price="{{ $room['price'] }}" {{ old('room_id') == $room['id'] ? 'selected' : '' }}>
                        {{ $room['name'] }} ({{ $room['price'] }} €)
                    </option>
                @endforeach
            </select>
            @error('room_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="name">Name and Surname*</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="email">Your email*</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="phone">Your phone number*</label>
            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
            @error('phone')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="message">Message</label>
            <textarea id="message" name="message" class="form-control">{{ old('message') }}</textarea>
        </div>

        <div class="form-group mt-3">
            <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
            @error('g-recaptcha-response')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group mt-3">
            <label for="total_price" id="price_error">Total price</label>
            <input type="text" id="total_price" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-dark mt-3">Book now!</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const arrivalDate = document.getElementById('arrival_date');
        const departureDate = document.getElementById('departure_date');
        const roomSelector = document.getElementById('room_id');
        const totalPriceField = document.getElementById('total_price');
        const textFieldPrice = document.getElementById('price_error');

        function calculatePrice() {
            const roomPrice = parseFloat(roomSelector.selectedOptions[0].getAttribute('data-price')) || 0;
            const arrival = new Date(arrivalDate.value);
            const departure = new Date(departureDate.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0); 

            totalPriceField.value = '';

            if (arrival && arrival < today) {
                textFieldPrice.innerHTML = 'Error:';
                textFieldPrice.style.color = "red";
                totalPriceField.value = 'Arrival date should be after today.';
                return;
            }

            if (arrival && departure && departure < arrival) {
                textFieldPrice.innerHTML = 'Error:';
                textFieldPrice.style.color = "red";
                totalPriceField.value = 'Departure date cannot be before arrival.';
                return;
            }

            if (arrival && departure && arrival.getTime() === departure.getTime()) {
                textFieldPrice.innerHTML = 'Error:';
                textFieldPrice.style.color = "red";
                totalPriceField.value = 'Arrival and departure cannot be on the same day.';
                return;
            }

            if (arrival && departure && departure > arrival) {
                textFieldPrice.innerHTML = 'Total price:';
                textFieldPrice.style.color = "inherit";
                const days = Math.ceil((departure - arrival) / (1000 * 60 * 60 * 24));
                const totalPrice = days * roomPrice;
                totalPriceField.value = totalPrice.toFixed(2) + ' €';
            } else {
                textFieldPrice.innerHTML = 'Total price:';
                textFieldPrice.style.color = "inherit";
                totalPriceField.value = '0.00 €';
            }
        }

        arrivalDate.addEventListener('change', calculatePrice);
        departureDate.addEventListener('change', calculatePrice);
        roomSelector.addEventListener('change', calculatePrice);
    });
</script>
@endsection
