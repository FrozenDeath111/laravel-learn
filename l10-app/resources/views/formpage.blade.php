<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>
</head>
<body>
    <form action="/register" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="test" name="email" placeholder="Email">
        <input type="text" name="phone" placeholder="Phone">
        <input type="text" name="password" placeholder="Password">
        <button type="submit">Submit</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>