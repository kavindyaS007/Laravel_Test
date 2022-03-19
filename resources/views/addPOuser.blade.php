<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Purchase Order</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h5><b>Welcome System Admin</b></h5>    
    <h6><?php echo date("d-m-Y"); ?></h6>
    <h3>ADD INDIVIDUAL PURCHASE ORDER</h3>
    <form method = "post" action = "/user/addPO" id="form">
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
                    <!-- <th>UNITS</th> -->
                    <th>TOTAL PRICE</th>
                </tr></thead>
                <tbody>
                    @if(count($products)>0)
                    <?php $no = 0; $total=count($products); ?>
                    @foreach($products as $product)
                       
                        <tr>
                            <td><input type="text" name="skucode" id="skucode<?php echo $no; ?>" value="{{$product->skucode}}" readonly></td>
                            <td><input type="text" name="skuname" id="skuname<?php echo $no; ?>" value="{{$product->mpname}} {{$product->weight}}{{$product->unit}}" readonly></td>                            
                            <td><input type="number" name="unitprice" id="unitprice<?php echo $no; ?>" value="{{$product->distPrice}}" readonly></td>
                            <td><input type="number" name="avbqty" id="avbqty<?php echo $no; ?>" value="{{$product->quantity}}" readonly></td>
                            <td><input type="number" name="qty" id="qty<?php echo $no; ?>" value="" oninput="UpdateItem('{{$no}}','{{$total}}')"></td>
                            
                            <!-- <td><input type="number" name="units" id="units<?php echo $no;?>" value="{{$product->units}}" onchange="" readonly></td> -->
                            <td><input type="number" name="price" id="price<?php echo $no;?>" value="" onchange="" readonly></td>
                            <input type="hidden" name="weight" id="weight<?php echo $no;?>" value="{{$product->weight}}">
                        </tr>
                        <?php $no++; ?>    
                    @endforeach
                    @endif
                    <tr>
                        <td></td><td></td><td></td><td></td><th>Total Order Price :</th>
                        <td><input type="text" id="totalPrice" name="totalPrice" value="" readonly></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="submit" class="btn btn-success" value="ADD PO">
    </form>
</div>
<script>
      
    
    function update(){

        var formElements = document.forms['form'].elements['skucode'].value;

        var form = document.forms["form"];
        var units =  form.elements["units"];
        var price = eval(form.qty.value) * eval(form.unitprice.value);

        //var total = sum(price);
        form.units.value =  20;
        form.price.value =  10 ;

        sumPrice= {{$product->distPrice}} *{{$product->quantity}}
        
        console.log( "value"+  formElements)
        
    }
</script>
</body>
</html>


<script>
function UpdateItem(n,nf){

    
    document.getElementById('price'+n).value=document.getElementById('qty'+n).value * document.getElementById('unitprice'+n).value;

    
    //console.log(document.getElementById('t'+n).value);
    var to=0;
    
    var or='';
    for(var i = 0; i < nf ; i++){
        if(document.getElementById('price'+i).value!=''){
            to=to+parseInt(document.getElementById('price'+i).value);
            
        }
    }
    var finalTotal =0;
    for(var i = 0; i < nf ; i++){

        if(document.getElementById('price'+i).value!=''){
            
            finalTotal = finalTotal +parseInt(document.getElementById('price'+i).value); 
            
        }
    }


    document.getElementById('totalPrice').value=finalTotal;
    


    // for(var i = 0; i < nf ; i++){
    //     if(document.getElementById('price'+i).value!=''){
    //         or=or+document.getElementById('sc'+i).innerText+','+document.getElementById('sn'+i).innerText+','+
    //               document.getElementById('dp'+i).innerText+','+document.getElementById('q'+i).innerText+','+
    //               document.getElementById('eq'+i).value+','+document.getElementById('t'+i).value+'\n';
    //     }
    // }
    
    //document.getElementById('or').value=or;
    //console.log(document.getElementById('or').value);
    
}
</script>