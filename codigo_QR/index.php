<?php
	//Agrego la libreria para genera códigos QR
	require "phpqrcode/qrlib.php";    
	
	//Declaro una carpeta temporal para guardar la imagenes generadas
	$dir = 'codigosRegistrados/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
    //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.'Perfil_Profesional_Pablo_Cabeza.png';

    //Parametros de Condiguración
	$tamaño = 6; //Tamaño de Pixel
	$level = 'H'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	//Se inserta la ruta a donde va a llevar el código QR
	$contenido = "https://www.consultamedica.com.ve/Horebi_2/vista/Directorio_Ingeniero.php?ID_Usuario=cXdlcnR5MQ=="; 
	
    //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
	
    //Mostramos la imagen generada
	echo '<img src="'.$filename.'" /><hr/>';  
?>
<!-- Linea 13, Se escribe el nombre del especialista, este sera el nombre del archivo donde esta el codigo QR-->
<!-- Linea 19, Se introduce la url asignada al especialista en el archivo 03.php -->
<!-- Se abre el archivo en localhost ( /codigo_QR/index.php ) para generar el código QR del especalista -->