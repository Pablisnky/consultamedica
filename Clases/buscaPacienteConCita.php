
    <form>                               
        <br class="ocultar">
        <label class="etiqueta_21 ocultar_2">Nombre</label>
        <input class="etiqueta_22 ocultar_2" type="text" onkeyup="llamar_CitaNombre(this.value)"><!--llamar_CitaNombre esta en ajaxBuscador.js-->
        <label class="etiqueta_21 ocultar_2">Apellido</label>
        <input class="etiqueta_22 ocultar_2" type="text" onkeyup="llamar_CitaApellido(this.value)"><!--llamar_Apellido esta en ajaxBuscador.js-->
        <label class="etiqueta_21 alinear">Cedula</label>
        <input class="etiqueta_22" type="text" id="Cedula">
        <input class="etiqueta_29" type="button" value="Buscar" onclick="llamar_CitaCedula(this.value)"><!--llamar_Cedula esta en ajaxBuscador.js-->                        
    </form>

    <div id="carga_3"></div><!-- Recibe la respuesta de las busuqedas solicitas por medio de las funciones  llamar_CitaNombre(); llamar_CitaApellido; llamar_CitaCedula()-->
    <hr style=" background-color: #040652; margin-bottom: 1%; margin-top: 1%; height: 1px;">

    <!-- El ID_Doctor es necesario enviarlo al archivo ajaxBuscador.js que se encarga de hacer la busqueda, este valor se almacena en el siguiente input -->
    <input type="text" id="Especialista" hidden value="<?php echo $sesion; ?>">  

