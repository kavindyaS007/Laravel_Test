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
<div class="container">
    <h5><b>Welcome System Admin</b></h5>    
    <h6><?php echo date("d-m-Y"); ?></h6>
    <h2>ADD USERS</h2>
    <form method = "post" action = "/admin/userReg">
        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="nic">NIC:</label>
            <input type="text" class="form-control" name="nic">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="form-group">
            <label for="mob">Mobile:</label>
            <input type="tel" class="form-control" name="mob">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <Select class="form-control" name="gender">
                <option value="female">Female</option>
                <option value="male">Male</option>
                <option value="other">Other</option>
            </Select>
        </div>
        <div class="form-group">
            <label for="territory">Territory:</label>
            <Select class="form-control" name="territory">
                <option value="t1">t1</option>
                <option value="t2">t2</option>
                <option value="t3">t3</option>
            </Select>
        </div>
        <div class="form-group">
            <label for="uname">User Name:</label>
            <input type="text" class="form-control" name="uname">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="pwd">
        </div>
        <input type="submit" class="btn btn-success" value="SAVE">
        <a href="/admin" class="btn btn-primary">BACK</a>
    </form>
</div>

</body>
</html>
