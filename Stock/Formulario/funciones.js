id = 0;


 function cargar_variables(){
 
	producto_lista = new Array();
	producto_medida1 = new Array();
 
	divProductos          = document.getElementById("agregar_producto_aceptar");
	divElegirProducto     = document.getElementById("elegir_producto");	
	divElegirColor        = document.getElementById("codigo_elegir");	
	divProductosComprados = document.getElementById("productos_comprados");
 }

function agregar_producto()
{
	document.getElementById("producto_select").selectedIndex=0;     // Capturo el primer dato del primer combo producto_select
}


function elegir_producto_aceptar(){

	var producto = document.getElementById("producto_select").value; // devuelvo lo que el usuario ingreso , lo que viene en el select
	// SETEA LAS VARIABLES producto_datos
	producto_datos(producto)

	// ARMA EL SELECT
	var select = armar_select(producto_lista, "subproducto_select");
	divElegirColor.appendChild(select);

}

function eliminarOpcion(){
	var opcion = this.parentNode;
	opcion.parentNode.removeChild(opcion);
}

function obtenerIndice(){
	indice = document.getElementById("subproducto_select").selectedIndex;
	valor = document.getElementById("subproducto_select").options[indice].firstChild.nodeValue;
	return(valor);
}

function obtenerCantidad(){
	valor = document.getElementById("producto_cantidad").value;
	return(valor);
}


function obtenerProveedor(){
	valor = document.getElementById("Proveedor").value;
	return(valor);
}



function agregar_producto_aceptar(){
	if (validar_subproducto()) 
	{
		var producto_elegido = obtenerIndice();
		var producto_cantidad = obtenerCantidad();
		var Proveedor = obtenerProveedor();
		
		var obj = {

			producto:producto_elegido, 
			
			canitdad:producto_cantidad,
			
			proveedor:Proveedor ,
			
			


		}
		
		
		
		agregar_lista_producto(obj);
		
		document.getElementById("producto_select").selectedIndex = 0;
		document.getElementById("subproducto_select").selectedIndex = 0;

	}
}

function validar_subproducto(){
   if ((obtenerIndice()) == "Elegir") {
		alert("Debe Elegir una variedad de producto");
		return false;
   }
   if ((obtenerCantidad()) == "") {
		alert("Debe Colocar una cantidad");
		return false;
   }

   
  
    if ((obtenerProveedor()) == "") {
		alert("Debe Elegir un proveedor");
		return false;
   
  }
   return true;
}



function agregar_lista_producto(obj){
	
	var nombre_id = "lista_prod";
	
	var linea = document.createElement("div");
	
//	for (var i = 0; obj.canitdad  > 0 ; i ++) {
		
		
		
	
	
	var input = document.createElement("input");
	input.setAttribute("type", "text");
	input.setAttribute("id", nombre_id + id);
	input.setAttribute("name", nombre_id + id);
	input.setAttribute("size", "75");
	input.setAttribute("value", obj.producto + " | " + obj.proveedor  + " | " + obj.canitdad + " | " );
	
	var boton = document.createElement("input");
	boton.type = "button";
	boton.value = "Quitar";
	boton.onclick = eliminarOpcion; 
	
	linea.appendChild(boton);
	linea.appendChild(input);
	divProductosComprados.appendChild(linea);
	id ++;
	
	document.getElementById("producto_cantidad").value = "";
	document.getElementById("Proveedor").value = "";
}

function cerrar(){
	// document.getElementById("codigo_elegir").style.display = "none";
	// document.getElementById("elegir_producto").style.display = "none";
}



 function armar_select(opciones, select_id)
{
	
	/* VACIA EL SELECT */
	var select = document.getElementById(select_id);
	while(select.childNodes[0]){  
		select.removeChild(select.childNodes[0]);  
	}
	
	/* SE AGREGA UN OPTION COMODIN */
		opcion = document.createElement("option");
		opcion.appendChild(document.createTextNode("Elegir"));
		select.appendChild(opcion);

	
	/* SE AGREGA UN OPTION POR CADA ELEMENTO DEL ARREGLO */
	for (i in opciones){
		productos = opciones[i];
		optgroup = document.createElement("optgroup");
		

		for (o in productos) {
			if (o == 0){
				optgroup.setAttribute("label", productos[o]);		
			}
			else
			{
				opcion = document.createElement("option");
				opcion.setAttribute("value", document.createTextNode(productos[o]));
				opcion.appendChild(document.createTextNode(productos[o]));
				optgroup.appendChild(opcion);
			}
		}
		select.appendChild(optgroup);
	}
	return select
}
 
function producto_datos(producto){
	switch (producto){
	case "elegir" :
		var lista1 = new Array ();
		producto_lista = new Array(lista1);
		break;
	
	case "PC" :
		var lista1 = new Array ("HP");
		var lista2 = new Array ("Lenovo", "Lenovo - M700", " Lenovo -M70Z", " Lenovo -M720S",  "Lenovo - M73", "Lenovo - M720Q", "Lenovo - M70", "Lenovo - M710S", "Lenovo - M710Q", "Lenovo - M73Z", "Lenovo - M810z");

	producto_lista = new Array(lista2, lista1);
		break;
		
	case "IMPRESORAS" :
		var lista1 = new Array ("Brother", "Brother 2320", " Brother 2360" , " Zebra GK420 ", "Zebra H100");
		producto_lista = new Array (lista1);
		break;			
	
	case "MONITORES" : 
		var lista1 = new Array ("AOC", " AOC VGA", " AOC VGA+HDMI" );
		
		producto_lista = new Array (lista1, lista2, lista3);
		break;
		
	case "CAMARAS" : 
		var lista1 = new Array ("Biyonet", "9200 - Biyonet color Blanco", "9219 - Biyonet color Negro");
		var lista2 = new Array ("Red", "8005 - Red color Natural", "8019 - Red color Negro", "8020 - Red color Blanco");
		producto_lista = new Array (lista1, lista2);
		break;
		
	case "brin" : 
		var lista1 = new Array ("Brin Algodon", "8201 - Brin Algodón color Marrón", "8202 - Brin Algodón color Tostado", "8205 - Brin Algodón color Natural", "8209 - Brin Algodón color Beige", "8210 - Brin Algodón color Rojo", "8211 - Brin Algodón color Fucsia", "8212 - Brin Algodón color Rosa ", "8213 - Brin Algodón color Azul Marino", "8214 - Brin Algodón color Azul Francia", "8215 - Brin Algodón color Turquesa", "8216 - Brin Algodón color Celeste", "8217 - Brin Algodón color Gris Medio", "8219 - Brin Algodón color Negro", "8220 - Brin Algodón color Blanco", "8221 - Brin Algodón color Amarillo Oro", "8222 - Brin Algodón color Violeta", "8223 - Brin Algodón color Verde Navidad", "8225 - Brin Algodón color Verde Brillante", "8226 - Brin Algodón color Bordo", "8227 - Brin Algodón color Naranja", "8236 - Brin Algodón color Salmon", "8242 - Brin Algodón color Verde Manzana", "8243 - Brin Algodón color Lila", "8249 - Brin Algodón color Verde Cirugía", "8250 - Brin Algodón color Verde Cirugía Indantren"); 
		producto_lista = new Array (lista1);
		break;
		

	

	}
}
