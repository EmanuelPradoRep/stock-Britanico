<?php

    // PROCESO INSERTAR REGISTROS
    // conectar al servidor de Base de Datos
    $conexion = mysqli_connect("localhost","root","");
    // controlar conexión
    if (!$conexion) {
        die("ATENCION!!!.. NO se pudo CONECTAR al SERVIDOR de Base de Datos");
    } // endif
    // seleccionar la Base de Datos
    $selDB = mysqli_select_db($conexion,"stock");
    // controlar selección de Base de Datos
    if (!$selDB) {
        die("ATENCION!!!.. NO se pudo SELECCIONAR Base de Datos");
    } // endif


$hora = date ("Y-m-d H:i:s");
	
	
	session_start();	

	
$sesion =	$_SESSION['usuarios']  ;
$estado          = utf8_decode($_POST["estado"]);


$productos = "";

foreach($_POST as $nombre => $valor){
	$esta = strpos($nombre, "lista_prod");
	if ($esta === FALSE){
	}
	else
	{
		$productos = $productos . $valor ;
	}
} 




$com = convertir($_POST['Comentario']);



function convertir($val) {
	$res = str_replace('
', '<br />', $val);
	return $res;
}

   $sql  = "INSERT INTO pedido ";
    $sql .= "(id_pedido,pedido,comentario, estado, usuario, fecha_hora) ";
    $sql .= "VALUES ";
    $sql .= "(null,'$productos','$com','$estado', '$sesion','$hora')";
//die($sql);
    // ejecutar sentencia SQL
    mysqli_query($conexion ,$sql );
    // cerrar conexión
    mysqli_close($conexion);


header('Location: graciaspedido.html');
?>
