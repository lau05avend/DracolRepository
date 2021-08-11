<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LOGIN</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/login.css'); }}">


</head>
<body>
<div class="login-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<div class="avatar">
			<img src="http://assets.stickpng.com/images/585e4beacb11b227491c3399.png" alt="Avatar">
		</div>
        <h2 class="text-center">Inicio de sesión</h2>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Usuario" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
        </div>
		<div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Recuerdame</label>
            <a href="#" class="pull-right">Olvidaste tu contraseña?</a>
        </div>
    </form>

</div>
</body>
</html>
