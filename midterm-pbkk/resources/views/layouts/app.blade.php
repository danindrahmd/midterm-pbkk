<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>item</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @vite('resources/css/app.css')
    <!-- Include your stylesheets and other head elements here -->
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    <!-- Include your scripts and other body elements here -->
</body>
</html>
