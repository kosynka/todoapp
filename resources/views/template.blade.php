<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToDo App</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="dist/app.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        @yield('content')
        
        <script src="dist/app.js" type="text/javascript"></script>
    </body>
</html>
