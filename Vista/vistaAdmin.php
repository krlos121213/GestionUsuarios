<?php
error_reporting(0);
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
echo '<script>alert (" su sesion es '.$_SESSION['Usu'].'");</script>';
if($_SESSION['perfil']!=1 ){
    echo "<script>
                alert('No tienes los permisos');
                window.location= 'vistaUsuarios.php'
    </script>";
    
}


echo"
<!DOCTYPE html>
<html lang='en'>

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
				
        <!-- Top content -->
        <div class='top-content'>
        	<div class='container'>

				<div class='row'>
					<div class='col-sm-12 text wow fadeInLeft'>
						<h1>Bienvenido ADMIN ".$_SESSION['Usu']."</h1>
						<div class='description'>
							<p class='medium-paragraph'>
								Modulo admin
							</p>
						</div>
					</div>
				</div>
                
            </div>
        </div>
        
        
        <!-- Footer -->
        <footer>
	        <div class='container'>
	        	<div class='row'>
	        		<div class='col-sm-12 footer-copyright'>
                    	&copy; creado por Carlos Andres Zapata</a>
                    </div>
                </div>
	        </div>
        </footer>


        <!-- Javascript -->
        <script src='../assets/js/jquery-1.11.1.min.js'></script>
        <script src='../assets/bootstrap/js/bootstrap.min.js'></script>
        <script src='../assets/js/jquery.backstretch.min.js'></script>
        <script src='../assets/js/wow.min.js'></script>
        <script src='../assets/js/retina-1.1.0.min.js'></script>
        <script src='../assets/js/scripts.js'></script>
        
        <!--[if lt IE 10]>
            <script src='../assets/js/placeholder.js'></script>
        <![endif]-->

    </body>

</html>
";
?>