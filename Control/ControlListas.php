<?php


class ControlListas{

    //funcion para traer todos los datos de la tabla usuarios de la bd
    function listarUsuarios(){

        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="SELECT * FROM usuarios";
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $i=0;
        $mat=null;
        while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
            
            $mat[$i][0]=  $registro['Email'];
            $mat[$i][1]=  $registro['IdUsuario'];
            $mat[$i][2]=  $registro['Nombre'];
            $mat[$i][3]=  $registro['fkPerfil'];
            $mat[$i][4]=  $registro['cedula'];

        
            $i=$i+1;
        }		
    
        $objConexion->cerrarBd();
        return $mat;
    }

     //funcion para traer todos los datos de la tabla perfil de la bd
    function listarPerfiles(){

        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="SELECT * FROM perfil";
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $i=0;
        $mat=null;
        while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
            
            $mat[$i][0]=  $registro['Descripcion'];
            $mat[$i][1]=  $registro['IdPerfil'];
            $mat[$i][2]=  $registro['Nombre'];
          
        
            $i=$i+1;
        }		
    
        $objConexion->cerrarBd();
        return $mat;
    }


   
}


?>