<?php
    class ControlSesion{
	   var $objSesion;
        function __construct($objSesion){
         $this->objSesion=$objSesion;

        }

  function  validarIngreso(){
            $esValido=false;
          $objUsuario1 = new Sesion('','',''); 
			     $usu= $this->objSesion->getNomUsuario(); 
			     $con=$this->objSesion->getContrasena(); 
			     $objConexion = new ControlConexion();
			     try{
				$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
				$comandoSql="SELECT * FROM usuarios  WHERE Email='".$usu."' AND pass='".$con."'";
				$recordSet=$objConexion->ejecutarSelect($comandoSql);
				$registro = $recordSet->fetch_array(MYSQLI_BOTH);
				$objUsuario1->setNomUsuario($registro['Email']); 
				$objUsuario1->setContrasena($registro['pass']); 
        $this->objSesion->setPerfil($registro['fkPerfil']); 
                }
         	catch (Exception $e)
            	{
            	echo "ERROR ".$e->getMessage()."\n";
                }
            $objConexion->cerrarBd();

            if ($this->objSesion->getNomUsuario()==$objUsuario1->getNomUsuario() &&
               $this->objSesion->getContrasena()==$objUsuario1->getContrasena()  &&
               $this->objSesion->getNomUsuario() != "" &&
               $this->objSesion->getContrasena() != "")
			         {
              $esValido = true;
            }
            else
            {
              $esValido = false;
            }
      return $esValido;
      }

  function obtenerPerfil(){
    
		return  $this->objSesion->getPerfil();

  }
 }
?>