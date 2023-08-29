<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <div class="container">
        <h1>Hey, Admin</h1>
        <p>{{ $mailData['first_name'] }} {{ $mailData['last_name'] }} tried to Contact you</p>
        <p><strong>Contact Information:</strong></p>
        <ul>
            <li><strong>Email:</strong> {{ $mailData['email'] }}</li>
            <li><strong>Phone:</strong> {{ $mailData['phone'] }}</li>
        </ul>
        <p><strong>Message:</strong></p>
        <p>{{ $mailData['message'] }}</p>
        <p>Thank you</p>
    </div>
</body>
</html>