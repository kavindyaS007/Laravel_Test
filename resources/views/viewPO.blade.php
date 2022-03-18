<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Purchase Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h5><b>Welcome System Admin</b></h5>    
    <h6><?php echo date("d-m-Y"); ?></h6>
    <h3>ADD INDIVIDUAL PURCHASE ORDER</h3>
    <form method = "post" action = "/user/viewPO">
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-2 form-group">
                <label for="region">Region </label>
                <Select class="form-control" name="region">
                    <option value="">zone id - region name - region code</option>
                    @foreach($regions as $region)
                        <option value="{{$region->rcode}}">{{$region->zone}} - {{$region->rname}} - {{$region->rcode}}</option>
                    @endforeach
                </Select>
            </div>
            <div class="col-md-2 form-group">
                <label for="territory">Territory </label>
                <Select class="form-control" name="territory">
                <option value="">region code - territory name - territory code</option>
                    @foreach($territories as $territory)
                        <option value="{{$territory->tcode}}">{{$territory->region}} - {{$territory->tname}} - {{$territory->tcode}}</option>
                    @endforeach
                </Select> 
            </div>
            <div class="col-md-2 form-group">
                <label for="ponum">PO No </label>
                <input type="number" class="form-control" name="ponum">
            </div>
            <div class="col-md-2 form-group">
                <label for="fdate">FROM </label>
                <input type="date" class="form-control" name="fdate">
            </div>
            <div class="col-md-2 form-group">
                <label for="tdate">TO </label>
                <input type="date" class="form-control" name="tdate">
            </div>
        </div>
        <!-- <input type="submit" class="btn btn-success" value="VIEW PO"> -->

        <div>
            <table class="table">
                <thead><tr>
                    <th>REGION</th>
                    <th>TERRITORY</th>
                    <th>DISTRIBUTOR</th>
                    <th>PO NUMBER</th>
                    <th>DATE</th>
                    <th>TIME</th>
                    <th>TOTAL AMOUNT</th>
                    <th>VIEW PO</th>
                </tr></thead>
                <tbody>
                    
                    @foreach($podetails as $podetail)
                        <tr>
                            <td>{{$podetail->region}}</td>
                            <td>{{$podetail->territory}}</td>
                            <td>{{$podetail->distributor}}</td>
                            <td>{{$podetail->poNo}}</td>
                            <td>{{$podetail->date}}</td>
                            <td></td>
                            <td>{{$podetail->totalPrice}}</td>
                            <td><button >VIEW</button></td>
                        </tr>

                    @endforeach    
                </tbody>
            </table>
        </div>
    </form>
</div>

</body>
</html>
