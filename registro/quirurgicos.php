<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio Sesión</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
        <meta name="keywords" content="consulta, medico, doctor, directorio"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/ajaxBuscador.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
        </style> 

    </head>     
    <body>
        <div style=" min-height: 85%;">
            <header class="fixed_1">
                <?php 
                    include("../vista/headerPrincipal_2.php");
                ?>
            </header>
            <div  class="ocultarMenu" onclick="ocultarMenu()"><!-- contenedor se hace click y se oculta el menu responsive;--> 
                <h3 class="encabezadoSesion_2">Buscar material medico-quirúrgico</h3> 
                <div class="sesion_0">
                    <hr class="linea_1">
                    <form>                 
                        <select class="quirurgico_1" id="Quirurgico" type="text" onchange="llamar_Quirurgico()">
                            <option value="sinSeleccion">Seleccione categoría</option>
                            <option>Bata descartable</option>
                            <option>Bisturi</option>
                            <option>Cater</option>
                            <option>Gasa</option>
                            <option>Guantes</option>
                            <option>Inyetadoras</option>
                            <option>Mariposar</option>
                            <option>Sobrecama</option>
                            <option>Supositorio</option>
                            <option>Tapa boca</option>
                            <option>Uniforme descartable</option>
                            <option>Otros</option>
                        </select><!--llamar_CitaNombre esta en ajaxBuscador.js--> 
                        <br>         
                        <!--<input type="button" class="btn_verTodo"  value="Buscar"/> <!--llamar_todosMedicamento() esta en ajaxBuscador.js-->
                        <br>     
                    </form>
                    
                    <div id="carga_4"></div><!-- Recibe la respuesta de las busqedas solicitas por medio de las funciones llamar_MedicamentoNombre(); llamar_MedicamentoPrincipio(); llamar_todosMedicamento() ubicadas en ajaxBuscador.js y procesadas en buscarMedicamentoNombre.php, buscarTodosMedicam.php y buscarMedicamentoPrincipio.php-->
                </div>

                <div class="sesion_4">
                    <span class="Inicio_11">ConsultaMedica no tiene injerencia y no participa en los acuerdos a los cuales las partes interesadas concluyan. La plataforma solo plantea la posibilidad de que usted contacte personas con las cuales pueda conseguir medicamentos no disponibles en el mercado. Toda la información cargada al respecto es suministrada por los usuarios registrados en el sistema. Al momento de concretar el intercambio se recomienda ser cauteloso y precavido.</span>

                    <hr>
                    <p class="Inicio_1">¿Necesitas cargar material médico quirúrgico a la plataforma?</p>
                    <a class="btn_3" href="anuncio.php">Cargar</a>
                </div>
            </div>
        </div>
        <footer>
            <?php
                include("../vista/footer.php");
            ?>
        </footer>
    </body>
</html>