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
	

	$id              = utf8_decode ($_GET["id"]);  
	$pedido          = utf8_decode ($_GET["pedido"]); 
    $comentario      = utf8_decode ($_GET["comentario"]); 
  	$estado          = utf8_decode ($_GET["estado"]); 
    $usuario         = utf8_decode ($_GET["usuario"]);  
	$fecha_hora      = utf8_decode ($_GET["fecha_hora"]);  
	
   

	

	
	
	
	
	
    // crear sentencia SQL para modificar registro
    $sql  = "UPDATE pedido SET ";
    $sql .= "pedido='$pedido',";
    $sql .= "comentario='$comentario',";
	$sql .= "estado='$estado', ";
	$sql .= "usuario='$usuario', ";
	$sql .= "fecha_hora='$fecha_hora', ";
	$sql .= "rfecha_hora='$hora' ";
    $sql .= "WHERE id_pedido=$id";
	
  // die($sql);
    // ejecutar sentencia SQL
	 mysqli_query($conexion ,$sql );
	
        mysqli_close($conexion);
    // cerrar conexión
   
    // volver automáticamente al Formulario de UPD
    header("Location: pedido.html");                            
?>