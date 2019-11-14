<?php
    session_start(); //Se reaunada la sesion abierta en validarSesion.php
    $sesion=$_SESSION["UsuarioDoct"];//aqui se almacena el ID_Doctor en la variable $sesion
    
    //se capturan todos los campos del formulario subirPublicaciones_Basico.php
    $DescripcionPublicacion= $_POST['descripcionPublicacion'];


    // Recibo los datos de la publicación
        $nombre_publicacion = $_FILES['publicacion']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
        $tipo_publicacion = $_FILES['publicacion']['type'];
        $tamaño_publicacion = $_FILES['publicacion']['size'];
        
         //Otra forma mas rapida de recibir la variable $_FILE es mediante un Foreach
       /* foreach($_FILES["publicacion"] as $Clave => $Valor){
            echo "Propiedad= $Clave --- Valor= $Valor <br>";
        }*/

        //echo "Nombre de la publicacion = " . $nombre_publicacion . "<br>";
        //echo "Tipo de la publicacion = " .$tipo_publicacion .  "<br>";
        //echo "Tamaño de la publicacion = " . $tamaño_publicacion . "<br>";
        //echo "Tamaño maximo permitido = 20.000" . "<br>";// en bytes
        //echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
         
        //Si existe imagen y tiene un tamaño correcto
        if(($nombre_publicacion == !NULL) && ($_FILES['publicacion']['size'] <= 500000) && ($_FILES['publicacion']['type'] == "application/pdf")){
            //indicamos los formatos que permitimos subir a nuestro servidor
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                //$directorio = $_SERVER['DOCUMENT_ROOT'] . '/perfiles/publicaciones/'; //activar para servidor remoto
                $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/consultaMedicaVenezuela/venezuela_17/perfiles/publicaciones/'; //activar para servidor local

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['imagen']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['publicacion']['tmp_name'], $directorio . $nombre_publicacion);
        } 
        else{
           //si existe la variable pero se pasa del tamaño permitido
           if($nombre_publicacion == !NULL) echo "El archivo es demasiado grande o no es un archivo PDF "; 
           exit();
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

 //se apunta al archivo que se quiere abrir
    $publicacionObjetivo= fopen($directorio . $nombre_publicacion, "r");

//se leen los bytes que contiene el archivo que se va a cargar
    $Contenido= fread($publicacionObjetivo,$tamaño_publicacion);

//como se esta insertando bytes por medio de fopen(), esto quiere decir que se inserta un string con caracteres extraños, espeificamente en la ruta del archivo que es de la forma sdfhkf/kjfksdf/djfksjd/ por lo tanto se sobreescribe la variable contenido para escapar las barras invertidas

    $Contenido= addslashes($Contenido);

//se cierra la funcion
    fclose($publicacionObjetivo);

//Se insertan los datos capturados del formulario en la base de datos
   $insertar1= "INSERT INTO publicacionesdoctor (ID_Doctor, NombrePublicacion, tipoPublicacion, contenido,DescripcionPublicacion) VALUES ('$sesion','$nombre_publicacion','$tipo_publicacion', '$Contenido','$DescripcionPublicacion') ";
    mysqli_query($conexion,$insertar1);

//si todo funciono bien en la insercion de datos en la BD se envia un mensaje
    if(mysqli_affected_rows($conexion)>0){
      //  echo "El archivo ha sido cargado";
    }
    else{
     //   echo "No se pudo cargar el archivo";
    }
 //--------------------------------------------------------------------------------------------------------------------------
  
    header("location: mostrarPublicaciones.php");
    //header("location: HistoriasClinicas.php?cedula_pacient=" . $Cedula); 
?>