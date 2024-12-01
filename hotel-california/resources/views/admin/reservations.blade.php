@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($reservations as $reservation)
            <div class="col-md-6 mb-4">
                <div class="card p-3 shadow-sm">
                    <h5 class="card-title">Reservation Details</h5>
                    <p><strong>Person Name:</strong> {{ $reservation['name'] }}</p>
                    <p><strong>Stay Duration:</strong> From {{ date('d-m-Y', strtotime($reservation['arrival_date'])) }} to {{ date('d-m-Y', strtotime($reservation['departure_date'])) }}</p>
                    <p><strong>Contact Info:</strong></p>
                    <ul>
                        <li><strong>Phone:</strong> {{ $reservation['phone'] }}</li>
                        <li><strong>Email:</strong> {{ $reservation['email'] }}</li>
                    </ul>
                    <p><strong>Payment Info:</strong> Paid €{{ $reservation['price'] }} on {{ date('d-m-Y', strtotime($reservation['created_at'])) }}</p>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
