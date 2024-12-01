<!DOCTYPE html>
<html>
<head>
    <title>Thank You for Your Reservation</title>
</head>
<body>
    <h1>Thank You for Your Reservation!</h1>
    <p>Dear {{ $reservation->name }},</p>
    <p>We have received your reservation:</p>
    <ul>
        <li>Room: {{ $reservation->room->name }}</li>
        <li>Arrival Date: {{ $reservation->arrival_date->format('Y-m-d') }}</li>
        <li>Departure Date: {{ $reservation->departure_date->format('Y-m-d') }}</li>
        <li>Total Price: {{ $reservation->price }} €</li>
    </ul>
    <p>We look forward to welcoming you!</p>
</body>
</html>
