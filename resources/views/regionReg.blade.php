<!DOCTYPE html>
<html lang="en">
<head>
    <title>Region Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h5><b>Welcome System Admin</b></h5>    
    <h6><?php echo date("d-m-Y"); ?></h6>
    <h2>Add Region</h2>

    @if(!isset(Auth::user()->username))
        <script>window.location = "/";</script>
    @endif
    
    <form method = "post" action = "/admin/regionReg">
        {{csrf_field()}}

        <div class="form-group">
            <label for="zone">Zone:</label>
            <!-- <input type="number" class="form-control" name="zone"> -->
            <Select class="form-control" name="zone">
                @foreach($zones as $zone)
                    <option value="{{$zone->zcode}}">{{$zone->zshortdes}}</option>
                @endforeach
            </Select>
        </div>
        <div class="form-group">
            <label for="rcode">Region Code:</label>
            <input type="number" class="form-control" name="rcode" placeholder="Automatically" readonly>
        </div>
        <div class="form-group">
            <label for="rname">Region Name:</label>
            <input type="text" class="form-control" name="rname">
        </div>
        <input type="submit" class="btn btn-success" value="SAVE">
        <a href="/admin" class="btn btn-primary">BACK</a>
    </form>
    <!-- @foreach($zones as $zone)
        <p>{{$zone->zcode}}</p>
        <p>{{$zone->zlongdes}}</p>
        <p>{{$zone->zshortdes}}</p>
        <br/>
    @endforeach -->
</div>

</body>
</html>
