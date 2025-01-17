<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}'s Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>
        <p>About Me: {{ $user->aboutMe ?? 'N/A' }}</p>
        <p>Birthday: {{ $user->birthday ?? 'N/A' }}</p>
    </div>
</body>
</html>