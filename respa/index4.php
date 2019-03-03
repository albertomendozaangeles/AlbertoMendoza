<?php
require_once 'dbconnect.php';

session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$usuario = strip_tags($_POST['usuario']);
	$password = strip_tags($_POST['password']);
	
	$usuario = $DBcon->real_escape_string($usuario);
	$password = $DBcon->real_escape_string($password);

	$query = $DBcon->query("SELECT id_usuario,usuario,password,rol FROM usuario WHERE usuario='$usuario'");
	$row=$query->fetch_array();

	$count = $query->num_rows; 
// if email/password are correct returns must be 1 row Alberto Mendoza | Inkisidor | Administracion
	if ($password == $row['password'] && $count==1) {
		if($row['rol'] == "Administracion"){
			$_SESSION['userSession'] = $row['id_usuario'];
			//header("Location: home.php");
			echo "Entra como admin";
		}else
			echo "Entra como admin";
		
		{
	} 	
	} else {
		$msg = "<div class='alert alert-danger'> <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Usuario o Contraceña es incorrecata! </div>";
	}

	$DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body style="background: #eee url(img/congruent.png);">

<div class="signin-form" >

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
	    <img src="img/login/login.png" width="150px" height="120px" align="left" ><br><br><br><h3 class="form-signin-heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Iniciar Sesion </h3><hr /></img>
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>

        <div class="form-group">
        <label>Usuario</label>
        <input type="text" class="form-control" placeholder="Usuario" name="usuario" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
     	<hr />
        
		<center>
		    <div class="form-group">
	            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
	    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Inciar Sesion
        	</div>
        </center>   
      
      </form>

    </div>
    
</div>

</body>
</html>