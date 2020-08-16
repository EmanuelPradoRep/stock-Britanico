 

<!DOCTYPE html>
<html lang="es">

<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/../bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Menu/Estilo_Formulario/css.css">
  <script type="text/javascript" src="chekid.js"></script>
</head>

<div id="cabezal">

<div id ="logo">
<img  src="../Images/logo3.jpg" /></div>

</div>




<div id="container">
    <nav>
        <ul>
            <li><a href = "../Menu/Inicio.html" > Inicio</a></li>
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
<li><a href="../Formulario/Listar_pedidoconf.php">Pedidos Confi.</a></li>
   </ul>   

</ul>
			
			
			
    </nav>
			</div> 
			 <input type="hidden" class="form-control" value="confirmado" name="confirmo" />
 <!-- SECCION CONTENDIO -->
<div id="contenido">

 
 <form action="Confirmar_Pedido.php" method="GET">
 
 <div class= "table-responsive">
   <table   id="listado" class="table"  >
   <tr class="active">
     <td nowrap>ID PEDIDO</td>
     <td nowrap>PEDIDO</td>
     <td nowrap>COMENTARIO</td>
    <td nowrap>ESTADO</td>
    <td nowrap>USUARIO</td>
     <td nowrap>FECHA/HORA</td>
   <td nowrap>CONFIRMAR</td>
     <td nowrap>RE-CONFIRMAR</td>
	 <input type="hidden" class="form-control" value="confirmado" name="confirmo" />
	
	 
    </tr>
	
	
	
	 <?php
	

	 
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
      // crear sentencia SQL para mostrar todos los registros
	  
	  
	  
	  

      $sql = "SELECT * FROM pedido where estado = 'pendiente' ";
      
	 // ejecutar sentencia SQL
	 
	 
	 
      $result = mysqli_query($conex, $sql);
     	 // recorrer resultado (record set)
 
      while ($reg=mysqli_fetch_array($result)) {
        // convertir caracteres
              
       
    $id	         = utf8_decode($reg["id_pedido"]);
	$pedido	     = utf8_decode($reg["pedido"]);
	$comentario	 = utf8_decode($reg["comentario"]);
	$estado	     = utf8_decode($reg["estado"]);
	$usuario     = utf8_decode($reg["usuario"]);
	$fecha_hora  = utf8_decode($reg["fecha_hora"]);
        // mostrar registro
		
		
		echo " <td>$reg[id_pedido]</td>\n";
	    echo " <td>$pedido</td>\n";
		echo " <td>$comentario</td>\n";
		echo " <td>$estado</td>\n";
		echo " <td>$usuario</td>\n";
        echo " <td>$fecha_hora</td>\n";
	   echo " <td style='text-align:center;'>\n";
		echo "   <a href='reconfirmar_pedido.php?ID=$reg[id_pedido]'>\n";
        echo "     <img class='btn' src='Images/icoUPD1.jpg' />\n";
        echo "   </a>\n "; 
        echo " </td>\n";
        echo " <td style='text-align:center;'>\n";
        echo "   <a href='ProcesoPersonasConfirmDEL.php?ID=$reg[id_pedido]'>\n";
        echo "     <img class='btn' src='Images/cr.jpg' />\n";
        echo "   </a>\n "; 
        echo " </td>\n";                
        echo "</tr>\n";
        echo "</tr>\n";
		
      } // end while
      // cerrar conexión
     
	
	
mysqli_close($conex);
	
	?>
	</div>
	</div>
	 </form>
   </table>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


</html>