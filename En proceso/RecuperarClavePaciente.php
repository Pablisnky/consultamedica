<!DOCTYPE html/>
<html lang="es">
	<head>
		<title>ConsultaMédica_Cancelar</title>
		<meta charset="utf-8"/>
		<meta name="description" content="contactar a viajes en carro particular pagando por puesto occupado entre las ciudades de Barquisimeto y Caracas"/>
		<meta name="keywords" content="viajes privados, Caracas, Barquisimeto, viaje particular, servicio de taxi, HOREBI diseños de web_site"/>
        <meta http-equiv="Last-Modified" content="0"/>
		<meta name="author" content="HOREBI"/>
        
		<link rel="stylesheet" type="text/css" href="css/EstilosCitasMedicas.css"/> 

        <style>
			@import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:700');
		</style>

    </head>	
    <body>
    	<header>
			<a href="index.html" style="text-decoration: none"><h1>ConsultaMedica.com.ve</h1></a>
			<h2 id="cancel">Recuperar clave de usuario.</h2>
		</header>
		<section id="Recuperar_01">
		<label>Correo electronico</label><br>
		<input type="" name=""><br>
		<label>Cedula Identidad</label><br>
		<input type="" name=""><br>
		<input type="submit" value="Enviar" name="" onclick="Llamar_Recuperar()">
		<br>
		<br>
		<br>
		<div id="RecuperarClave_01" style="height: 30px;"></div>
		</section>
		
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="n41">
				<a href="index.html" class="button">Inicio</a>
                <a href="Viajes_3.html" class="button">Contacto</a>
                <a href="Viajes_7.html" class="button">Funcionamiento</a>
                <a href="Citas_2.php" class="button">Pedir Cita</a>
                <a href="Cancelar.html" class="button">Cancelar Cita</a>
                <a href="Viajes_4.php" class="button">Directorio</a>
		</div>
		<a href="DoctorAfiliado.php" class="CintaEspecialista">Area de Especialistas en medicina</a>  
		<footer>
        	<p class="p_2">Sitio web desarrollado por HOREBI, San Felipe_Yaracuy_Venezuela_0424-516.59.38</p>
   	 	</footer>
    </body>

    	<script>
			function Llamar_Recuperar(){  // Obtener la instancia del objeto XMLHttpRequest
	  		if(window.XMLHttpRequest){
	   		peticion_http = new XMLHttpRequest();
	  		}
	  		else if(window.ActiveXObject) {
	   	 	peticion_http = new ActiveXObject("Microsoft.XMLHTTP");
	  		}
	 
	   		peticion_http.open('GET', 'AcuseRecibo.txt', true);  // Realizar peticion HTTP
	      peticion_http.onreadystatechange = Respuesta_Recuperar; // Preparar la funcion de respuesta
	      peticion_http.send(null);      

	  		function Respuesta_Recuperar(){
	    	if(peticion_http.readyState == 4){ //comprueba que ha recibido la respuesta del servidor
	      if(peticion_http.status == 200) {  //si se ha recibido una respuesta, comprueba que sea valida
	        document.getElementById('RecuperarClave_01').innerHTML= peticion_http.responseText; //una vez comprobado todo,muestra en pantalla
			      }
			    }
			  }
			}
		</script>