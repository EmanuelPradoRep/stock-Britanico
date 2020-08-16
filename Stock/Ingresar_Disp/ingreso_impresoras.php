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


$modelo1           = utf8_decode($_GET["modelo1"]);
$modelo	           = utf8_decode($_GET["modelo"]);
    
   
   if ($_GET ['marca'] == "1" ) {
        $marca= "Brother";
    } else if ($_GET ['marca'] == "2" ) {
        $marca= "HP";
        } // endif
   
   
   
   
	if ($_GET ['modelo'] == "0" ) {
    $modelo	  =  $modelo1 ;
    } else {
      
        $modelo= $modelo;
        } // endif
 


	
	
	
	// capturar datos del formulario
   
    
  
	$comentario = utf8_decode($_GET["comentario"]);
	$serie	       = utf8_decode($_GET["serie"]);
	$proveedor   = utf8_decode($_GET["proveedor"]);
	$sector	 = utf8_decode($_GET["sector"]);
	
	
    // crear sentencia SQL para INSERTAR
    $sql  = "INSERT INTO impresoras ";
    $sql .= "(id_impresoras,marca,modelo, proveedor,sector,comentario, usuario, fecha_hora) ";
    $sql .= "VALUES ";
    $sql .= "(null,'$marca','$modelo','$proveedor',  '$sector',  '$comentario' ,'$sesion', '$hora')";
//die($sql);
    // ejecutar sentencia SQL
    mysqli_query($conexion ,$sql );
    // cerrar conexión
    mysqli_close($conexion);
 header("location: Ingresar_Impresoras.html");
    
?>