<!DOCTYPE html>
<html lang="en">
<head>
    <title>Territory Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h5><b>Welcome System Admin</b></h5>    
    <h6><?php echo date("d-m-Y"); ?></h6>
    <h2>Add Territory</h2>

    

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
            <label for="zone">Zone:</label>
            <Select class="form-control" name="zone" id="zone">
                @foreach($zones as $zone)
                    <option value="{{$zone->zcode}}">{{$zone->zcode}} - {{$zone->zshortdes}}</option>
                @endforeach
            </Select>
        </div>
        <div class="form-group">
            <label for="region">Region:</label>
            <Select class="form-control" name="region">
                @foreach($regions as $region)
                    <option value="{{$region->rcode}}">{{$region->zone}} - {{$region->rname}}</option>
                @endforeach
            </Select>
        </div>
        <div class="form-group">
            <label for="tcode">Territory Code:</label>
            <input type="number" class="form-control" name="tcode" placeholder="Automatically" readonly>
        </div>
        <div class="form-group">
            <label for="tname">Territory Name:</label>
            <input type="text" class="form-control" name="tname">
        </div>
        <button type="submit" class="btn btn-success">SAVE</button>
        <a href="/admin" class="btn btn-primary">BACK</a>
    </form>
</div>

</body>
</html>