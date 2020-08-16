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
    // Capturar ID del formulario
    $id = $_GET["ID"];
    // crear sentencia SQL para buscar el ID
    $sql = "SELECT * FROM computadoras WHERE ID=$id";
    // ejecutar sentencia SQL
    $result = mysqli_query($conex,$sql);
    // controlar existencia
    if (mysqli_num_rows($result)==0) {
        // mensaje de error
        die("ATENCION!!!.. ID de Persona INEXISTENTE");
    } else {
        // cargar registro
        $reg = mysqli_fetch_array($result); // cuenta la cantidad de filas que devuelve
       
	 $ID             = utf8_decode($reg["ID"]);
	$MARCA	         = utf8_decode($reg["MARCA"]);
	$MODELO 	     = utf8_decode($reg["MODELO"]);
	$PROCESADOR	     = utf8_encode($reg["PROCESADOR"]);
	$MEMORIA	     = utf8_decode($reg["MEMORIA"]);
	$CANT_MEMORIA    = utf8_decode($reg["CANT_MEMORIA"]);
	$DISCO 	         = utf8_decode($reg["DISCO"]);
	$CAPACIDAD_DISCO = utf8_decode($reg["DISCO_CAPACIDAD"]);  
	$VERSION         = utf8_decode($reg["VERSION"]);
	$ARQUITECTURA    = utf8_decode($reg["ARQUITECTURA"]);
	$SERIE           = utf8_decode($reg["SERIE"]);  
	$PROVEEDOR       = utf8_decode($reg["PROVEEDOR"]);  
	$FECHA           = utf8_decode($reg["FECHA"]);  
	$GARANTIA        = utf8_decode($reg["GARANTIA"]);  
	$ID_SECTOR		 = utf8_decode($reg["ID_SECTOR"]);  
	$OBSERVACIONES   = utf8_decode($reg["OBSERVACIONES"]);  
    $ACTIVA          = utf8_decode($reg["ACTIVA_SECTOR"]);  	
	$BAJA            = utf8_decode($reg["BAJA"]);  
	   
	   
		
    } // endif
    // cerrar conexión
    mysqli_close($conex);
?>


<!DOCTYPE html>


<html lang="es">

<head>
	<meta http-equiv="content-type" content="text/html" />
    <meta charset="utf-8" />
	<meta name="author" content="Curso PHP - BIOS" />
	<title>Sistema Informatizado</title>
    <link rel="stylesheet" href="estilos.css" />
	<link rel="stylesheet" type="text/css" href="calendar/tcal.css" />
	<script type="text/javascript" src="calendar/tcal.js"></script> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
	<script language="javascript" type="text/javascript" src="jquery-1.3.2.min.js"></script> 
	<script language="javascript" type="text/javascript"> 
	
	
$(document).ready(function(){ 
$(".contenido").hide(); 
$("#combito").change(function(){ 
$(".contenido").hide(); 
$("#div_" + $(this).val()).show(); 
}); 
}); 
</script> 





</head>


<body>
 <?php
	  		
	session_start();	
	if(!isset ($_SESSION["usuarios"])){
	
	header("Location:index.php");  
	
}
?>


<div id ="menu">
<img  src="Images/logo3.jpg" />
 
<div id ="hora">


<?php
	$time = time();
echo  "Fecha:" . date ("Y-m-d H:i:s", $time);


?>
<br> 
<br> 
<?php
echo "Usuario:" . $_SESSION ["usuarios"]  .   "<br> <br>";

 ?>
</div>
</div>

<div id ="accesos">

<a href = "inicio.php" > Inicio </a>
<a href = "income.php" > Ingresar Datos </a>
<a href = "modify.php"> Modificar </a>
<a href = "delete.php" > Eliminar </a>
<a href = "filtros.php"> Busquedas </a>
<a href = "list.php" > Listar </a>
<a href = "sectors.php" > Sectores </a>
<a href="javascript:window.close();">Salir</a>         
	</div>
	

	
	
    <div class="container"  >
        <h2>Ingresar Pc</h2>
        <form id ="dataFRM" action = "updateBD.php" method ="GET">
            <div class="form-group">
                 <label for="category">Marca</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="ID"
        <?php
             echo "value='$ID'";
         ?>
		
		/>
            </div>  
	
	 <div class="form-group">
                 <label for="category">Marca</label>
				<select id ="combito" name="marca" class="form-control">
						
						
		<?php    
        echo   "<option>    $MARCA   </option> " ;		
	   ?>
      <option>Lenovo</option>
      <option>HP</option>
     
    </select> </div>  
	
	
	<div class="form-group">
          
<div id="div_1" > 
  <label for="category">Modelo</label>
 <input  class="form-control" id= "dataID"
		type="text"
		name="modelo"
        <?php
             echo "value='$MODELO'";
         ?>
		
		/>
 
</div>


<div class="form-group">
                 <label for="category">Procesador</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="procesador"
        <?php
             echo "value='$PROCESADOR'";
         ?>
		
		/>
            </div>  
					
					
		<div class="form-group">
                 <label for="category">Memoria</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="memoria"
        <?php
             echo "value='$MEMORIA'";
         ?>
		
		/>
            </div>  			
					
					
			<div class="form-group">
                 <label for="category">Cant Memoria</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="cant_memoria"
        <?php
             echo "value='$CANT_MEMORIA'";
         ?>
		
		/>
            </div>  					
					
	
	<div class="form-group">
                 <label for="category">Disco</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="disco"
        <?php
             echo "value='$DISCO'";
         ?>
		
		/>
            </div>  			
	
	
	<div class="form-group">
                 <label for="category">Disco Capacidad</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="capacidad_disco"
        <?php
             echo "value='$CAPACIDAD_DISCO'";
         ?>
		
		/>
            </div>  			
	
	<div class="form-group">
                 <label for="category">Version</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="version"
        <?php
             echo "value='$VERSION'";
         ?>
		
		/>
            </div>  			
	
	
	<div class="form-group">
                 <label for="category">Arquitectura</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="arquitectura"
        <?php
             echo "value='$ARQUITECTURA'";
         ?>
		
		/>
            </div>  			
	
	
	<div class="form-group">
                 <label for="category">Serie</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="serie"
        <?php
             echo "value='$SERIE'";
         ?>
		
		/>
            </div>  			
	
	<div class="form-group">
                 <label for="category">Proveedor</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="proveedor"
        <?php
             echo "value='$PROVEEDOR'";
         ?>
		
		/>
            </div>  			
	
	<div class="form-group">
                 <label for="category">Fecha</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="fecha"
        <?php
             echo "value='$FECHA'";
         ?>
		
		/>
            </div>  			
	
	
	<div class="form-group">
                 <label for="category">Garantia</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="garantia"
        <?php
             echo "value='$GARANTIA'";
         ?>
		
		/>
            </div>  			
	
	<div class="form-group">
                 <label for="category">Id Sector</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="id_sector"
        <?php
             echo "value='$ID_SECTOR'";
         ?>
		
		/>
            </div>  


<div class="form-group">
                 <label for="category">Observaciones</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="observaciones"
        <?php
             echo "value='$OBSERVACIONES'";
         ?>
		
		/>
            </div>  		


<div class="form-group">
                 <label for="category">Activa</label>
			 <input  class="form-control" id= "dataID"
		type="text"
		name="estado"
        <?php
             echo "value='$ACTIVA'";
         ?>
		
		/>
            </div>  		

 <div class="clearfix"></div>
            <button type="submit" class="btn btn-info btn-lg btn-responsive" > Ingresar </button>



			
	
	
	
   </form> 
</body>
</html>