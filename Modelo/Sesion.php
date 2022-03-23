<?php
 class Sesion{

        var $nomUsuario;
        var $contrasena;

    function __construct($nomUsuario,$contrasena,$perfil){
	    $this->nomUsuario= $nomUsuario;
        $this->contrasena = $contrasena;	
        $this->$perfil= $perfil;
     }


    function getContrasena() {
        return $this->contrasena;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function getNomUsuario() {
        return $this->nomUsuario;
    }

    function setNomUsuario($nomUsuario) {
        $this->nomUsuario = $nomUsuario;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function getPerfil() {
        return $this->perfil;
    }
}
    
?>