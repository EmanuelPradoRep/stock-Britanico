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



    
   
    
    if ($_GET ['procesador'] == "I3" ) {
        $procesador= "I3";
    } else if ($_GET ['procesador'] == "I5" ) {
        $procesador= "I5";
    } else if ($_GET ['procesador'] == "I7" ) {
    $procesador= "I7";

    } // endif
 
if ($_GET ['memoria'] == "DDR2" ) {
        $memoria= "DDR2";
    } else if ($_GET ['memoria'] == "DDR3" ) {
        $memoria= "DDR3";
    } else if ($_GET ['memoria'] == "DDR4" ) {
    $memoria= "DDR4";

    } // endif

if ($_GET ['windows'] == "7" ) {
        $windows= "7";
    } else if ($_GET ['windows'] == "10" ) {
        $windows= "10";
        } // endif

if ($_GET ['discos'] == "Solido" ) {
        $discos= "Solido";
    } else if ($_GET ['discos'] == "Mecanico" ) {
        $discos= "Mecanico";
        } // endif




if ($_GET ['marca'] == "1" ) {
        $marca= "Lenovo";
    } else if ($_GET ['marca'] == "2" ) {
        $marca= "HP";
        } // endif

	if ($_GET ['arquitectura'] == "32" ) {
        $arquitectura= "32";
    } else if ($_GET ['arquitectura'] == "64" ) {
       $arquitectura= "64";
        } // endif


		
$modelo1           = utf8_decode($_GET["modelo1"]);
$modelo	           = utf8_decode($_GET["modelo"]);
		
		
	
	if ($_GET ['modelo'] == "0" ) {
    $modelo	  =  $modelo1 ;
    } else {
      
        $modelo= $modelo;
        } // endif
	
	
	
	
	
	// capturar datos del formulario
   
    
    $cant_memoria	   = utf8_decode($_GET["cant_memoria"]);
	$capacidad_disco   = utf8_decode($_GET["capacidad_disco"]);
	$serie	           = utf8_decode($_GET["serie"]);
	$proveedor         = utf8_decode($_GET["proveedor"]);
	$sector        = utf8_decode($_GET["sector"]);
	$garantia          = utf8_decode ($_GET["garantia"]);
    
	$comentario     = utf8_decode ($_GET["comentario"]);

	
	
    // crear sentencia SQL para INSERTAR
    $sql  = "INSERT INTO pc ";
    $sql .= "(id_pc,marca,modelo, proce, memoria,cant_memoria, disco, cap_disco,  windows , arquitectura, n_serie , garantia, proveedor , sector , comentario, usuario, fecha_hora) ";
    $sql .= "VALUES ";
    $sql .= "(null,'$marca','$modelo','$procesador','$memoria','$cant_memoria', '$discos','$capacidad_disco', '$windows','$arquitectura','$serie', '$garantia' , '$proveedor' , '$sector','$comentario','$sesion ' ,'$hora')";
//die($sql);
    // ejecutar sentencia SQL
    mysqli_query($conexion ,$sql );
    // cerrar conexión
    mysqli_close($conexion);
 header("location: Ingresar_Pc.html");
    
?>