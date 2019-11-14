<?php
    session_start(); //Se reaunada la sesion abierta en validarSesion.php
    $sesion=$_SESSION["UsuarioDoct"];//aqui se almacena el ID_Doctor en la variable $sesion
    //se capturan todos los campos del formulario MiPerfil.php

	//Seccion datos personales, se almacenará en la tabla doctores
    $Nombre= $_POST['nombre'];
    $Apellido=$_POST['apellido'];
	$Cedula=$_POST['cedula'];
	$TelefonoMovil=$_POST['telefonoMovil'];
	$Correo=$_POST['correo'];
	$Sexo=$_POST['sexo']; 

    /*echo "Nombre=" . $Nombre . "<br>";
    echo "Apellido=" . $Apellido . "<br>";
    echo "Cedula=" . $Cedula . "<br>";
    echo "Telefono movil=" . $TelefonoMovil . "<br>";
    echo "Correo=" . $Correo . "<br>";
    echo "sexo=" . $Sexo . "<br>";*/

    //Seccion datos de la consulta, se almacenará en la tablas doctores y direcciones
    $Especialidad=$_POST['especialidad'];
    $TelefonoConsultorio=(int)$_POST["telefonoConsultorio"];
    $Precio=$_POST['precioConsulta'];
    $Direccion=$_POST['direccion'];
    $Clinica=$_POST['clinica'];
    $Consultorio=$_POST["consultorio"];
	$Estado=$_POST['estado'];
	$Ciudad=$_POST['ciudad']; 

    echo "ID_Especialidad = " . $Especialidad . "<br>";

    //Seccion datos horarios de consulta, se almacenará en la tabla horarios
	$InicioMañana=$_POST["inicioMañana"];
    $CulminaMañana=$_POST['culminaMañana'];
    $LunesMañana=$_POST["lunes_mañana"];
    $MartesMañana=$_POST["martes_mañana"];
    $MiercolesMañana=$_POST["miercoles_mañana"];
    $JuevesMañana=$_POST["jueves_mañana"];
    $ViernesMañana=$_POST["viernes_mañana"];
    $SabadoMañana=$_POST["sabado_mañana"];
    $IniciaTarde=$_POST["iniciaTarde"];
    $CulminaTarde=$_POST["culminaTarde"];
    $LunesTarde=$_POST["lunes_tarde"];
    $MartesTarde=$_POST["martes_tarde"];
    $MiercolesTarde=$_POST["miercoles_tarde"];
    $JuevesTarde=$_POST["jueves_tarde"];
    $ViernesTarde=$_POST["viernes_tarde"];
    $SabadoTarde=$_POST["sabado_tarde"]; 


    //Seccion servicios profesionales, se almacenará en la tabla perfil_doctor
    $TextoPerfil=$_POST["textoPerfil"];
    $Servicio_1=$_POST["servicioUno"];
    $Servicio_2=$_POST["servicioDos"];
    $Servicio_3=$_POST["servicioTres"];
    $Servicio_4=$_POST["servicioCuatro"];
    $Servicio_5=$_POST["servicioCinco"];
    $Servicio_6=$_POST["servicioSeis"];



    //Secion fotografia, se almacenara en la tabla imagenes
    // Recibo los datos de la imagen
        $nombre_img = $_FILES['imagen']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
        $tipo = $_FILES['imagen']['type'];
        $tamaño = $_FILES['imagen']['size'];
        

        echo "Nombre de la imagen = " . $nombre_img . "<br>";
        //echo "Tipo de archivo = " .$tipo .  "<br>";
        //echo "Tamaño = " . $tamaño . "<br>";
        //echo "Tamaño maximo permitido = 20.000" . "<br>";// en bytes
        //echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
         
        //Si existe imagen y tiene un tamaño correcto
        if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 500000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg")
                || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")){
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                
                //$directorio = $_SERVER['DOCUMENT_ROOT'] . '/images/'; //remoto
                $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/consultaMedica/consulta_medica_16/images/'; //local

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['imagen']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre_img);
            } 
            else{
                //si no cumple con el formato
                //echo "Solo puede cargar imagenes con formato jpg, jpeg, png o gif";
            }
        } 
        else{
           //si existe la variable pero se pasa del tamaño permitido
           if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
        }
    
   /* echo "Especialidad=" . $Especialidad=$_POST['especialidad'] . "<br>";
    echo "Telefono consultorio=" . $TelefonoConsultorio . "<br>";
    echo "Dirección=" . $Direccion . "<br>";
	echo "Estado=" . $Estado. "<br>";
	echo "Ciudad=" . $Ciudad . "<br>";
	echo "nombre=" . $InicioMañana . "<br>";
    echo "nombre=" . $CulminaMañana . "<br>";
	echo "nombre=" . $InicioTarde . "<br>";
	echo "nombre=" . $CulminaTarde. "<br>";*/

//-------------------------------------------------------------------------------------------------------------------
	//conexion a la BD
	include("../conexion/Conexion_BD.php");
	mysqli_query($conexion,"SET NAMES 'utf8'");//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

//insercion de los datos capturados del formulario en la base de datos 
//Datos para almacenar en la tabla doctores
   $insertar1= "UPDATE doctores SET nombre_doctor= '$Nombre', apellido_doctor= '$Apellido', cedula= '$Cedula', telefono_consultorio= '$TelefonoConsultorio', precio_consulta= '$Precio', telefono_movil= '$TelefonoMovil', ID_Especialidad= '$Especialidad', estado= '$Estado', ciudad= '$Ciudad', sexo= '$Sexo', correo= '$Correo' WHERE ID_Doctor= '$sesion'";
    mysqli_query($conexion,$insertar1);

//Para actualizar fotografia solo si se ha presionado el boton de buscar fotografia
    if(($_FILES['imagen']['name']) != ""){
        $insertarImagen= "UPDATE doctores SET fotografia='$nombre_img' WHERE ID_Doctor= '$sesion' ";
    }
    mysqli_query($conexion,$insertarImagen);

//Datos para almacenar en la tabla direcciones
    $insertar2= "UPDATE direcciones SET direccion= '$Direccion', clinica= '$Clinica', consultorio= '$Consultorio' WHERE ID_Doctor= '$sesion'";
    mysqli_query($conexion,$insertar2);

//Datos para almacenar en la tabla horarios
    $insertar3="UPDATE horarios SET inicio_mañana= '$InicioMañana', culmina_mañana= '$CulminaMañana', lunes_mañana= '$LunesMañana', martes_mañana= '$MartesMañana', miercoles_mañana= '$MiercolesMañana', jueves_mañana= '$JuevesMañana', viernes_mañana= '$ViernesMañana', sabado_mañana= '$SabadoMañana', inicia_tarde= '$IniciaTarde', culmina_tarde= '$CulminaTarde', lunes_tarde= '$LunesTarde', martes_tarde= '$MartesTarde', miercoles_tarde= '$MiercolesTarde', jueves_tarde= '$JuevesTarde', viernes_tarde= '$ViernesTarde', sabado_tarde= '$SabadoTarde'  WHERE ID_Doctor= '$sesion'";
    mysqli_query($conexion,$insertar3);

//Datos para almacenar en la tabla perfil_doctor
    $insertar4= "UPDATE perfil_doctor SET Perfil= '$TextoPerfil', servicio_1= '$Servicio_1', servicio_2= '$Servicio_2', servicio_3= '$Servicio_3', servicio_4= '$Servicio_4', servicio_5= '$Servicio_5', servicio_6= '$Servicio_6' WHERE ID_Doctor= '$sesion' ";
    mysqli_query($conexion,$insertar4);

 //--------------------------------------------------------------------------------------------------------------------------
  
    header("location: mostrarPerfilDoctor.php");
    //header("location: HistoriasClinicas.php?cedula_pacient=" . $Cedula); 
?>