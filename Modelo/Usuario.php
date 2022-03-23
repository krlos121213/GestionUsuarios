<?php
//clase usuario con su respectivo constructor y setters y getters
class Usuario {
	var $id;
	var $nombre;
	var $cedula;
    var $correo;
    var $contrasena;
    var $fkPerfil;

	function __construct($id,$nombre,$contrasena,$cedula,$fkPerfil,$correo)
	{
		$this->id=$id;	
		$this->nombre=$nombre;
		$this->cedula=$cedula;
        $this->correo=$correo;
        $this->contrasena=$contrasena;
        $this->fkPerfil=$fkPerfil;

	}


	function setid($id){
		$this->id=$id;
	}

    
	function setCorreo($correo){
		$this->correo=$correo;
	}
    
	function setContrasena($contrasena){
		$this->contrasena=$contrasena;
	}
    
	function setFkPerfil($fkPerfil){
		$this->fkPerfil=$fkPerfil;
	}

	function setcedula($cedula){
		$this->cedula=$cedula;
	}

	function setNombre($nombre){
		$this->nombre=$nombre;
	}

	function getIdUsuario(){
		return $this->id;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getcedula(){
		return $this->cedula;
	}

    function getCorreo(){
		return $this->correo;
	}
    function getContrasena(){
		return $this->contrasena;
	}
    function getFkPerfil(){
		return $this->fkPerfil;
	}

}


?>