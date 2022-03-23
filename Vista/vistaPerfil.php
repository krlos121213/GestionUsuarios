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
include("../modelo/Perfil.php");
include("../control/ControlPerfil.php");
include("../control/ControlListas.php");
include("../control/ControlConexion.php");
try{
    $id=$_POST["txtCodigo"];
    $nom=$_POST["txtNombre"];
    $descripcion=$_POST["txtDescripcion"];




    $bot=$_POST["btn"];
 switch ($bot) {
    case "Guardar":

        $objPerfil= new Perfil($id,$descripcion,$nom);
        $objControlPerfil =new ControlPerfil($objPerfil);
        $objPerfil=$objControlPerfil->guardar();
        echo "<script>alert('usuario guardado');</script>";
        break;

    case "Consultar":
        $objPerfil= new Perfil($id,$descripcion,$nom);
        $objControlPerfil =new ControlPerfil($objPerfil);
        $objPerfil=$objControlPerfil->consultar();
        
        
         $nom=$objPerfil->getNombre();
         $descripcion=$objPerfil->getDescripcion();
        
        
            

        break;
    case "Modificar":
        $objPerfil= new Perfil($id,$descripcion,$nom);
        $objControlPerfil =new ControlPerfil($objPerfil);
        $objPerfil=$objControlPerfil->modificar();

        echo "<script>alert('usuario Modificado');</script>";
        break;



    case "Borrar":
        $objPerfil= new Perfil($id,"","");
        $objControlPerfil =new ControlPerfil($objPerfil);
        $objPerfil=$objControlPerfil->borrar();
        echo "<script>alert('usuario borrado');</script>";

        break; 

    case "Listar":
        $objPerfil= new Perfil($id,"","","","","");
        $objControlListas= new ControlListas($objPerfil);
        $mat=$objControlListas->listarPerfiles();
        
        
            
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
<form method='post' action='VistaPerfil.php' id='formulario'>
<div id='contenedor'>
<h3>Perfiles </h3>
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
descripcion<input type='text' class='form-control' name='txtDescripcion' value='".$descripcion."'>
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
      <th scope='col'>DESCRIPCION</th>
    </tr>
  </thead>";
            for($i=0;$i<sizeof($mat);$i++) {
                echo "<tr>
                    <td>".$mat[$i][1]."</td><td>".$mat[$i][2]."</td><td>".$mat[$i][0]."</td>
                    </tr>";
         }
        echo "</table>";

echo "</form>
<li><a href='menu.php'>Inicio</a></li>
</body>
</html>
";
?>