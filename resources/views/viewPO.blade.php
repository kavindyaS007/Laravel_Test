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
    <form method = "post" action = "">
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-2 form-group">
                <label for="rcode">Region </label>
                <input type="number" class="form-control" name="rcode">
            </div>
            <div class="col-md-2 form-group">
                <label for="tcode">Territory </label>
                <input type="number" class="form-control" name="tcode">
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
        <input type="submit" class="btn btn-success" value="VIEW PO">

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
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

</body>
</html>
