<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h5><b>Welcome System Admin</b></h5>    
    <h6><?php echo date("d-m-Y"); ?></h6>
    @if(isset(Auth::user()->username))
        <div class="alert alert-success success-block">
            <strong>Welcome {{Auth::user()->username}}</strong>
            <br/>
            <a href="{{ url('/logout') }}">Logout</a>
        </div>
    @else
        <script>window.location = "/";</script>
        
    @endif
    <form>
        <ul>
            <li><a href ="/admin/zoneReg">Add Zone</a></li>
            <li><a href ="/admin/regionReg">Add Region</a></li>
            <li><a href ="/admin/territoryReg">Add Territory</a></li>
            <li><a href ="/admin/userReg">Add User</a></li>
            <li><a href ="/admin/productReg">Add Product</a></li>
        </ul>
    </form>
</div>

</body>
</html>
