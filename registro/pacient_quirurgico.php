<?php   
//Aparecen las tablas donde se especifican los pacientes que se veran el dia de hoy y cualquier otro dia que se desee consultar
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    /*$verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica*/

    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);

   
    if(!isset($_SESSION["UsuarioPaciente"])){//sino esta declarada la variable $_SESSION devuelve a DoctorAfiliado.php, con esto se garantiza que se hizo login, esta $_SESSION se creó en validarSesion.php
        header("location:../DoctorAfiliado.php");           
    }else
    {
        //aqui se almacena el ID_Paciente que se obtuvo en validarSesion.php
        $sesion= $_SESSION["UsuarioPaciente"];
        //echo "<p>ID_Paciente=  $sesion</p>" . "<br>";
            
        include("../conexion/Conexion_BD.php");
    }
?> 

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
        <header class="fixed_1" >
            <?php
                include("../vista/headerPaciente.php")
            ?>      
        </header>   
        <div class="Principal" onclick="ocultarMenu()"><!-- contenedor se hace click y se oculta el menu responsive;--> 
            <h3 class="encabezadoSesion_1">Buscar material medico-quirúrgico</h3> 
            <div class="sesion_0">
                <hr class="linea_1">
                <form>                 
                    <select class="quirurgico_1" id="Quirurgico" type="text" onchange="llamar_Quirurgico()"> <!--llamar_Quirurgicos() esta en ajaxBuscador.js-->
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
                <p class="Inicio_1">¿Desea cargar productos a la plataforma?</p>
                <a class="btn_3" href="cargarMedicam.php">Cargar</a>
            </div>
        </div>
        <footer>
            <?php
                include("../vista/footer.php");
            ?>
        </footer>
    </body>
</html>