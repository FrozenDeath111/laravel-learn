<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth</title>
</head>
<body>
    <h1>Welcome {{ $user->email }}</h1>
    <a href="/logout">Logout</a>
</body>
</html>