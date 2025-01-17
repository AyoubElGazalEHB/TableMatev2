<!DOCTYPE html>
<html>
<head>
    <title>Response to Your Contact Form Submission</title>
</head>
<body>
    <h1>Hello {{ $contact->name }},</h1>
    <p>Thank you for reaching out to us. Here's our response:</p>
    <p><strong>Response:</strong></p>
    <p>{{ $response }}</p>
    <p>Best regards,</p>
    <p>The Admin Team</p>
</body>
</html>