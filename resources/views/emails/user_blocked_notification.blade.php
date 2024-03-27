<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Blocked Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            margin-top: 0;
            margin-bottom: 20px;
            color: #555;
        }

        .footer {
            margin-top: 20px;
            background-color: #f5f5f5;
            padding: 10px 20px;
            border-top: 1px solid #ddd;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Hello {{ $user->name }},</h2>

        @if ($action == 'blocked')
            <p>Your account has been blocked. If you believe this is a mistake, please contact support.</p>
        @else
            <p>Your account has been unblocked. You can now access your account normally.</p>
            <p><a href="http://localhost:8000/home" class="button">Go to Home</a></p>
        @endif

        <p>Thank you,</p>
        <p>Your Application Team</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} PROBOOK. All rights reserved.
    </div>
</body>

</html>
