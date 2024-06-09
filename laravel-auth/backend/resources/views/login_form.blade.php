<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/login" method="POST">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password", placeholder="Password" id="password">
        <button type="submit">Submit</button>
    </form>
    <a href="/field-form">Eight Field</a>
</body>
</html>