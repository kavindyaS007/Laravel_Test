<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zone Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> -->
</head>
<body>
<div class="container">
    <h5><b>Welcome System Admin</b></h5>    
    <h6><?php echo date("d-m-Y"); ?></h6>
    <h2>Add Zone</h2>

    @if(!isset(Auth::user()->username))
        <script>window.location = "/";</script>
    @endif

    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach

    <form method = "post" action = "">
        {{csrf_field()}}

        <div class="form-group">
            <label for="zcode">Zone Code:</label>
            <input type="number" class="form-control" name="zcode" placeholder="Automatically" readonly>
        </div>
        <div class="form-group">
            <label for="zLdescription">Zone Long Description:</label>
            <input type="text" class="form-control" name="zLdescription">
        </div>
        <div class="form-group">
            <label for="zSdescription">Short Description:</label>
            <input type="text" class="form-control" name="zSdescription">
        </div>
        <!-- <button type="submit" class="btn btn-success">SAVE</button> -->
        <input type="submit" class="btn btn-success" value="SAVE">
        <a href="/admin" class="btn btn-primary">BACK</a>
    </form>
    
</div>

</body>
</html>
