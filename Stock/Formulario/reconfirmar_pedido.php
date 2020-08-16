<?php
    // conectar al servidor
    
      // conectar al servidor de Base de Datos
      $conex = mysqli_connect("localhost","root","");
      // controlar conexión
      if (!$conex) {
        die("ATENCION!!!... NO se pudo CONECTAR al SERVIDOR de Base de Datos");
      } // endif
      // seleccionar Base de Datos
      $selDB = mysqli_select_db($conex ,"stock");
      // controlar selección de Base de Datos
      if (!$selDB) {
        die ("ATENCION!!!.. NO se pudo SELECCIONAR Base de Datos");
      } // endif
	  
	  
	  
    // determinar forma de captura del ID
    if (isset($_POST["ID"])) {
        // capturado desde el formulario
        $id = $_POST["ID"];        
    } else {
        // capturado desde el listado
        $id = $_GET["ID"];
    } // endif
    // crear sentencia SQL para buscar el ID
    $sql = "SELECT * FROM pedido WHERE id_pedido= $id";
    // ejecutar sentencia SQL
    $result = mysqli_query($conex ,$sql);
    // controlar existencia
    if (mysqli_num_rows($result)==0) {
        // mensaje de error
       echo("ID de Persona INEXISTENTE");
    } else {
        // cargar registro
        $reg = mysqli_fetch_array($result);
		
		
		
        // convertir caracteres
    $id_pedido	  = utf8_decode($reg["id_pedido"]);
	$pedido 	  = utf8_decode($reg["pedido"]);
	$comentario	      = utf8_decode($reg["comentario"]);
	$estado  = utf8_decode($reg["estado"]);
	$usuario  = utf8_decode($reg["usuario"]);
	$fecha_hora  = utf8_decode($reg["fecha_hora"]);
    } // endif
    // cerrar conexión
    mysqli_close($conex);
?>

<!DOCTYPE html>
<html lang="es">

<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/../bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Menu/Estilo_Formulario/css.css">
</head>

<div id="cabezal">

<div id ="logo">
<img  src="../Images/logo3.jpg" /></div>

</div>




<div id="container">
    <nav>
        <ul>
            <li><a href="../Menu/Inicio.html">Inicio</a></li>
            <li><a href="#">Ingresar Dispositivo <i class="down"></i></a>
            <!-- Primer Menu Desplegable -->
			
			 
            <ul>
                <li><a href="../Ingresar_Disp/Ingresar_Pc.html">PC</a></li>
              <li><a href="../Ingresar_Disp/Ingresar_Impresoras.html">Impresoras</a></li>
                <li><a href="#">Monitores</a></li>
				 <li><a href="#">Camaras</a></li>
				 
            </ul>        
           
			
			 
 <li><a href = "../Formulario/pedido.html" > Pedidos<i class="down"></i></a>
<ul>
<li><a href="../Formulario/pedido.html">Hacer Pedido</a></li>
<li><a href="../Formulario/Listar_Pedido.php">Ver pedido</a></li>
   </ul>   

</ul>
			
			
			
    </nav>
 </div> 
 
 
 
<div id ="contenedor" >

   <form id="dataFRM" action="Confirmar_Pedido" method="GET">
   
 
   
  <table  id="listado" class="table table-striped" >
  
  <tr>
     <td >ID PEDIDO</td>
  <td ><input class="form-control" readonly="readonly" type="text" name="id"
        <?php
              echo "value='$reg[id_pedido] \n'";
         ?>    
		 </td>
    </tr>
   
   <tr>
     <td >Pedido</td>
  <td ><input  class="form-control"readonly="readonly"  type="text" name="pedido"
        <?php
              echo "value='$pedido' \n'";
         ?>    
		 </td>
    </tr>
   
   
   <tr>
     <td >Comentario</td>
  <td ><input  class="form-control" readonly="readonly" type="text" name="comentario"
        <?php
              echo "value='$comentario' \n'";
         ?>    
		 </td>
    </tr>
	
	
   
   <tr>
     <td >Estado</td>
  <td ><input  class="form-control"readonly="readonly" type="text" name="estados"
        
        <?php
              echo "value='$estado' \n'";
         ?>    
    </tr>
   
     <tr>
     <td >Usuario</td>
  <td ><input  class="form-control"readonly="readonly" type="text" name="usuario"
        
        <?php
              echo "value='$usuario' \n'";
         ?>    
    </tr>
   
      <tr>
     <td >Fecha/Hora Pedido</td>
  <td ><input  class="form-control" readonly="readonly" type="text" name="fecha_hora"
        
       <?php
              echo "value='$fecha_hora' \n'";
         ?>    
    </tr>
   
    <tr>
    
  <td > Sector 
  
    
   
     <td >
	 
	  <input type="hidden"  value="confirmado" name="estado" />
	  
	  
			   <select id="" name="sector" class="form-control" >
           <option value="0">--  --</option>
		   
		   
           <?php
               // conectar al Servidor de Base de Datos
    $conex = mysqli_connect("localhost","root","");
    // controlar conexión
    if (!$conex) {
        die("ATENCION!!!.. NO se pudo CONECTAR al SERVIDOR de Base de Datos");
    } // endif
    // Seleccionar Base de Datos
    $selDB = mysqli_select_db($conex, "dispositivos");
    // controlar selección
    if (!$selDB) {
        die("ATENCION!!!.. NO se pudo SELECCIONAR la Base de Datos");
    } // endif
  
   
   
   
    // crear sentencia SQL para cargar todos las categorias
     $sql = "SELECT * FROM sector ORDER BY Nombre";
    // ejecutar sentencia SQL
    $result = mysqli_query($conex,$sql);
    // crear option del combo
    while ($regSEC=mysqli_fetch_array($result)) {
        // convertir caracteres
        $categoria = utf8_encode($regSEC["Nombre"]);
        // crear option
        echo "<option value='$regSEC[id]'>$categoria</option>\n";
    } // end while
    // cerrar conexión
    mysqli_close($conex);
?>

   </select>
	 
	 
	 
  
    </tr>
   
    <tr>
    
  <td > <input class="btn btn-warning" type="submit" name="input" value="Guardar" tabindex="17"/>
  
    </tr>
   
   
   
   
   
   
   </table> 
   
   
   
   
   
   
   </form> 

 
 
 
 
 
 
 
 
  </div>
 
 

 
 
 


</html>