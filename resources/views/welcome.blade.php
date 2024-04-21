<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Channel Example</title>
    <!-- Include necessary scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <h1>Private Channel Example {{Auth::user()->name}}</h1>
    <div id="notifications"></div>

    <script>
        const userId = '{{ Auth::id() }}'; // Get the authenticated user's ID
        const echo = window.Echo.private(`private-channel.user.${userId}`);

        echo.listen('.App\\Events\\PrivateChannelUser', (e) => {
            // Append the received message to the notifications div
            $('#notifications').append('<p>' + e.message + '</p>');
        });
    </script>
</body>
</html>
