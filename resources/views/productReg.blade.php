<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    @if(!isset(Auth::user()->username))
        <script>window.location = "/";</script>
    @endif
    
<div class="container">
    <h5><b>Welcome System Admin</b></h5>    
    <h6><?php echo date("d-m-Y"); ?></h6>
    <h3>ADD SKU</h3>

    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach

    <form method = "post" action = "/admin/productReg">
        {{csrf_field()}}

        <div class="form-group">
            <label for="skuid">SKU ID:</label>
            <input type="number" class="form-control" name="skuid" placeholder="Automatically" readonly>
        </div>
        <div class="form-group">
            <label for="skucode">SKU Code:</label>
            <input type="text" class="form-control" name="skucode" placeholder="Ex: ABC 001">
        </div>
        <div class="form-group">
            <label for="skuname">SKU Name:</label>
            <input type="text" class="form-control" name="mpname">
        </div>
        <div class="form-group">
            <label for="mrp">MRP (Rs.):</label>
            <input type="number" class="form-control" name="mrp">
        </div>
        <div class="form-group">
            <label for="distPrice">Distributor Price (Rs.):</label>
            <input type="number" class="form-control" name="distPrice">
        </div>
        <div class="form-group">
            <label for="weight">Weight/Volume:</label>
            <div class="row">
                <div class = "col-md-4">
                    <input type="number" class="form-control" name="weight">
                </div>
                <div class = "col-md-2">
                    <Select class="form-control col-md-3" name="unit">
                        <option value="G">g</option>
                        <option value="KG">kg</option>
                        <option value="ML">ml</option>
                        <option value="L">l</option>
                </Select>
                </div>
                
            </div>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" name="quantity">
        </div>

        <input type="submit" class="btn btn-success" value="SAVE">
        <a href="/admin" class="btn btn-primary">BACK</a>
    </form>
</div>

</body>
</html>