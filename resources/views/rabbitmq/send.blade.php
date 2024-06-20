<!DOCTYPE html>
<html>
<head>
    <title>Send Message</title>
</head>
<body>
    <h1>Send Message to RabbitMQ</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="/send-message">
        @csrf
        <label for="message">Message:</label>
        <input type="text" id="message" name="message" required>
        <button type="submit">Send</button>
    </form>
</body>
</html>