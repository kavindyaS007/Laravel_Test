<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Purchase Order</title>
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
                <Select class="form-control" name="zone">
                    <option>zone id - zone name</option>
                    @foreach($zones as $zone)
                        <option value="{{$zone->zcode}}">{{$zone->zcode}} - {{$zone->zshortdes}}</option>
                    @endforeach
                </Select>
            </div>
            <div class="col-md-3 form-group">
                <label for="rcode">Region </label>
                <Select class="form-control" name="region">
                    <option value="">zone id - region name - region code</option>
                    @foreach($regions as $region)
                        <option value="{{$region->rcode}}">{{$region->zone}} - {{$region->rname}} - {{$region->rcode}}</option>
                    @endforeach
                </Select>
            </div>
            <div class="col-md-3 form-group">
                <label for="tcode">Territory </label>
                <Select class="form-control" name="territory">
                <option value="">region code - territory name - territory code</option>
                    @foreach($territories as $territory)
                        <option value="{{$territory->tcode}}">{{$territory->region}} - {{$territory->tname}} - {{$territory->tcode}}</option>
                    @endforeach
                </Select>            
            </div>
            <div class="col-md-3 form-group">
                <label for="dname">Distributer </label>
                <Select class="form-control" name="dname">
                <option value="">territory code - distributor's name</option>
                    @foreach($new_users as $new_user)
                        <option value="{{$new_user->id}}">{{$new_user->territory}} - {{$new_user->name}}</option>
                    @endforeach
                </Select> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="date">Date </label>
                <input type="text" class="form-control" name="date" value="<?php echo date("d-m-Y"); ?>" readonly>
            </div>
            <div class="col-md-4 form-group">
                <label for="ponum">PO No </label>
                <input type="number" class="form-control" name="ponum" placeholder="Automatically" readonly>
            </div>
            <div class="col-md-4 form-group">
                <label for="remark">Remark </label>
                <input type="text" class="form-control" name="remark">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead><tr>
                    <th>SKU CODE</th>
                    <th>SKU NAME</th>
                    <th>UNIT PRICE</th>
                    <th>AVB QTY</th>
                    <th>ENTER QTY</th>
                    <th>UNITS</th>
                    <th>TOTAL PRICE</th>
                </tr></thead>
                <tbody>
                    @foreach($products as $product)
                    <script>
                            function update(){
                                var form = document.forms[0];
                                var units =  eval(form.weight.value) * eval(form.qty.value);
                                var price = eval(form.qty.value) * eval(form.unitprice.value);
                                //var total = sum(price);
                                form.units.value = isNaN(units) ? "" : units;
                                form.price.value = isNaN(price) ? "" : price;
                            }
                        </script>
                        <tr>
                            <td><input type="text" name="skucode" id="skucode" value="{{$product->skucode}}" readonly></td>
                            <td><input type="text" name="skuname" id="skuname" value="{{$product->mpname}} {{$product->weight}}{{$product->unit}}" readonly></td>                            
                            <td><input type="number" name="unitprice" id="unitprice" value="{{$product->distPrice}}" readonly></td>
                            <td><input type="number" name="avbqty" id="avbqty" value="{{$product->quantity}}" readonly></td>
                            <td><input type="number" name="qty" id="qty" value=""></td>
                            <td><input type="number" name="units" id="units" value="" onchange="update()" readonly></td>
                            <td><input type="number" name="price" id="price" value="" onchange="update()" readonly></td>
                            <input type="hidden" name="weight" id="weight" value="{{$product->weight}}">
                            <!-- <input type="hidden" name="total" id="total" value="{{$product->total}}"> -->
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <input type="submit" class="btn btn-success" value="ADD PO">
    </form>
</div>

</body>
</html>
