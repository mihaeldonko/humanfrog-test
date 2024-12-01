<!DOCTYPE html>
<html>
<head>
    <title>New Reservation</title>
</head>
<body>
    <h1>New Reservation</h1>
    <p>A new reservation has been made:</p>
    <ul>
        <li>Name: {{ $reservation->name }}</li>
        <li>Email: {{ $reservation->email }}</li>
        <li>Phone: {{ $reservation->phone }}</li>
        <li>Room: {{ $reservation->room->name }}</li>
        <li>Arrival Date: {{ $reservation->arrival_date->format('Y-m-d') }}</li>
        <li>Departure Date: {{ $reservation->departure_date->format('Y-m-d') }}</li>
        <li>Total Price: {{ $reservation->price }} €</li>
    </ul>
</body>
</html>
