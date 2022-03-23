Muy buen dia, para ejecutar el proyecto debe montar la base de 
datos ubicada en la carpeta bd, en mysql

posteriormete en la carpeta control, archivo ConfigDB se deben 
poner los datos de la base de datos y servidor

$GLOBALS['serv']="nombre servidor";
$GLOBALS['usua']="usuario";
$GLOBALS['pass']="contrasena";
$GLOBALS['bdat']="nombre de la base de datos";

posteriormente pueden abrir el archivo index, alli se podran loguear, el proyecto cuenta con dos modulos(administrador y usuarios)

en el modulo administrador se podra administrar usuarios y perfiles (crear, actualizar, borrar y modificar)

en el modulo usuario se podra consultar y modificar datos, muchas gracias