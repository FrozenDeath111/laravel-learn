<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>post</title>
</head>
<body>
    <h3>Post ID: {{$id}}</h3>
    <h3>Post Title: {{$post['title']}}</h3>
    <h4>User: {{$post['user_id']}}</h4>
    <h4>Auth: {{$user['id']}}</h4>
    <p>Body: {{$post['description']}}</p>
</body>
</html>