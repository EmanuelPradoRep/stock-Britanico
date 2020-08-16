function CheckDEL()  {
    // confirmar eliminación
    var confirma= window.confirm("realmente desea confirmar el pedido ?");
    if (confirma) {
        // enviar formulario
      window.location="Confirmar_Pedido.php ";
    } else {
        window.location="pedido.html";
    } // endif
} // end function





