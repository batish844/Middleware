<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Non-Gradute Page</title>
</head>
<body>
    <h1>Non Graduate Page</h1>
    <?php
    $student = session('student');?>
<form action="{{route('logout')}}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>