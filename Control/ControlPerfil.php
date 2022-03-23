<?php
    class ControlPerfil{
        var $objPerfil;

        //constructor de la clase
        function __construct($objPerfil){
            $this->objPerfil=$objPerfil;
        }

        //funcion para guardar un perfil en la bd

        function guardar(){

            $id=$this->objPerfil->getIdPerfil();
            $descripcion=$this->objPerfil->getDescripcion();
            $nombre=$this->objPerfil->getNombre();

            

            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    
            $comandosql="INSERT INTO perfil (IDPERFIL,DESCRIPCION,NOMBRE) VALUES ('".$id."','".$descripcion."','".$nombre."')";
    
            $objConexion->ejecutarComandoSql($comandosql);
    
            $objConexion->cerrarBD();

            
    
        }
    
        //funcion para consultar un perfil en la bd
        function consultar(){
    
            $id=$this->objPerfil->getIdPerfil();
            $descripcion=$this->objPerfil->getDescripcion();
            $nombre=$this->objPerfil->getNombre();
    
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    
            $comandosql="SELECT * FROM perfil WHERE IdPerfil='".$id."'";
    
            $recordSet=$objConexion->ejecutarSelect($comandosql);
    
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);
    
            $this->objPerfil->setNombre($registro["Nombre"]);
            $this->objPerfil->setDescripcion($registro["Descripcion"]);
            
            
            $objConexion->cerrarBD();
    
            return $this->objPerfil;
    
        }

        //funcion para modificar un perfil en la bd
    
        function modificar(){
    
            $id=$this->objPerfil->getIdPerfil();
            $descripcion=$this->objPerfil->getDescripcion();
            $nombre=$this->objPerfil->getNombre();
    
    
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    
            $comandosql="UPDATE perfil SET Nombre='".$nombre."',Descripcion='".$descripcion."'
            WHERE IdPerfil=".$id."";
    
            $objConexion->ejecutarComandoSql($comandosql);
    
            $objConexion->cerrarBD();

            echo ($comandosql);
    
    
        }


        //funcion para borrar un perfil en la bd
    
        
        function borrar(){
    
            $id=$this->objPerfil->getIdPerfil();
         
    
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    
            $comandosql="DELETE FROM perfil WHERE IdPerfil=".$id."";
    
            $objConexion->ejecutarComandoSql($comandosql);
    
            $objConexion->cerrarBD();
    
    
        }
    }




  



?>