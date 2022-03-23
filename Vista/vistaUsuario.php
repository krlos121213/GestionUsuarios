<?php
error_reporting(0);
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');

if($_SESSION['perfil']!=1 ){
    echo "<script>
                alert('No tienes los permisos');
                window.location= 'menu.php'
    </script>";
    
}

include("../control/configBd.php");
include("../modelo/Usuario.php");
include("../control/ControlUsuario.php");
include("../control/ControlListas.php");
include("../control/ControlConexion.php");
try{
    $id=$_POST["txtCodigo"];
    $nom=$_POST["txtNombre"];
    $contrasena=$_POST["txtContrasena"];
    $cedula=$_POST["txtCedula"];
    $perfil=$_POST["txtPerfil"];
    $correo=$_POST["txtCorreo"];
    





    $bot=$_POST["btn"];
 switch ($bot) {
    case "Guardar":

        $objUsuario= new Usuario($id,$nom,$contrasena,$cedula,$perfil,$correo);
        $objControlUsuario= new ControlUsuario($objUsuario);
        $objUsuario=$objControlUsuario->guardar();
        echo "<script>alert('usuario guardado');</script>";
        break;

    case "Consultar":
        $objUsuario= new Usuario($id,$nom,$contrasena,$cedula,$perfil,$correo);
        $objControlUsuario= new ControlUsuario($objUsuario);

        $objUsuario=$objControlUsuario->consultar();
         $nom=$objUsuario->getNombre();
         $contrasena=$objUsuario->getContrasena();
         $cedula=$objUsuario->getCedula();
         $perfil=$objUsuario->getFkPerfil();
         $correo=$objUsuario->getCorreo();
        
            

        break;
    case "Modificar":
        $objUsuario= new Usuario($id,$nom,$contrasena,$cedula,$perfil,$correo);
        $objControlUsuario= new ControlUsuario($objUsuario);
        $objUsuario=$objControlUsuario->modificar();

        echo "<script>alert('usuario Modificado');</script>";
        break;



    case "Borrar":
        $objUsuario= new Usuario($id,"","","",0,"");
        $objControlUsuario= new ControlUsuario($objUsuario);
        $objUsuario=$objControlUsuario->borrar();
        echo "<script>alert('usuario borrado');</script>";

        break; 

    case "Listar":
        $objUsuario= new Usuario($id,"","","","","");
        $objControlListas= new ControlListas($objUsuario);
        $mat=$objControlListas->listarUsuarios();
        
        
            
} 
}
catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}
echo"
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title></title>

       
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Josefin+Sans:300,400|Roboto:300,400,500'>
        <link rel='stylesheet' href='../assets/bootstrap/css/bootstrap.min.css'>
        <link rel='stylesheet' href='../assets/font-awesome/css/font-awesome.min.css'>
        <link rel='stylesheet' href='../assets/css/animate.css'>
        <link rel='stylesheet' href='../assets/css/style.css'>

        
            <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
            <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
      

        <!-- Favicon and touch icons -->
        <link rel='shortcut icon' href='../assets/ico/favicon.png'>
        <link rel='apple-touch-icon-precomposed' sizes='144x144' href='../assets/ico/apple-touch-icon-144-precomposed.png'>
        <link rel='apple-touch-icon-precomposed' sizes='114x114' href='../assets/ico/apple-touch-icon-114-precomposed.png'>
        <link rel='apple-touch-icon-precomposed' sizes='72x72' href='../assets/ico/apple-touch-icon-72-precomposed.png'>
        <link rel='apple-touch-icon-precomposed' href='../assets/ico/apple-touch-icon-57-precomposed.png'>
</head>
<body>
<!-- Top menu -->
		<nav class='navbar navbar-inverse' role='navigation'>
			<div class='container'>
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#top-navbar-1'>
						<span class='sr-only'>Toggle navigation</span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</button>
				
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class='collapse navbar-collapse' id='top-navbar-1'>
					<ul class='nav navbar-nav navbar-right'>
                    <li><a href='../vista/VistaAdmin.php'>Inicio</a></li>
                    <li><a href='../vista/VistaUsuario.php'>Usuarios</a></li>
                    <li><a href='../vista/VistaPerfil.php'>Perfiles</a></li>
                    <li><a href='../vista/cerrarSesion.php'>Cerrar Sesión</a></li>
					</ul>
				</div>
			</div>
		</nav>

 <main class='container'>
<form method='post' action='VistaUsuario.php' id='formulario'>
<div id='contenedor'>
<h3>Usuarios </h3>
<div>
<div class='row '>
<div class='form-group' col-md-2>
Código<input type='text' class='form-control' name='txtCodigo' value='".$id."'>
</div>
</div>

 <div class='row '>
<div class='form-group' col-md-2>
Nombre<input type='text' class='form-control' name='txtNombre' value='".$nom."'>
</div>
</div>

 <div class='row '>
<div class='form-group' col-md-1>
Contraseña<input type='password' class='form-control' name='txtContrasena' value='".$contrasena."'>
</div>

 </div>

 <div class='row '>
<div class='form-group' col-md-1>
Cedula<input type='text' class='form-control' name='txtCedula' value='".$cedula."'>
</div>
</div>

 <div class='row '>
<div class='form-group' col-md-1>
Rol<input type='text' class='form-control' name='txtPerfil' value='".$perfil."'>
</div>
</div>

 <div class='row '>
<div class='form-group' col-md-1>
correo<input type='text' class='form-control' name='txtCorreo' value='".$correo."'>
</div>
</div>

 </div>



 <div class='row'>
<input type='submit' class='btn btn-success' onclick='validarfor()' name='btn' value='Guardar'></td>
<input type='submit' class='btn btn-info' name='btn' value='Consultar'></td>
<input type='submit' class='btn btn-primary' name='btn' value='Modificar'></td>
<input type='submit' class='btn btn-danger' name='btn' value='Borrar'></td>
<input type='submit' class='btn btn-danger' name='btn' value='Listar'></td>
</div>
</main>";
echo "<table class='table table-dark'>";
echo "<thead>
    <tr>
      <th scope='col'>ID</th>
      <th scope='col'>NOMBRE</th>
      <th scope='col'>CEDULA</th>
      <th scope='col'>Perfil</th>
      <th scope='col'>CORREO</th>
    </tr>
  </thead>";
            for($i=0;$i<sizeof($mat);$i++) {
                echo "<tr>
                    <td>".$mat[$i][1]."</td><td>".$mat[$i][2]."</td><td>".$mat[$i][4]."</td>
                    <td>".$mat[$i][3]."</td><td>".$mat[$i][0]."</td>
                    </tr>";
         }
        echo "</table>";

echo "</form>
<li><a href='menu.php'>Inicio</a></li>
</body>
</html>
";
?>