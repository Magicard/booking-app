<!-- resources/views/booking.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Styles / Scripts -->
    <title>Booking Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
<div id="app"></div>
</body>
</html>
