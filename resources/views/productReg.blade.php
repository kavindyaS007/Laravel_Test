<!DOCTYPE html>
<html lang="en">
<head>
    <title>Region Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    @if(!isset(Auth::user()->username))
        <script>window.location = "/";</script>
    @endif

    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
    
<div class="container">
    <h5><b>Welcome System Admin</b></h5>    
    <h6><?php echo date("d-m-Y"); ?></h6>
    <h3>ADD SKU</h3>
    <form method = "post" action = "/admin/userReg">
        {{csrf_field()}}

        <div class="form-group">
            <label for="skuid">SKU ID:</label>
            <input type="number" class="form-control" name="skuid">
        </div>
        <div class="form-group">
            <label for="skucode">SKU Code:</label>
            <input type="text" class="form-control" name="skucode">
        </div>
        <div class="form-group">
            <label for="skuname">SKU Name:</label>
            <input type="text" class="form-control" name="skuname">
        </div>
        <div class="form-group">
            <label for="mrp">MRP:</label>
            <input type="text" class="form-control" name="mrp">
        </div>
        <div class="form-group">
            <label for="distPrice">Distributor Price:</label>
            <input type="number" class="form-control" name="distPrice">
        </div>
        <div class="form-group">
            <label for="weight">Weight/Volume:</label>
            <input type="text" class="form-control" name="weight">
            <Select class="form-control" name="weight">
                <option value="w1">g</option>
                <option value="w2">kg</option>
            </Select>
        </div>
        <input type="submit" class="btn btn-success" value="SAVE">
        <a href="/admin" class="btn btn-primary">BACK</a>
    </form>
</div>

</body>
</html>
