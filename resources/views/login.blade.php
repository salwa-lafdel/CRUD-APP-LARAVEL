<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="{{route('connect')}}" method="post">
        @csrf
        <label for="">Email : </label>
        <input type="email" name="email" id="">
        <br>
        <label for="">Password : </label>
        <input type="password" name="password" id="">
        <input type="submit" value="Login">
    </form>
    @error('erreur')
        {{$message}}
    @enderror
</body>
</html>
