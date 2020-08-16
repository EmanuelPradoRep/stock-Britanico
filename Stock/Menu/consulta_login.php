<?php

    // conectar al Servidor de Base de Datos
    $conex = mysqli_connect("localhost","root","");
    // controlar conexión
    if (!$conex) {
        die("ATENCION!!!.. NO se pudo CONECTAR al SERVIDOR de Base de Datos");
    } // endif
    // Seleccionar Base de Datos
    $selDB = mysqli_select_db($conex, "stock");
    // controlar selección
    if (!$selDB) {
        die("ATENCION!!!.. NO se pudo SELECCIONAR la Base de Datos");
    } // endif
    // Capturar ID del formulario
	
$usuario = ($_POST ["usuario"]) ;
$pass    = ($_POST ["pass"]) ;



 $sql = "SELECT * FROM usuarios WHERE usuario ='$usuario' and pass ='$pass'";
    // ejecutar sentencia SQL
    $result = mysqli_query($conex,$sql);
    // controlar existencia
    if (mysqli_num_rows($result) ==0) {
        // mensaje de error
 header("Location:../Index.html"); 
 
 
    } else {
session_start();
	
$_SESSION ["usuarios"] = $_POST ["usuario"] ;
 header("Location:Inicio.html");	
		 
		
  	
  }// endif
  
  // cerrar conexión
                           
?>