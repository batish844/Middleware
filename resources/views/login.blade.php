<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter your Name" required>
        <button type="submit">Login</button>
    </form>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    
    @endif
</body>

</html>