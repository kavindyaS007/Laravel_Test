<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zone Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h5><b>Welcome System Admin</b></h5>    
    <h6><?php echo date("d-m-Y"); ?></h6>
    <h3>ADD INDIVIDUAL PURCHASE ORDER</h3>
    <form method = "post" action = "/user/addPO">
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-3 form-group">
                <label for="zcode">Zone </label>
                <input type="number" class="form-control" name="zcode">
            </div>
            <div class="col-md-3 form-group">
                <label for="rcode">Region </label>
                <input type="number" class="form-control" name="rcode">
            </div>
            <div class="col-md-3 form-group">
                <label for="tcode">Territory </label>
                <input type="number" class="form-control" name="tcode">
            </div>
            <div class="col-md-3 form-group">
                <label for="dname">Distributer </label>
                <input type="text" class="form-control" name="dname">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="date">Date </label>
                <input type="date" class="form-control" name="date">
            </div>
            <div class="col-md-4 form-group">
                <label for="ponum">PO No </label>
                <input type="number" class="form-control" name="ponum">
            </div>
            <div class="col-md-4 form-group">
                <label for="remark">Remark </label>
                <input type="text" class="form-control" name="remark">
            </div>
        </div>
        <div>
            <table class="table">
                <thead><tr>
                    <th>SKU CODE</th>
                    <th>SKU NAME</th>
                    <th>UNIT PRICE</th>
                    <th>AVB QTY</th>
                    <th>ENTER QTY</th>
                    <th>UNITD</th>
                    <th>TOTAL PRICE</th>
                </tr></thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- <button type="submit" class="btn btn-success">SAVE</button> -->
        <input type="submit" class="btn btn-success" value="ADD PO">
    </form>
</div>

</body>
</html>
