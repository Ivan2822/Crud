<?php

//tiempo de espera en caso de tardar mas de 30 segundos una consulta grande
set_time_limit(3600);
//sin limite me memoria 
ini_set('memory_limit', '-1');
//ocultar los errores
// error_reporting(0);

date_default_timezone_set('America/Mexico_City'); //Ajustando zona horaria


function ultimodiadelmes($mes) { 
      $month = date($mes);
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
 
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
};
 
  /** Actual month first day **/
function primerdiadelmes($mes){
  $month = date($mes);
  $year = date('Y');
  return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
}

function conectarMySQL(){

    
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="eventos";
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

//Obtenemos la funcion que necesitamos y yo tengo que mandar 
//la URL de la siguiente forma api/api.php?funcion=login

$funcion = $_REQUEST['funcion'];

if($funcion == 'login'){
    
    $postdata = file_get_contents("php://input");

    $data = json_decode($postdata);
    $conexion = conectarMySQL();
        
    $user = trim($data->user);
    $psw = trim($data->psw);
    
    $sql = "SELECT * FROM usuarios WHERE usu_login = '$user' and usu_pass = '$psw'";

    $result = $conexion->query($sql);

    $numero = $result->rowCount();
    
    if ($numero>0){

        $datos = $result->fetchAll(PDO::FETCH_OBJ);
        
    }else{

        $datos = array('respuesta' => 'El Usuario o contraseña son inorrectos');
    }
    
    echo json_encode($datos);

    $conexion = null;

}



if ($funcion == 'usuarios') {
    $conexion = conectarMySQL();

    $query1 = "SELECT * FROM usuarios";
    $resultado1 = $conexion->query($query1);
    $solicitud = $resultado1->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($solicitud);
    $conexion = null;

}




if ($funcion == 'guardausuario') {

    $postdata = file_get_contents("php://input");

    $datos = json_decode($postdata);

    
    $nombre = $datos->nombre;
    $paterno = $datos->paterno;
    $materno = $datos->materno;
    
    $correo = $datos->correo;
    $usuario = $datos->usuario;
    $contrasena = $datos->contrasena;
    $edad= $datos->edad;
    
        
    $conexion = conectarMySQL();

    $sql = "INSERT INTO usuarios(
            usu_login,
            usu_pass,
            usu_apaterno,
            usu_amaterno,
            usu_nombre,
            usu_edad,
            usu_email
        )
        values('$usuario','$contrasena','$paterno','$materno','$nombre','$edad','$correo')";
        
        $result = $conexion->query($sql);
        $respuesta = array('mensaje' => 'Tu registro se registro con Exito!!!');

        echo json_encode($respuesta);
    
       

    }












?>