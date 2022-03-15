<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container box">
    <h1>Purchasing System</h1>
    <h2>Login</h2>

    @if(isset(Auth::user()->username))
        <script>window.location="/admin";</script>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
            {{$errors}}
        </div>
    @endif
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
    <form method="post" action="{{ url('/chklogin') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password">
        </div>
        <input type="submit" class="btn btn-success" value="LOGIN">
    </form>
</div>

</body>
</html>
