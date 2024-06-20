<!DOCTYPE html>
<html>
<head>
    <title>Receive Messages</title>
</head>
<body>
    <h1>Received Messages from RabbitMQ</h1>

    @if (!empty($messages))
        <ul>
            @foreach ($messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @else
        <p>No messages received.</p>
    @endif
</body>
</html>