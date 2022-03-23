<?php
 class Perfil{

    //clase perfil con su respectivo constructor y setters y getters
        var $idPerfil;
        var $descripcion;
        var $nombre;
        
    function __construct($idPerfil,$descripcion,$nombre){
	    $this->idPerfil= $idPerfil;
        $this->nombre = $nombre;	
        $this->descripcion = $descripcion;	
        
     }


    function getIdPerfil() {
        return $this->idPerfil;
    }

    function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }



    function getNombre() {
        return $this->nombre;
    }

   
  

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }
}
    