<?php
    class Controlusuario{
        var $objUsuario;

        function __construct($objUsuario){
            $this->objUsuario=$objUsuario;
        }

        //funcion para guardar un usuario en la bd

        function guardar(){

            $id=$this->objUsuario->getIdusuario();
            $nom=$this->objUsuario->getNombre();
            $contrasena=$this->objUsuario->getContrasena();
            $cedula=$this->objUsuario->getCedula();
            $perfil=$this->objUsuario->getFkPerfil();
            $correo=$this->objUsuario->getCorreo();
            
    
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    
            $comandosql="INSERT INTO usuarios (IDUSUARIO,NOMBRE,PASS,CEDULA,FKPERFIL,EMAIL) VALUES ('".$id."','".$nom."','".$contrasena."','".$cedula."','".$rol."','".$correo."')";
    
            $objConexion->ejecutarComandoSql($comandosql);
    
            $objConexion->cerrarBD();

            echo ($comandosql);
    
        }
    
        //funcion para consultar un usuario en la bd
        function consultar(){
    
            $id=$this->objUsuario->getIdusuario();
            $nom=$this->objUsuario->getNombre();
            $contrasena=$this->objUsuario->getContrasena();
            $cedula=$this->objUsuario->getCedula();
            $perfil=$this->objUsuario->getFkPerfil();;
            $correo=$this->objUsuario->getCorreo();
    
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    
            $comandosql="SELECT * FROM usuarios WHERE IDUSUARIO='".$id."'";
    
            $recordSet=$objConexion->ejecutarSelect($comandosql);
    
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);
    
            $this->objUsuario->setNombre($registro["Nombre"]);
            $this->objUsuario->setContrasena($registro["pass"]);
            $this->objUsuario->setCedula($registro["cedula"]);
            $this->objUsuario->setFkPerfil($registro["fkPerfil"]);
            $this->objUsuario->setCorreo($registro["Email"]);
            
            $objConexion->cerrarBD();
    
            return $this->objUsuario;
    
        }

         //funcion para consultar un usuario en la bd por su correo
        function consultarPorCorreo(){
    
            $id=$this->objUsuario->getIdusuario();
            $nom=$this->objUsuario->getNombre();
            $contrasena=$this->objUsuario->getContrasena();
            $cedula=$this->objUsuario->getCedula();
            $perfil=$this->objUsuario->getFkPerfil();;
            $correo=$this->objUsuario->getCorreo();
    
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    
            $comandosql="SELECT * FROM usuarios WHERE Email='".$correo."'";
    
            $recordSet=$objConexion->ejecutarSelect($comandosql);
    
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);

            $this->objUsuario->setid($registro["IdUsuario"]);
            $this->objUsuario->setNombre($registro["Nombre"]);
            $this->objUsuario->setContrasena($registro["pass"]);
            $this->objUsuario->setCedula($registro["cedula"]);
            $this->objUsuario->setFkPerfil($registro["fkPerfil"]);
            $this->objUsuario->setCorreo($registro["Email"]);
            
            $objConexion->cerrarBD();
    
            return $this->objUsuario;
    
        }
        
         //funcion para modificar un usuario en la bd
        function modificar(){
    
            $id=$this->objUsuario->getIdusuario();
            $nom=$this->objUsuario->getNombre();
            $contrasena=$this->objUsuario->getContrasena();
            $cedula=$this->objUsuario->getCedula();
            $perfil=$this->objUsuario->getFkPerfil();
            $correo=$this->objUsuario->getCorreo();
    
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    
            $comandosql="UPDATE usuarios SET NOMBRE='".$nom."',PASS='".$contrasena."',CEDULA='".$cedula."',FKPERFIL=".$perfil.",EMAIL='".$correo."'
            WHERE IDusuario=".$id."";
    
            $objConexion->ejecutarComandoSql($comandosql);
    
            $objConexion->cerrarBD();

            echo"$comandosql";
    
    
        }
    
         //funcion para borrar un usuario en la bd
        function borrar(){
    
            $id=$this->objUsuario->getIdusuario();
         
    
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    
            $comandosql="DELETE FROM usuarios WHERE IDusuario=".$id."";
    
            $objConexion->ejecutarComandoSql($comandosql);
    
            $objConexion->cerrarBD();
    
    
        }
    }




  



?>