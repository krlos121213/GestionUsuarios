<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("control/configBd.php");
include("modelo/Sesion.php");
include("control/ControlSesion.php");
include("control/ControlConexion.php");

try{
    $usu=$_POST["txtUsuario"];
    $con=$_POST["txtContrasena"];
    $bot=$_POST["btn"];

    if($bot=="Ingresar"){
    $objSesion=new Sesion($usu,$con,'');
    $objCtrSesion =new ControlSesion($objSesion);
        if($objCtrSesion->validarIngreso()){
			$_SESSION['Usu']=  $usu;
            $_SESSION['Con']=  $con;
			$_SESSION['perfil']=  $objCtrSesion->obtenerPerfil();

            if($_SESSION['perfil']==1){
                header('Location: vista/vistaAdmin.php');
            }else{
                header('Location: vista/vistaUsuarios.php');
            }
			
        }
        else{
            echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";
        }
    }
}
catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}
echo "<script>alert('Usuario = carlos@yopmail.com  Contraseña= 1234');</script>";
echo "
<link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    
    <!--Fontawesome CDN-->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css' integrity='sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU' crossorigin='anonymous'>

	<!--Custom styles-->
	<link rel='stylesheet' type='text/css' href='misEstilos.css'>
</head>
<body>
<div class='container'>
	<div class='d-flex justify-content-center h-100'>
		<div class='card'>
			<div class='card-header'>
				<h3>Sign In</h3>
			</div>
			<div class='card-body'>
				<form method='post' action='index.php'>
					<div class='input-group form-group'>
						<div class='input-group-prepend'>
							<span class='input-group-text'><i class='fas fa-user'></i></span>
						</div>
						<input type='text' class='form-control' placeholder='username' name='txtUsuario' >
						
					</div>
					<div class='input-group form-group'>
						<div class='input-group-prepend'>
							<span class='input-group-text'><i class='fas fa-key'></i></span>
						</div>
						<input type='password' class='form-control' placeholder='password' name='txtContrasena'>
					</div>
					<div class='row align-items-center remember'>
						<input type='checkbox'>Remember Me
					</div>
					<div class='form-group'>
						<input type='submit' value='Ingresar' class='btn float-right login_btn' name='btn'>
					</div>
				</form>
			</div>
			<div class='card-footer'>
				
				
			</div>
		</div>
	</div>
</div>
</body>
</html>
";
?>