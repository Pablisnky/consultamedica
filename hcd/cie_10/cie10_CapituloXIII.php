<?php
//Agrega un nuevo documento a la historia medica de un paciente
    session_start(); 
    $verifica_2 = 2018;  
    $_SESSION["verifica_2"] = $verifica_2;//para poder entrar a diagnostico_Basico_2.php

    include("../../conexion/Conexion_BD.php");//conexion a BD
    mysqli_query($conexion,"SET NAMES 'utf8' ");
    
    $Paciente= $_SESSION["cedulaIdentidad"];//se introduce la cedula mediante $_SESSION
    //echo $Paciente . "<br>";

    $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION
    //echo $sesion;

    $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
                $UsDoctor= mysqli_fetch_row($NombreDoctor);
                $UsDoctor[1]; //se obtiene el nombre del doctor.

  ?>    
  	<head>
  		<link rel="stylesheet" type="text/css" href="../../css/EstilosCitasMedicas.css"/> 
  		<link rel="stylesheet" type="text/css" href="../../css/EstilosConsultaMedica_CIE_10.css"/>
  	   
  	<style type="text/css">
		a{
			background-color: ;
			display:block;
			line-height: 145%;
		}
		a:hover{
			background-color: #BEBFDD;
		}
	</style>   
		
    <script src="../../Javascript/Funciones_varias.js"></script> 
</head>  
<body>  
	<header class="fixed_1" >
                <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.co</h1>
                </div>
                <div style="float: right;  width: 25%;">
                    <?php
                            //Consulta para para colocar el nombre y apellido del Dr que abre sesión
                            $consulta_1="SELECT nombre_doctor, apellido_doctor, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                            $Recorset_1=mysqli_query($conexion,$consulta_1);
                            $Doctor_Datos= mysqli_fetch_array($Recorset_1);

                                if($Doctor_Datos["sexo"] == "F"){//femenino
                        ?>
                                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php } 
                                else if($Doctor_Datos["sexo"] == "M"){ //Masculino 
                                 ?>  
                                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }
                                else if($Doctor_Datos["sexo"] == ""){ //No especificó
                                ?>
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }                             
                        ?>
                </div>
                <nav class="n41">
                	<label class="cie_1" onclick="cerrar()">Salir CIE_10</label>
                	<label class="cie_1" for="BotonEnviar" >Cargar diagnostico</label><!--Se encuentra al final del archivo-->                  
                </nav>
        </header>

<link rel="stylesheet" type="text/css" href="../../css/EstilosCitasMedicas.css"/> 
<h3 style="margin-top: 10%;">CIE_10   Capitulo XIII</h3>
<p style="text-align: center;">Clasificación Internacional de Enfermedades</p>
<p class="Inicio_1">Capítulo XIII: Enfermedades del sistema osteomuscular y del tejido conectivo.</p>
<br><br>
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

	<a class="identar_5" style="margin-top: 2%;" href="#marcador_01">(M00-M09) Artropatías infecciosas</a>
	<a class="identar_5" href="#marcador_02">(M05-M14) Poliartropatías inflamatorias</a>
	<a class="identar_5" href="#marcador_03">(M15-M19) Artrosis</a>
	<a class="identar_5" href="#marcador_04">(M20-M25) Otras patologías articulares (excluye articulaciones de la columna)</a>
	<a class="identar_5" href="#marcador_05">(M30-M36) Trastornos sistémicos del tejido conectivo</a>
	<a class="identar_5" href="#marcador_06">(M40-M54) Dorsopatías</a>
	<a class="identar_5" href="#marcador_07">(M45-M49) Espondiloartropatías</a>
	<a class="identar_5" href="#marcador_08">(M50-M54) Otras dorsopatías </a> 
	<a class="identar_5" href="#marcador_09">(M60-M63) Trastornos de los músculos</a>
	<a class="identar_5" href="#marcador_10">(M65-M68) Trastornos de la sinovia y los tendones</a>
	<a class="identar_5" href="#marcador_11">(M70-M79) Otros trastornos de los tejidos blandos</a>
	<a class="identar_5" href="#marcador_12">(M80-M85) Desórdenes de la densidad y estructura óseas</a>
	<a class="identar_5" href="#marcador_13">(M86-M90) Otras osteopatías</a>
	<a class="identar_5" href="#marcador_14">(M91-M94) Condropatías</a>
	<a class="identar_5" style="margin-bottom: 10%;"  href="#marcador_15">(M95-M99) Otros trastornos del sistema musculoesquelético y el tejido conectivo</a>




<script type="text/javascript">
	function valores(f, cual){//Esta funcion se encarga de almacenar en un array todos los medicamentos seleccionados es llamada al precionar el boton cargar de este archivo
        todos= new Array(); 
        for(var i = 0,   total = f[cual].length;   i < total; i++)
        if (f[cual][i].checked) todos[todos.length] = f[cual][i].value;
            window.opener.document.getElementById("Diagnostico").innerHTML = todos.join("\n" + "\n" ); 
        
           this.window.close();
    }
</script>

<div style="padding-bottom: 5%;">
<form>
<a id="marcador_01" class="ancla"></a>
<p class="identar_1">(M00-M25) Artropatías</p> 
	<label class="identar_2"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M00-M09) Artropatías infecciosas.">(M00-M09) Artropatías infecciosas.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M00) Artritis piógena.">(M00) Artritis piógena.</label>	
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M00.0) Artritis y poliartritis estafilocócica.">(M00.0) Artritis y poliartritis estafilocócica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]"  value="(M00.1) Artritis y poliartritis neumocócica.">(M00.1) Artritis y poliartritis neumocócica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M00.2) Otras artritis y poliartritis estreptocócicas.">(M00.2) Otras artritis y poliartritis estreptocócicas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M00.8) Artritis y poliartritis por otros agentes bacterianos especificados. (Use códigos adicionales (B95-B96) si desea especificar el agente.)">
			(M00.8) Artritis y poliartritis por otros agentes bacterianos especificados. (Use códigos adicionales (B95-B96) si desea especificar el agente.)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M00.9) Artritis piógena, sin especificar">(M00.9) Artritis piógena, sin especificar.</label>
			

 
		<input type="checkbox" class="identar_check_3E" name="diagnostico[]" id="M01" value="(M01) Infección directa de la articulación en enfermedades infecciosas y parasitarias clasificadas en otras partes.  (Excluye artropatía por sarcoidosis (M14.8) y artropatía postinfecciosa y reactiva (M03))">	
		<label class="identar_3E" for="M01">(M01) Infección directa de la articulación en enfermedades infecciosas y parasitarias clasificadas en otras partes.  (Excluye artropatía por sarcoidosis (M14.8) y artropatía postinfecciosa y reactiva (M03)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]"  value="(M01.0) Atritis meningocócica (A39.8). (Excluye artritis postmeningocócica (M03.0)).">Atritis meningocócica (A39.8). (Excluye artritis postmeningocócica (M03.0)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M01.1) Artritis tuberculosa (A18.0). (Excluye de la columna (M49.0)).">(M01.1) Artritis tuberculosa (A18.0). (Excluye de la columna (M49.0)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M01.2) Artritis en la enfermedad de Lyme (A69.2).">(M01.2) Artritis en la enfermedad de Lyme (A69.2).</label>
			<input type="checkbox" class="identar_check_4E"  name="diagnostico[]" id="M01.3" value="(M01.3) Artritis en otras enfermedades bacterianas clasificadas en otras partes: artritis en lepra (A30), infección localizada de salmonella (A02.2), fiebre tifoidea o paratifoidea (A01), artritis gonocócica (A54.4).">
			<label class="identar_4E" for="M01.3">(M01.3) Artritis en otras enfermedades bacterianas clasificadas en otras partes: artritis en lepra (A30), infección localizada de salmonella (A02.2), fiebre tifoidea o paratifoidea (A01), artritis gonocócica (A54.4).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M01.4) Artritis por rubéola (B06.8).">(M01.4) Artritis por rubéola (B06.8).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M01.5) Artritis en otras enfermedades virales clasificadas en otras partes: artritis en parotiditis (B26.8), en fiebre por virus O'nyong-nyong (A92.1).">(M01.5) Artritis en otras enfermedades virales clasificadas en otras partes: artritis en parotiditis (B26.8), en fiebre por virus O'nyong-nyong (A92.1).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M01.6) Artritis en micosis (B35-B49).">(M01.6) Artritis en micosis (B35-B49).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M01.8) Artritis en otras enfermedades infecciosas y parasitarias clasificadas en otras partes.">(M01.8) Artritis en otras enfermedades infecciosas y parasitarias clasificadas en otras partes.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M02) Artopatías reactivas. (Excluye síndrome de Behcet (M35.2) y fiebre reumática (I00))">(M02) Artopatías reactivas. (Excluye síndrome de Behcet (M35.2) y fiebre reumática (I00)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M02.0) Artropatías tras bypass intestinal.">(M02.0) Artropatías tras bypass intestinal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M02.1) Artropatía post-disentérica.">(M02.1) Artropatía post-disentérica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M02.2) Artropatía post-inmunización.">(M02.2) Artropatía post-inmunización.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M02.3) Artritis reactiva.">
			(M02.3) Artritis reactiva.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M02.8) Otras artropatías reactivas.">(M02.8) Otras artropatías reactivas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M02.9) Artropatía reactiva, sin especificar.">(M02.9) Artropatía reactiva, sin especificar.</label>


		<input type="checkbox" class="identar_check_3E" name="diagnostico[]" id="M03" value="(M03) Artropatías reactivas y postinfecciosas clasificadas en otras partes. (Excluye infecciones directas de la articulación en enfermedades infecciosas y parasitarias clasificadas en otras partes (M01)).">
		<label class="identar_3E" for="M03">(M03) Artropatías reactivas y postinfecciosas clasificadas en otras partes. (Excluye infecciones directas de la articulación en enfermedades infecciosas y parasitarias clasificadas en otras partes (M01)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M03.0) Artritis postmeningocócica (A39.8+). (Excluye artritis meningocócica (M01.0)).">(M03.0) Artritis postmeningocócica (A39.8+). (Excluye artritis meningocócica (M01.0)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M03.1) Artropatía postinfecciosa sifilítica: articulación de Clutton. (Excluye artropatía tabética o de Charcot (M14.6)).">(M03.1) Artropatía postinfecciosa sifilítica: articulación de Clutton. (Excluye artropatía tabética o de Charcot (M14.6)).</label>
			<input type="checkbox" class="identar_check_4E"  name="diagnostico[]" id="M03.2" value="(M03.2) Otras artropatías postinfecciosas en enfermedades clasificadas en otras partes: artropatía postinfecciosa en enteritis por Yersinia enterocolitica (A04.6), hepatitis viral (B15-B19). (Excluye artropatías virales (M01.4-M01.5)).">
			<label class="identar_4E" for="M03.2">(M03.2) Otras artropatías postinfecciosas en enfermedades clasificadas en otras partes: artropatía postinfecciosa en enteritis por Yersinia enterocolitica (A04.6), hepatitis viral (B15-B19). (Excluye artropatías virales (M01.4-M01.5)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(M03.6) Artropatía reactiva en otras enfermedades clasificadas en otras partes: artropatía en endocarditis infecciosa (I33.0).">(M03.6) Artropatía reactiva en otras enfermedades clasificadas en otras partes: artropatía en endocarditis infecciosa (I33.0).</label>

















<a id="marcador_02" class="ancla"></a>
	<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M05-M14) Poliartropatías inflamatorias">(M05-M14) Poliartropatías inflamatorias</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M05) Artritis reumatoide seropositiva. (Excluye fiebre reumática (I00), artritis reumatoide juvenil (M08.-) y artritis reumatoide espinal (M45))">(M05) Artritis reumatoide seropositiva. (Excluye fiebre reumática (I00), artritis reumatoide juvenil (M08.-) y artritis reumatoide espinal (M45)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M05.0) Síndrome de Felty: artritis reumatoide con esplenomegalia y leucopenia.">(M05.0) Síndrome de Felty: artritis reumatoide con esplenomegalia y leucopenia.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M05.1) Enfermedad pulmonar reumatoide (J99.0)">(M05.1) Enfermedad pulmonar reumatoide (J99.0).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M05.2) Vasculitis reumatoide.">
			(M05.2) Vasculitis reumatoide.</label>
			<input type="checkbox" class="identar_check_4E" name="diagnostico[]" id="M05.3" value="(M05.3) Artritis reumatoide con afectación de otros órganos y sistemas: carditis (I52.8), endocarditis (I39), miocarditis (I41.8), miopatía (G73.7), pericarditis (I32.8) o polineuropatía (G63.6) reumatoide.">
			<label class="identar_4E" for="M05.3">(M05.3) Artritis reumatoide con afectación de otros órganos y sistemas: carditis (I52.8), endocarditis (I39), miocarditis (I41.8), miopatía (G73.7), pericarditis (I32.8) o polineuropatía (G63.6) reumatoide.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M05.8) Otras artritis reumatoides seropositivas.">(M05.8) Otras artritis reumatoides seropositivas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M05.9) Artritis reumatoide seropositiva, sin especificar">(M05.9) Artritis reumatoide seropositiva, sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M06) Otras artritis reumatoides.">(M06) Otras artritis reumatoides.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M06.1) Enfermedad de Still de aparición en el adulto. (Excluye enfermedad de Still, sin especificar (M08.2))">(M06.1) Enfermedad de Still de aparición en el adulto. (Excluye enfermedad de Still, sin especificar (M08.2)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M06.2) Bursitis reumatoide.">(M06.2) Bursitis reumatoide.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M06.3) Nódulo reumatoide.">(M06.3) Nódulo reumatoide.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M06.4) Poliartropatía inflamatoria. (Excluye poliartritis, sin especificar (M13.0).)">(M06.4) Poliartropatía inflamatoria. (Excluye poliartritis, sin especificar (M13.0).).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M06.8) Otras artritis reumatoides especificadas.">(M06.8) Otras artritis reumatoides especificadas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M06.9) Artritis reumatoide, sin especificar.(no está vigente)">(M06.9) Artritis reumatoide, sin especificar.(no está vigente).</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M07) Artropatías psoriásicas y enteropáticas. (Excluye artropatías psoriásicas y enteropáticas juveniles (M09))">(M07) Artropatías psoriásicas y enteropáticas. (Excluye artropatías psoriásicas y enteropáticas juveniles (M09)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M07.0) Artropatía psoriásica interfalángica (L40.5).">(M07.0) Artropatía psoriásica interfalángica (L40.5).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M07.1) Artritis mutilans (L40.5).">(M07.1) Artritis mutilans (L40.5).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M07.2) Espondilitis psoriásica (L40.5).">(M07.2) Espondilitis psoriásica (L40.5).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M07.3) Otras artropatías psoriásicas (L40.5).">(M07.3) Otras artropatías psoriásicas (L40.5).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M07.4) Artropatía en enfermedad de Crohn (K50).">(M07.4) Artropatía en enfermedad de Crohn (K50).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M07.5) Artropatía en colitis ulcerosa (K51).">(M07.5) Artropatía en colitis ulcerosa (K51).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M07.6) Otras artropatías enteropáticas.">(M07.6) Otras artropatías enteropáticas.</label>


		<input type="checkbox" class="identar_check_3E" name="diagnostico[]" id="M08" value="(M08) Artritis juvenil. (Incluye artritis infantil, de aparición antes del 16º cumpleaños y con más de 3 meses de duración. Excluye síndrome de Felty (M05.0) y dermatomiositis juvenil (M33.0)).">
		<label class="identar_3E" for="M08">(M08) Artritis juvenil. (Incluye artritis infantil, de aparición antes del 16º cumpleaños y con más de 3 meses de duración. Excluye síndrome de Felty (M05.0) y dermatomiositis juvenil (M33.0)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M08.0) Artritis reumatoide juvenil (con o sin factor reumatoide).">(M08.0) Artritis reumatoide juvenil (con o sin factor reumatoide).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M08.1) Espondilitis anquilosante juvenil. (Excluye espondilitis anquilosante del adulto (M45))">(M08.1) Espondilitis anquilosante juvenil. (Excluye espondilitis anquilosante del adulto (M45)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M08.2) Artritis juvenil con afectación sistémica: enfermedad de Still, sin especificar). (Excluye enfermedad de Still de aparición en el adulto (M06.1))">(M08.2) Artritis juvenil con afectación sistémica: enfermedad de Still, sin especificar). (Excluye enfermedad de Still de aparición en el adulto (M06.1)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M08.3) Poliartritis juvenil crónica (seronegativa).">(M08.3) Poliartritis juvenil crónica (seronegativa).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M08.4) Artritis juvenil pauciarticular.">(M08.4) Artritis juvenil pauciarticular.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M08.8) Otras artritis juveniles.">(M08.8) Otras artritis juveniles.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M08.9) Artritis juvenil, sin especificar.">(M08.9) Artritis juvenil, sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M09) Artritis juvenil en enfermedades clasificadas en otras partes. (Excluye artropatía en enfermedad de Whipple (M14.8)).">(M09) Artritis juvenil en enfermedades clasificadas en otras partes. (Excluye artropatía en enfermedad de Whipple (M14.8)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M09.0) Artritis juvenil en psoriasis (L40.5).">(M09.0) Artritis juvenil en psoriasis (L40.5).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M09.1) Artritis juvenil en enfermedad de Crohn (enteritis regional) (K50)">(M09.1) Artritis juvenil en enfermedad de Crohn (enteritis regional) (K50)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M09.2) Artritis juvenil en colitis ulcerosa (K51).">(M09.2) Artritis juvenil en colitis ulcerosa (K51).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M09.8) Artritis juvenil en otras enfermedades clasificadas en otras partes.">(M09.8) Artritis juvenil en otras enfermedades clasificadas en otras partes.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M10) Gota.">(M10) Gota.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M10.0) Gota idiopática (bursitis gotosa, gota primaria o tofo gotoso del corazón (I43.8)).">(M10.0) Gota idiopática (bursitis gotosa, gota primaria o tofo gotoso del corazón (I43.8)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M10.1) Gota inducida por plomo.">(M10.1) Gota inducida por plomo.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M10.2) Gota inducida por fármacos o drogas. Use los códigos del capítulo XX si desea identificar cuál.">(M10.2) Gota inducida por fármacos o drogas. Use los códigos del capítulo XX si desea identificar cuál.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M10.3) Gota debida a empeoramiento de la función renal.">(M10.3) Gota debida a empeoramiento de la función renal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M10.4) Otras gotas secundarias.">(M10.4) Otras gotas secundarias.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M10.9) Gota, sin especificar.">(M10.9) Gota, sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M11) Otras artropatías por cristales.">(M11) Otras artropatías por cristales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M11.0) Enfermedad por depósito de hidroxiapatita.">(M11.0) Enfermedad por depósito de hidroxiapatita.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M11.1) Condrocalcinosis familiar.">(M11.1) Condrocalcinosis familiar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M11.2) Otras condrocalcinosis. Condrocalcinosis, sin especificar.">(M11.2) Otras condrocalcinosis. Condrocalcinosis, sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M11.8) Otras artropatías por cristales especificardas.">(M11.8) Otras artropatías por cristales especificardas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M11.9) Artropatía por cristales, sin especificar.">(M11.9) Artropatía por cristales, sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M12) Otras artropatías específicas. (Excluye artropatía, sin especificar (M13.9), artrosis (M15-M19) y artropatía cricoaritenoidea (J38.7)).">(M12) Otras artropatías específicas. (Excluye artropatía, sin especificar (M13.9), artrosis (M15-M19) y artropatía cricoaritenoidea (J38.7)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M12.0) Artropatía postreumática crónica (enfermedad de Jaccoud).">(M12.0) Artropatía postreumática crónica (enfermedad de Jaccoud).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M12.1) Enfermedad de Kaschin-Beck.">(M12.1) Enfermedad de Kaschin-Beck.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M12.2) Sinovitis vellonodular pigmentada.">(M12.2) Sinovitis vellonodular pigmentada.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M12.3) Reumatismo palindrómico.">(M12.3) Reumatismo palindrómico.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M12.4) Hidrartrosis intermitente.">(M12.4) Hidrartrosis intermitente.</label>
			<input type="checkbox" class="identar_check_4E" name="diagnostico[]" id="12.5" value="(M12.5) Artropatía traumática. (Excluye artrosis post-traumática, sin especificar (M19.1) y artrosis post-traumática de la primera articulación carpometacarpiana (M18.2-M18.3), cadera (M16.4-M16.5), rodilla (M17.2-M17.3) y otras monoarticulaciones (M19.1)).">
			<label class="identar_4E" for="12.5">(M12.5) Artropatía traumática. (Excluye artrosis post-traumática, sin especificar (M19.1) y artrosis post-traumática de la primera articulación carpometacarpiana (M18.2-M18.3), cadera (M16.4-M16.5), rodilla (M17.2-M17.3) y otras monoarticulaciones (M19.1)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M12.8) Otras artropatías específicas, no clasificadas en otras partes. Artropatía transiente.">(M12.8) Otras artropatías específicas, no clasificadas en otras partes. Artropatía transiente.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M13) Otras artritis. (Excluye artrosis (M15-M19)).">(M13) Otras artritis. (Excluye artrosis (M15-M19)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M13.0) Poliartritis, sin especificar.">(M13.0) Poliartritis, sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M13.1) Monoartritis, no clasificada en otras partes.">(M13.1) Monoartritis, no clasificada en otras partes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M13.8) Otras artritis especificadas. Artritis alérgica.">(M13.8) Otras artritis especificadas. Artritis alérgica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M13.9) Artritis, sin especificar. Artropatía, sin especificar.">(M13.9) Artritis, sin especificar. Artropatía, sin especificar.</label>


		<input type="checkbox" class="identar_check_3E" name="diagnostico[]" id="M14" value="(M14) Artropatías en otras enfermedades clasificadas en otras partes. (Excluye artropatías en enfermedades hematológicas (M36.2-M36.3), reacciones de hipersensibilidad (M36.4), neoplasias (M36.1); espondilopatía neuropática (M49.4); artropatías psoriásicas y enteropáticas (M07) y juvenil (M09)).">
		<label class="identar_3E" for="M14">(M14) Artropatías en otras enfermedades clasificadas en otras partes. (Excluye artropatías en enfermedades hematológicas (M36.2-M36.3), reacciones de hipersensibilidad (M36.4), neoplasias (M36.1); espondilopatía neuropática (M49.4); artropatías psoriásicas y enteropáticas (M07) y juvenil (M09)).</label>
			<input type="checkbox" class="identar_check_4E" name="diagnostico[]" id="M14.0" value="(M14.0) Artropatía gotosa debida a defectos enzimáticos y otros desórdenes hereditarios: artropatía gotosa en síndrome de Lesch-Nyhan (E79.1) y en la anemia de células falciformes (D57).">
			<label class="identar_4E" for="M14.0">(M14.0) Artropatía gotosa debida a defectos enzimáticos y otros desórdenes hereditarios: artropatía gotosa en síndrome de Lesch-Nyhan (E79.1) y en la anemia de células falciformes (D57).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M14.1) Artropatía por cristales en otros desórdenes metabólicos: artropatía por cristales en hiperparatiroidismo (E21).">(M14.1) Artropatía por cristales en otros desórdenes metabólicos: artropatía por cristales en hiperparatiroidismo (E21).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M14.2) Artropatía diabética (E10-E14, con el cuarto carácter .6 en común). (Excluye artropatía neuropática diabética (M14.6)).">(M14.2) Artropatía diabética (E10-E14, con el cuarto carácter .6 en común). (Excluye artropatía neuropática diabética (M14.6)).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M14.3) Dermatoartritis lipoidea (E78.8).">(M14.3) Dermatoartritis lipoidea (E78.8).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M14.4) Artropatía en amiloidosis (E85).">(M14.4) Artropatía en amiloidosis (E85).</label>
			<input type="checkbox" class="identar_check_4E" name="diagnostico[]" id="M14.5" value="(M14.5) Artropatías en otras enfermedades endocrinas, nutricionales y metabólicas: artropatía en acromegalia y gigantismo pituitiario (E22.0), hemocromatosis (E83.1), hipotiroidismo (E00-E03) e hipertiroidismo (tirotoxicosis) (E05.-).">
			<label class="identar_4E" for="M14.5">(M14.5) Artropatías en otras enfermedades endocrinas, nutricionales y metabólicas: artropatía en acromegalia y gigantismo pituitiario (E22.0), hemocromatosis (E83.1), hipotiroidismo (E00-E03) e hipertiroidismo (tirotoxicosis) (E05.-).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M14.6) Artropatía neuropática: artropatía tabética o de Charcot (A52.1) y artropatía neuropática diabética (E10-E14, con el cuarto carácter .6 en común).">(M14.6) Artropatía neuropática: artropatía tabética o de Charcot (A52.1) y artropatía neuropática diabética (E10-E14, con el cuarto carácter .6 en común).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M14.8) Artropatías en otras enfermedades especificadas clasificadas en otras partes. Artropatías en eritema multiforme (L51.-), eritema nodoso (L52.-), sarcoidosis (D86.8) y enfermedad de Whipple (K90.8).">(M14.8) Artropatías en otras enfermedades especificadas clasificadas en otras partes. Artropatías en eritema multiforme (L51.-), eritema nodoso (L52.-), sarcoidosis (D86.8) y enfermedad de Whipple (K90.8).</label>






















<a id="marcador_03" class="ancla"></a>
	<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M15-M19) Artrosis">(M15-M19) Artrosis </label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M15) Poliartrosis. (Incluye artrosis con mención de más de una localización. Excluye afectación bilateral de una articulación (M16-M19)).">(M15) Poliartrosis. (Incluye artrosis con mención de más de una localización. Excluye afectación bilateral de una articulación (M16-M19)).></label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M15.0) (Osteo)artrosis primaria generalizada.">(M15.0) (Osteo)artrosis primaria generalizada.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M15.1) Nódulos de Heberden con artropatía.">(M15.1) Nódulos de Heberden con artropatía.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M15.2) Nódulos de Bouchard con artropatía.">(M15.2) Nódulos de Bouchard con artropatía.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M15.3) Artrosis secundaria múltiple. Poliartrosis post-traumática.">(M15.3) Artrosis secundaria múltiple. Poliartrosis post-traumática.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M15.4) (Osteo)artrosis erosiva.">(M15.4) (Osteo)artrosis erosiva.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M15.9) Poliartrosis, sin especificar. Osteoatritis generalizada, sin especificar.">(M15.9) Poliartrosis, sin especificar. Osteoatritis generalizada, sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M16)Coxartrosis (artrosis de la cadera).">(M16)Coxartrosis (artrosis de la cadera).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M16.0)Coxartrosis primaria bilateral.">(M16.0)Coxartrosis primaria bilateral.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M16.1) Otras coxartrosis primarias: unilateral o sin especificar.">(M16.1) Otras coxartrosis primarias: unilateral o sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M16.2) Coxartrosis displásica bilateral.">(M16.2) Coxartrosis displásica bilateral.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M16.3) Otras coxartrosis displásicas: unilateral o sin especificar.">(M16.3) Otras coxartrosis displásicas: unilateral o sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M16.4) Coxartrosis post-traumática bilateral.">(M16.4) Coxartrosis post-traumática bilateral.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M16.5) Otras coxartrosis post-traumáticas: unilateral o sin especificar.">(M16.5) Otras coxartrosis post-traumáticas: unilateral o sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M16.6) Otras coxartrosis secundarias bilaterales.">(M16.6) Otras coxartrosis secundarias bilaterales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M16.7) Otras coxartrosis secundarias: unilateral o sin especificar.">(M16.7) Otras coxartrosis secundarias: unilateral o sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M16.9) Coxartrosis, sin especificar.">(M16.9) Coxartrosis, sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M17) Gonartrosis (artrosis de la rodilla).">(M17) Gonartrosis (artrosis de la rodilla).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M17.0) Gonartrosis primaria bilateral.">(M17.0) Gonartrosis primaria bilateral.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M17.1) Otras gonartrosis primarias: unilateral o sin especificar.">(M17.1) Otras gonartrosis primarias: unilateral o sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M17.2) Gonartrosis post-traumática bilateral.">(M17.2) Gonartrosis post-traumática bilateral.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M17.3) Otras gonartrosis post-traumáticas: unilateral o sin especificar.">(M17.3) Otras gonartrosis post-traumáticas: unilateral o sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M17.4) Otras gonartrosis secundarias bilaterales.">(M17.4) Otras gonartrosis secundarias bilaterales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M17.5) Otras gonartrosis secundarias: unilateral o sin especificar.">(M17.5) Otras gonartrosis secundarias: unilateral o sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M17.9) Gonartrosis, sin especificar.">(M17.9) Gonartrosis, sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M18) Artrosis de la primera articulación carpometacarpiana.">(M18) Artrosis de la primera articulación carpometacarpiana.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M18.0) Artrosis primaria bilateral de la primera articulación carpometarcarpiana.">(M18.0) Artrosis primaria bilateral de la primera articulación carpometarcarpiana.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M18.1) Otras artrosis primarias de la primera articulación carpometacarpiana: unilateral o sin especificar.">(M18.1) Otras artrosis primarias de la primera articulación carpometacarpiana: unilateral o sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M18.2) Artrosis post-traumática bilateral de la primera articulación carpometacarpiana">(M18.2) Artrosis post-traumática bilateral de la primera articulación carpometacarpiana</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M18.3) Otras artrosis post-traumáticas bilaterales de la primera articulación carpometacarpiana: unilateral o sin especificar.">(M18.3) Otras artrosis post-traumáticas bilaterales de la primera articulación carpometacarpiana: unilateral o sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M18.4) Otras artrosis secundarias bilaterales de la primera articulación carpometacarpiana.">(M18.4) Otras artrosis secundarias bilaterales de la primera articulación carpometacarpiana.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M18.5) Otras artrosis secundarias de la primera articulación carpometacarpiana: unilateral o sin especificar.">(M18.5) Otras artrosis secundarias de la primera articulación carpometacarpiana: unilateral o sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M18.9) Artrosis de la primera articulación carpometacarpiana, sin especificar.">(M18.9) Artrosis de la primera articulación carpometacarpiana, sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M19) Otras artrosis. (Excluye artrosis de la columna(M47.-), hallux rigidus (M20.-), poliartrosis (M15.-).)">(M19) Otras artrosis. (Excluye artrosis de la columna(M47.-), hallux rigidus (M20.-), poliartrosis (M15.-).)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M19.0) Artrosis primaria de otras articulaciones (sin especificar).">(M19.0) Artrosis primaria de otras articulaciones (sin especificar).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M19.1) Artrosis post-traumática de otras articulaciones (sin especificar).">(M19.1) Artrosis post-traumática de otras articulaciones (sin especificar).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M19.2) Otras artrosis secundarias (sin especificar).">(M19.2) Otras artrosis secundarias (sin especificar).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M19.8) Otras artrosis especificadas.">(M19.8) Otras artrosis especificadas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M19.9) Artrosis, sin especificar.">(M19.9) Artrosis, sin especificar.</label>
























<a id="marcador_04" class="ancla"></a>
	<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M20-M25) Otras patologías articulares (excluye articulaciones de la columna)">(M20-M25) Otras patologías articulares (excluye articulaciones de la columna)</label>
		<input type="checkbox" class="identar_check_3E" name="diagnostico[]" id="M20" value="(M20) Deformidades adquiridas de los dedos. (Excluye ausencia adquirida de dedos (Z98.-), ausencia congénita de dedos (Q71.2, Q72.3), deformidades y malformaciones de los dedos (Q66.-, Q68-Q70, Q74.-).)">
		<label class="identar_3E" for="M20">(M20) Deformidades adquiridas de los dedos. (Excluye ausencia adquirida de dedos (Z98.-), ausencia congénita de dedos (Q71.2, Q72.3), deformidades y malformaciones de los dedos (Q66.-, Q68-Q70, Q74.-).)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M20.0) Deformidad de los dedos las manos y de los pies">(M20.0) Deformidad de los dedos las manos y de los pies</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M20.1) Hallux valgus (adquirida)">(M20.1) Hallux valgus (adquirida)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M20.2) Hallux rigidus">(M20.2) Hallux rigidus</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M20.3) Otras deformaciones del hállux (adquiridas)">(M20.3) Otras deformaciones del hállux (adquiridas)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M20.4) Dedo en martillo (adquirido)">(M20.4) Dedo en martillo (adquirido)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M20.5) Otras deformidades de los dedos de los pies">(M20.5) Otras deformidades de los dedos de los pies</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M20.6) Deformidad de los dedos de los pies sin especificar">(M20.6) Deformidad de los dedos de los pies sin especificar</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M21) Otras deformidades de las extremidades.">(M21) Otras deformidades de las extremidades.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M21.0) Deformidad en valgo no clasificada en otra parte">(M21.0) Deformidad en valgo no clasificada en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M21.1) Deformidad en varo no clasificada en otra parte">(M21.1) Deformidad en varo no clasificada en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M21.2) Deformidad en flexión">(M21.2) Deformidad en flexión</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M21.3) Muñeca o pie caído (adquirido)">(M21.3) Muñeca o pie caído (adquirido)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M21.4) Pies planos (adquirido)">(M21.4) Pies planos (adquirido)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M21.5) Garra de mano, mano deforme, garra de pie y pie deforme adquiridas">(M21.5) Garra de mano, mano deforme, garra de pie y pie deforme adquiridas</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M21.6) Otras deformidades adquiridas del tobillo y del pie">(M21.6) Otras deformidades adquiridas del tobillo y del pie</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M21.7) Longitud desigual de las extremidades (adquirida)">(M21.7) Longitud desigual de las extremidades (adquirida)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M21.8) Otras deformidades adquiridas de las extremidades especificadas">(M21.8) Otras deformidades adquiridas de las extremidades especificadas</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M21.9) Deformidad adquirida de las extremidades sin especificar.">(M21.9) Deformidad adquirida de las extremidades sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M22) Trastornos de la rótula.">(M22) Trastornos de la rótula.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M22.0) Dislocación recurrende de la rótula">(M22.0) Dislocación recurrende de la rótula</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M22.1) Subluxación recurrente de la rótula">(M22.1) Subluxación recurrente de la rótula</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M22.2) Trastornos rotulofemorales">(M22.2) Trastornos rotulofemorales</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M22.4) Condromalacia rotuliana">(M22.4) Condromalacia rotuliana</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M22.8) Otros trastornos de la rótula">(M22.8) Otros trastornos de la rótula</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M22.9) Trastorno de la rótula sin especificar">(M22.9) Trastorno de la rótula sin especificar</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M23) Trastornos internos de la rodilla.">(M23) Trastornos internos de la rodilla.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M23.0) Menisco quístico">(M23.0) Menisco quístico</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M23.1) Menisco discoide (congénito)">(M23.1) Menisco discoide (congénito)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M23.2) Trastorno del menisco debido a roturas o heridas antiguas">(M23.2) Trastorno del menisco debido a roturas o heridas antiguas</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M23.3) Otros trastornos del menisco">(M23.3) Otros trastornos del menisco</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M23.4) Flacidez de la rodilla">(M23.4) Flacidez de la rodilla</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M23.5) Inestabilidad crónica de la rodilla">(M23.5) Inestabilidad crónica de la rodilla</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M23.6) Otras roturas espontáneas de los ligamentos de la rodilla">(M23.6) Otras roturas espontáneas de los ligamentos de la rodilla</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M23.8) Otros trastornos internos de la rodilla">(M23.8) Otros trastornos internos de la rodilla</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M23.9) Trastorno interno de la rodilla sin especificar">(M23.9) Trastorno interno de la rodilla sin especificar</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M24) Otros trastornos específicos de las articulaciones.">(M24) Otros trastornos específicos de las articulaciones.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M24.0) Flacidez de las articulaciones">(M24.0) Flacidez de las articulaciones</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M24.1) Otros trastornos de los cartílados articulares">(M24.1) Otros trastornos de los cartílados articulares</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M24.2) Trastorno de los ligamentos">(M24.2) Trastorno de los ligamentos</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M24.3) Dislocación patológica y subluxación de las articulaciones, no clasificadas en otra parte">(M24.3) Dislocación patológica y subluxación de las articulaciones, no clasificadas en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M24.4) Dislocación recurrente y subluxación de las articulaciones">(M24.4) Dislocación recurrente y subluxación de las articulaciones</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M24.5) Contractura de las articulaciones">(M24.5) Contractura de las articulaciones</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M24.6) Anquilosis de las articulaciones">(M24.6) Anquilosis de las articulaciones</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M24.7) Protrusión acetabular">(M24.7) Protrusión acetabular</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M24.8) Otros trastornos articulares específicos, no clasificados en otra parte">(M24.8) Otros trastornos articulares específicos, no clasificados en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M24.9) Trastorno articular sin especificar">(M24.9) Trastorno articular sin especificar</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M25) Otros trastornos articulares no clasificados en otra parte.">(M25) Otros trastornos articulares no clasificados en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M25.0) Hemartrosis">(M25.0) Hemartrosis</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M25.1) Fístula articular">(M25.1) Fístula articular</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M25.2) Articulación batiente">(M25.2) Articulación batiente</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M25.3) Otras inestabilidades articulates">(M25.3) Otras inestabilidades articulates</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M25.4) Derrame articular">(M25.4) Derrame articular</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M25.5) Dolor articular">(M25.5) Dolor articular</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M25.6) Rigidez articular, no clasificada en otra parte">(M25.6) Rigidez articular, no clasificada en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M25.7) Osteofito">(M25.7) Osteofito</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M25.8) Otros trastornos especificados articulares">(M25.8) Otros trastornos especificados articulares</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M25.9) Trastorno articular sin especificar">(M25.9) Trastorno articular sin especificar</label>





























<a id="marcador_05" class="ancla"></a>
	<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M30-M36) Trastornos sistémicos del tejido conectivo">(M30-M36) Trastornos sistémicos del tejido conectivo.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M30) Poliarteritis nodosa y enfermedades relacionadas.">(M30) Poliarteritis nodosa y enfermedades relacionadas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M30.0) Poliarteritis nodosa">(M30.0) Poliarteritis nodosa</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M30.1) Poliarteritis con implicación del pulmón">(M30.1) Poliarteritis con implicación del pulmón</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M30.2) Poliarteritis juvenil">(M30.2) Poliarteritis juvenil</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M30.3) Síndrome de los nodos linfáticos mucocutáneos">(M30.3) Síndrome de los nodos linfáticos mucocutáneos</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M30.8) Otras enfermedades relacionadas con la poliarteritis nodosa">(M30.8) Otras enfermedades relacionadas con la poliarteritis nodosa</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M31) Otras vasculopatías necrotizantes.">(M31) Otras vasculopatías necrotizantes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M31.0) Angiitis hipersensitiva">(M31.0) Angiitis hipersensitiva</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M31.1) Microangiopatía trombótica">(M31.1) Microangiopatía trombótica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M31.2) Granuloma de media línea letal">(M31.2) Granuloma de media línea letal</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M31.3) Granulomatosis de Wegener">(M31.3) Granulomatosis de Wegener</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M31.4) Síndrome del arco aórtico">(M31.4) Síndrome del arco aórtico</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M31.5) Arteritis de célula gigante con polimialgia reumática">(M31.5) Arteritis de célula gigante con polimialgia reumática</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M31.6) Otras arteritis de célula gigante">(M31.6) Otras arteritis de célula gigante</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M31.8) Otras vasculopatías necrotizantes especificadas">(M31.8) Otras vasculopatías necrotizantes especificadas</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="">(M31.9) Vasculopatía necrotizante sin especificar</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M32) Lupus eritematoso sistémico.">(M32) Lupus eritematoso sistémico.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M32.0) Lupus eritematoso sistémico inducido por drogas">(M32.0) Lupus eritematoso sistémico inducido por drogas</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M32.1) Lupus eritematoso sistémico con implicación de órganos os sistemas">(M32.1) Lupus eritematoso sistémico con implicación de órganos os sistemas</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M32.8) Otras formas de lupus eritematoso sistémico">(M32.8) Otras formas de lupus eritematoso sistémico</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M32.9) Lupus eritematoso sistémico sin especificar">(M32.9) Lupus eritematoso sistémico sin especificar</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M33) Dermatopolimiositis.">(M33) Dermatopolimiositis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M33.0) Dermatomiositis juvenil">(M33.0) Dermatomiositis juvenil</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M33.1) Otras dermatomiositis">(M33.1) Otras dermatomiositis</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M33.2) Polimiositis">(M33.2) Polimiositis</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M34) Esclerosis sistémica.">(M34) Esclerosis sistémica.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M35) Otras implicaciones sistémicas de tejidos conectivos.">(M35) Otras implicaciones sistémicas de tejidos conectivos.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M35.0) Síndrome de Sjögren (síndrome de Sicca)">(M35.0) Síndrome de Sjögren (síndrome de Sicca)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M35.2) Síndrome de Behçet">(M35.2) Síndrome de Behçet</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M35.3) Polimialgia reumática">(M35.3) Polimialgia reumática</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M35.4) Fascitis difusa (eosinofílica)">(M35.4) Fascitis difusa (eosinofílica)</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M36) Trastornos sistémicos de tejidos conectivos en enfermedades clasificadas en otra parte.">(M36) Trastornos sistémicos de tejidos conectivos en enfermedades clasificadas en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M36.2) Artropatia Hemofilica (D66-D68)">(M36.2) Artropatia Hemofilica (D66-D68).</label>























<a id="marcador_06" class="ancla"></a>
<p class="identar_1" style="margin-top: 6%;">(M40-M54) Dorsopatías </p>
	<label class="identar_2"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M40-M43) Dorsopatías deformantes">(M40-M43) Dorsopatías deformantes.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M40) Cifosis y lordosis.">(M40) Cifosis y lordosis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M40.0) Cifosis postural">(M40.0) Cifosis postural</label>

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M41) Escoliosis.">(M41) Escoliosis.</label>

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M42) Osteocondrosis espinal.">(M42) Osteocondrosis espinal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M42.0) Osteocondrosis espinal juvenil">(M42.0) Osteocondrosis espinal juvenil</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M42.1) Osteocondrosis espinal adulta">(M42.1) Osteocondrosis espinal adulta</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M42.9) Osteocondrosis espinal sin especificar">(M42.9) Osteocondrosis espinal sin especificar</label>

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M43) Otras dorsopatías deformantes.">(M43) Otras dorsopatías deformantes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M43.0) Espondilolisis">(M43.0) Espondilolisis</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M43.1) Espondilolistesis">(M43.1) Espondilolistesis</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M43.2) Otras fusiones de la espina dorsal">(M43.2) Otras fusiones de la espina dorsal</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M43.6) Tortícolis">(M43.6) Tortícolis</label>



















<a id="marcador_07" class="ancla"></a>
	<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M45-M49) Espondiloartropatías ">(M45-M49) Espondiloartropatías</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M45) Espondilitis anquilosante.">(M45) Espondilitis anquilosante.</label>

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M46) Otras espondilopatías inflamatorias.">(M46) Otras espondilopatías inflamatorias.</label>

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M47) Espondilolisis.">(M47) Espondilolisis.</label>

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M48) Otras espondiloartropatías.">(M48) Otras espondiloartropatías.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M48.0) Estenosis espinal">(M48.0) Estenosis espinal</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M48.1) Hiperostosos anquilosante (Forestier)">(M48.1) Hiperostosos anquilosante (Forestier)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M48.2) Espondilopatía interespinosa (vértebras &quot;en beso&quot;)">(M48.2) Espondilopatía interespinosa (vértebras "en beso")</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M48.3) Otras espondilopatías">(M48.3) Otras espondilopatías</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M48.4) Fractura de vértebra por fatiga">(M48.4) Fractura de vértebra por fatiga</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M48.5) Vértebra colapsada, no clasificada en otra parte">(M48.5) Vértebra colapsada, no clasificada en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M48.8) Otras espondilopatías especificadas">(M48.8) Otras espondilopatías especificadas</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M48.9) Espondilopatía, no especificada">(M48.9) Espondilopatía, no especificada</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M49) Espondiloartropatías en enfermedades clasificadas en otra parte.">(M49) Espondiloartropatías en enfermedades clasificadas en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M49.0) Tuberculosis de la columna vertebral">(M49.0) Tuberculosis de la columna vertebral</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M49.1) Espondilitis por brucelosis">(M49.1) Espondilitis por brucelosis</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M49.2) Espondilitis por enterobacterias">(M49.2) Espondilitis por enterobacterias</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M49.3) Espondilopatía en otras enfermedades infecciosas y parasitarias clasificadas en otra parte">(M49.3) Espondilopatía en otras enfermedades infecciosas y parasitarias clasificadas en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M49.4) Espondilopatía neurotica">(M49.4) Espondilopatía neurotica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M49.5) Vértebra colapsada en enfermedades clasificadas en otra parte">(M49.5) Vértebra colapsada en enfermedades clasificadas en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M49.8) Espondilopatía en otras enfermedades clasificadas en otra parte">(M49.8) Espondilopatía en otras enfermedades clasificadas en otra parte</label>


















<a id="marcador_08" class="ancla"></a>
<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M50-M54) Otras dorsopatías">(M50-M54) Otras dorsopatías</label>
	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M50) Trastornos de disco cervical.">(M50) Trastornos de disco cervical.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M50.0) Trastorno de disco cervical con mielopatía (G99.2*)">(M50.0) Trastorno de disco cervical con mielopatía (G99.2*)</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M50.1) Trastorno de disco cervical con radiculopatía">(M50.1) Trastorno de disco cervical con radiculopatía</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M50.2) Otros desplazamientos de disco cervical">(M50.2) Otros desplazamientos de disco cervical</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M50.3) Otras degeneraciones de disco cervical">(M50.3) Otras degeneraciones de disco cervical</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M50.8) Otros trastornos de disco cervical">(M50.8) Otros trastornos de disco cervical</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M50.9) Trastorno de disco cervical, no especificado">(M50.9) Trastorno de disco cervical, no especificado</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M51) Otros trastornos de los discos intervertebrales.">(M51) Otros trastornos de los discos intervertebrales.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M51.0) Trastornos de discos intervertebrales lumbares y otros, con mielopatía (G99.2*)">(M51.0) Trastornos de discos intervertebrales lumbares y otros, con mielopatía (G99.2*)</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M51.1) Trastornos de disco lumbar y otros, con radiculopatía">(M51.1) Trastornos de disco lumbar y otros, con radiculopatía</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M51.2) Otros desplazamientos especificados de disco intervertebral">(M51.2) Otros desplazamientos especificados de disco intervertebral</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M51.3) Otras degeneraciones especificadas de disco intervertebral">(M51.3) Otras degeneraciones especificadas de disco intervertebral</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M51.4) Nódulo de Schmorl">(M51.4) Nódulo de Schmorl</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M51.8) Otros trastornos especificados de los discos intervertebrales">(M51.8) Otros trastornos especificados de los discos intervertebrales</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M51.9) Trastorno de los discos intervertebrales, no especificado">(M51.9) Trastorno de los discos intervertebrales, no especificado</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M53) Otras dorsopatías, no clasificadas en otra parte.">(M53) Otras dorsopatías, no clasificadas en otra parte.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M53.0) Síndrome cervicocraneal">(M53.0) Síndrome cervicocraneal</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M53.1) Síndrome cervicobraquial">(M53.1) Síndrome cervicobraquial</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M53.2) Inestabilidad de la columna vertebral">(M53.2) Inestabilidad de la columna vertebral</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M53.3) Trastornos sacrococcígeos, no clasificados en otra parte">(M53.3) Trastornos sacrococcígeos, no clasificados en otra parte</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M53.8) Otras dorsopatías especificadas">(M53.8) Otras dorsopatías especificadas</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M53.9) Dorsopatía, no especificada">(M53.9) Dorsopatía, no especificada</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M54) Dorsalgia.">(M54) Dorsalgia.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M54.0) Paniculitis que afecta regiones del cuello y de la espalda">(M54.0) Paniculitis que afecta regiones del cuello y de la espalda</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M54.1) Radiculopatía">(M54.1) Radiculopatía</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M54.2) Cervicalgia">(M54.2) Cervicalgia</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M54.3) Ciática">(M54.3) Ciática</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M54.4) Lumbago con ciática">(M54.4) Lumbago con ciática</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M54.5) Lumbago no especificado">(M54.5) Lumbago no especificado</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M54.6) Dolor en la columna dorsal">(M54.6) Dolor en la columna dorsal</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M54.8) Otras dorsalgias">(M54.8) Otras dorsalgias</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M54.9) Dorsalgia, no especificada">(M54.9) Dorsalgia, no especificada</label>




















<!--///////////////////////////////////////////////////////////////////////////////// -->





<a id="marcador_09"class="ancla"></a>
<p class="identar_1" style="margin-top: 6%;">(M60-M79) Trastornos de los tejidos blandos</p>
	<label class="identar_2"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M60-M63) Trastornos de los músculos">(M60-M63) Trastornos de los músculos </label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M60) Miositis.">(M60) Miositis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M60.0) Miositis infecciosa">(M60.0) Miositis infecciosa</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M60.1) Miositis intersticial">(M60.1) Miositis intersticial</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M60.2) Granuloma por cuerpo extraño en tejido blando, no clasificado en otra parte">(M60.2) Granuloma por cuerpo extraño en tejido blando, no clasificado en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M60.8) Otras miositis">(M60.8) Otras miositis</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M60.9) Miositis, no especificada">(M60.9) Miositis, no especificada</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M61) Calcificación y osificación del músculo.">(M61) Calcificación y osificación del músculo.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M61.0) Miositis osificante traumática">(M61.0) Miositis osificante traumática</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M61.1) Miositis osificante progresiva">(M61.1) Miositis osificante progresiva</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M61.2) Calcificación y osificación paralítica del músculo">(M61.2) Calcificación y osificación paralítica del músculo</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M61.3) Calcificación y osificación de los músculos asociadas con quemaduras">(M61.3) Calcificación y osificación de los músculos asociadas con quemaduras</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M61.4) Otras calcificaciones del músculo">(M61.4) Otras calcificaciones del músculo</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M61.5) Otras osificaciones del músculo">(M61.5) Otras osificaciones del músculo</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M61.9) Calcificación y osificación del músculo, no especificada">(M61.9) Calcificación y osificación del músculo, no especificada</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M62) Otros trastornos de los músculos.">(M62) Otros trastornos de los músculos.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M62.0) Diástasis del músculo">(M62.0) Diástasis del músculo</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M62.1) Otros desgarros (no traumáticos) del músculo">(M62.1) Otros desgarros (no traumáticos) del músculo</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M62.2) Infarto isquémico del músculo">(M62.2) Infarto isquémico del músculo</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M62.3) Síndrome de inmovilidad (parapléjico)">(M62.3) Síndrome de inmovilidad (parapléjico)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M62.4) Contractura muscular">(M62.4) Contractura muscular</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M62.5) Atrofia y desgaste musculares, no clasificados en otra parte">(M62.5) Atrofia y desgaste musculares, no clasificados en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M62.6) Distensión muscular">(M62.6) Distensión muscular</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M62.8) Otros trastornos especificados de los músculos">(M62.8) Otros trastornos especificados de los músculos</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M62.9) Trastorno muscular, no especificado">(M62.9) Trastorno muscular, no especificado</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M63) Trastornos de los músculos en enfermedades clasificadas en otra parte.">(M63) Trastornos de los músculos en enfermedades clasificadas en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M63.0) Miositis en enfermedades bacterianas clasificadas en otra parte">(M63.0) Miositis en enfermedades bacterianas clasificadas en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M63.1) Miositis en infecciones por protozoarios y par sitos clasificadas en otra parte">(M63.1) Miositis en infecciones por protozoarios y par sitos clasificadas en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M63.2) Miositis en otras enfermedades infecciosas clasificadas en otra parte">(M63.2) Miositis en otras enfermedades infecciosas clasificadas en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M63.3) Miositis en sarcoidosis (D86.8+)">(M63.3) Miositis en sarcoidosis (D86.8+)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M63.8) Otros trastornos de los músculos en enfermedades clasificadas en otra parte">(M63.8) Otros trastornos de los músculos en enfermedades clasificadas en otra parte</label>

































<a id="marcador_10" class="ancla"></a>
<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M65-M68) Trastornos de la sinovia y los tendones">(M65-M68) Trastornos de la sinovia y los tendones</label>
	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M65) Sinovitis y tenosinovitis.">(M65) Sinovitis y tenosinovitis.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M65.0) Absceso de vaina tendinosa">(M65.0) Absceso de vaina tendinosa</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M65.1) Otras (teno)sinovitis infecciosas">(M65.1) Otras (teno)sinovitis infecciosas</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M65.2) Tendinitis calcificada">(M65.2) Tendinitis calcificada</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M65.3) Dedo en gatillo">(M65.3) Dedo en gatillo</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M65.4) Tenosinovitis de estiloides radial [de Quervain]">(M65.4) Tenosinovitis de estiloides radial [de Quervain]</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M65.8) Otras sinovitis y tenosinovitis">(M65.8) Otras sinovitis y tenosinovitis</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M65.9) Sinovitis y tenosinovitis, no especificada">(M65.9) Sinovitis y tenosinovitis, no especificada</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M66) Ruptura espontánea de la membrana sinovial y del tendón.">(M66) Ruptura espontánea de la membrana sinovial y del tendón.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M66.0) Ruptura de quiste sinovial poplíteo">(M66.0) Ruptura de quiste sinovial poplíteo</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M66.1) Ruptura de la sinovia">(M66.1) Ruptura de la sinovia</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M66.2) Ruptura espontánea de tendones extensores">(M66.2) Ruptura espontánea de tendones extensores</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M66.3) Ruptura espontánea de tendones flexores">(M66.3) Ruptura espontánea de tendones flexores</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M66.4) Ruptura espontánea de otros tendones">(M66.4) Ruptura espontánea de otros tendones</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M66.5) Ruptura espontánea de tendón no especificado">(M66.5) Ruptura espontánea de tendón no especificado</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M67) Otros trastornos de la membrana sinovial y del tendón.">(M67) Otros trastornos de la membrana sinovial y del tendón.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M67.0) Acortamiento del tendón de Aquiles (adquirido)">(M67.0) Acortamiento del tendón de Aquiles (adquirido)</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M67.1) Otras contracturas de tendón (vaina)">(M67.1) Otras contracturas de tendón (vaina)</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M67.2) Hipertrofia sinovial, no clasificada en otra parte">(M67.2) Hipertrofia sinovial, no clasificada en otra parte</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M67.3) Sinovitis transitoria">(M67.3) Sinovitis transitoria</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M67.4) Ganglión">(M67.4) Ganglión</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M67.8) Otros trastornos especificados de la sinovia y del tendón">(M67.8) Otros trastornos especificados de la sinovia y del tendón</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M67.9) Trastorno sinovial y tendinoso, no especificado">(M67.9) Trastorno sinovial y tendinoso, no especificado</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M68) Trastornos de los tendones y de la sinovia en enfermedades clasificadas en otra parte.">(M68) Trastornos de los tendones y de la sinovia en enfermedades clasificadas en otra parte.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M68.0) Sinovitis y tenosinovitis en enfermedades bacterianas clasificadas en otra parte">(M68.0) Sinovitis y tenosinovitis en enfermedades bacterianas clasificadas en otra parte</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M68.8) Otros trastornos sinoviales y tendinosos en enfermedades clasificadas en otra parte">(M68.8) Otros trastornos sinoviales y tendinosos en enfermedades clasificadas en otra parte</label>

























<a id="marcador_11" class="ancla"></a>
<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M70-M79) Otros trastornos de los tejidos blandos">(M70-M79) Otros trastornos de los tejidos blandos</label>
	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M70) Trastornos de los tejidos blandos relacionados con el uso, el uso excesivo y la presión.">(M70) Trastornos de los tejidos blandos relacionados con el uso, el uso excesivo y la presión.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M70.0) Sinovitis crepitante crónica de la mano y de la muñeca">(M70.0) Sinovitis crepitante crónica de la mano y de la muñeca</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M70.1) Bursitis de la mano">(M70.1) Bursitis de la mano</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M70.2) Bursitis del olécranon">(M70.2) Bursitis del olécranon</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M70.3) Otras bursitis del codo">(M70.3) Otras bursitis del codo</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M70.4) Otras bursitis prerrotulianas">(M70.4) Otras bursitis prerrotulianas</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M70.5) Otras bursitis de la rodilla">(M70.5) Otras bursitis de la rodilla</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M70.6) Bursitis del trocánter">(M70.6) Bursitis del trocánter</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M70.7) Otras bursitis de la cadera">(M70.7) Otras bursitis de la cadera</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M70.8) Otros trastornos de los tejidos blandos relacionados con el uso, el uso excesivo y la presión">(M70.8) Otros trastornos de los tejidos blandos relacionados con el uso, el uso excesivo y la presión</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M70.9) Trastorno no especificado de los tejidos blandos relacionado con el uso, el uso excesivo y la presión">(M70.9) Trastorno no especificado de los tejidos blandos relacionado con el uso, el uso excesivo y la presión</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M71) Otras bursopatías.">(M71) Otras bursopatías.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M71.0) Absceso de la bolsa sinovial">(M71.0) Absceso de la bolsa sinovial</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M71.1) Otras bursitis infecciosas">(M71.1) Otras bursitis infecciosas</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M71.2) Quiste sinovial del hueco poplíteo [de Baker]">(M71.2) Quiste sinovial del hueco poplíteo [de Baker]</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M71.3) Otros quistes de la bolsa serosa">(M71.3) Otros quistes de la bolsa serosa</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M71.4) Depósito de calcio en la bolsa serosa">(M71.4) Depósito de calcio en la bolsa serosa</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M71.5) Otras bursitis, no clasificadas en otra parte">(M71.5) Otras bursitis, no clasificadas en otra parte</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M71.8) Otros trastornos especificados de la bolsa serosa">(M71.8) Otros trastornos especificados de la bolsa serosa</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M71.9) Bursopatía, no especificada">(M71.9) Bursopatía, no especificada</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M72) Trastornos fibroblásticos.">(M72) Trastornos fibroblásticos.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M72.0) Fibromatosis de la aponeurosis palmar [Dupuytren]">(M72.0) Fibromatosis de la aponeurosis palmar [Dupuytren]</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M72.1) Nódulos interfalángicos">(M72.1) Nódulos interfalángicos</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M72.2) Fibromatosis de la aponeurosis plantar">(M72.2) Fibromatosis de la aponeurosis plantar</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M72.3) Fascitis nodular">(M72.3) Fascitis nodular</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M72.4) Fibromatosis seudosarcomatosa">(M72.4) Fibromatosis seudosarcomatosa</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M72.5) Fascitis, no clasificada en otra parte">(M72.5) Fascitis, no clasificada en otra parte</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M72.8) Otros trastornos fibroblásticos">(M72.8) Otros trastornos fibroblásticos</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M72.6) Fascitis necrotizante">(M72.6) Fascitis necrotizante</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M72.9) Trastorno fibroblástico, no especificado">(M72.9) Trastorno fibroblástico, no especificado</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M73) Trastornos de los tejidos blandos en enfermedades clasificadas en otra parte.">(M73) Trastornos de los tejidos blandos en enfermedades clasificadas en otra parte.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M73.0) Bursitis gonocócica (A54.4+)">(M73.0) Bursitis gonocócica (A54.4+)</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M73.1) Bursitis sifilítica (A52.7+)">(M73.1) Bursitis sifilítica (A52.7+)</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M73.8) Otros trastornos de los tejidos blandos en enfermedades clasificadas en otra parte">(M73.8) Otros trastornos de los tejidos blandos en enfermedades clasificadas en otra parte</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M75) Lesiones del hombro.">(M75) Lesiones del hombro.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M75.0) Capsulitis adhesiva del hombro">(M75.0) Capsulitis adhesiva del hombro</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M75.1) Síndrome del manguito rotatorio">(M75.1) Síndrome del manguito rotatorio</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M75.2) Tendinitis del bíceps">(M75.2) Tendinitis del bíceps</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M75.3) Tendinitis calcificante del hombro">(M75.3) Tendinitis calcificante del hombro</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M75.4) Síndrome de abducción dolorosa del hombro">(M75.4) Síndrome de abducción dolorosa del hombro</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M75.5) Bursitis del hombro">(M75.5) Bursitis del hombro</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M75.8) Otras lesiones del hombro">(M75.8) Otras lesiones del hombro</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M75.9) Lesión del hombro, no especificada">(M75.9) Lesión del hombro, no especificada</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M76) Entesopatías del miembro inferior, excluido el pie.">(M76) Entesopatías del miembro inferior, excluido el pie.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M76.0) Tendinitis del glúteo">(M76.0) Tendinitis del glúteo</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M76.1) Tendinitis del psoas">(M76.1) Tendinitis del psoas</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M76.2) Espolón de la cresta iliaca">(M76.2) Espolón de la cresta iliaca</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M76.3) Síndrome del tendón del tensor de la fascia lata">(M76.3) Síndrome del tendón del tensor de la fascia lata</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M76.4) Bursitis tibial colateral [Pellegrini-Stieda]">(M76.4) Bursitis tibial colateral [Pellegrini-Stieda]</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M76.5) Tendinitis rotuliana">(M76.5) Tendinitis rotuliana</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M76.6) Tendinitis aquiliana">(M76.6) Tendinitis aquiliana</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M76.7) Tendinitis peroneal">(M76.7) Tendinitis peroneal</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M76.8) Otras entesopatías del miembro inferior, excluido el pie">(M76.8) Otras entesopatías del miembro inferior, excluido el pie</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M76.9) Entesopatía del miembro inferior, no especificada">(M76.9) Entesopatía del miembro inferior, no especificada</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M77) Otras entesopatías.">(M77) Otras entesopatías.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M77.0) Epicondilitis media">(M77.0) Epicondilitis media</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M77.1) Epicondilitis lateral">(M77.1) Epicondilitis lateral</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M77.2) Periartritis de la muñeca">(M77.2) Periartritis de la muñeca</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M77.3) Espolón calcáneo">(M77.3) Espolón calcáneo</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M77.4) Metatarsalgia">(M77.4) Metatarsalgia</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M77.5) Otras entesopatías del pie">(M77.5) Otras entesopatías del pie</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M77.8) Otras entesopatías, no clasificadas en otra parte">(M77.8) Otras entesopatías, no clasificadas en otra parte</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M77.9) Entesopatía, no especificada">(M77.9) Entesopatía, no especificada</label>


	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M79) Otros trastornos de los tejidos blandos, no clasificados en otra parte.">(M79) Otros trastornos de los tejidos blandos, no clasificados en otra parte.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M79.0) Reumatismo, no especificado">(M79.0) Reumatismo, no especificado</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M79.1) Mialgia">(M79.1) Mialgia</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M79.2) Neuralgia y neuritis, no especificadas">(M79.2) Neuralgia y neuritis, no especificadas</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M79.3) Paniculitis, no especificada">(M79.3) Paniculitis, no especificada</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M79.4) Hipertrofia de paquete adiposo (infrarrotuliano)">(M79.4) Hipertrofia de paquete adiposo (infrarrotuliano)</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M79.5) Cuerpo extraño residual en tejido blando">(M79.5) Cuerpo extraño residual en tejido blando</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M79.6) Dolor en miembro">(M79.6) Dolor en miembro</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M79.7) Fibromialgia">(M79.7) Fibromialgia</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M79.8) Otros trastornos especificados de los tejidos blandos">(M79.8) Otros trastornos especificados de los tejidos blandos</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M79.9) Trastorno de los tejidos blandos, no especificado">(M79.9) Trastorno de los tejidos blandos, no especificado</label>































<a id="marcador_12" class="ancla"></a>
<p class="identar_1" style="margin-top: 6%;">(M80-M94) Osteopatías y condropatías</p>
	<label class="identar_2"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M80-M85) Desórdenes de la densidad y estructura óseas">(M80-M85) Desórdenes de la densidad y estructura óseas</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M80) Osteoporosis con fractura patológica.">(M80) Osteoporosis con fractura patológica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M80.0) Osteoporosis postmenopáusica, con fractura patológica">(M80.0) Osteoporosis postmenopáusica, con fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M80.1) Osteoporosis postooforectomía, con fractura patológica">(M80.1) Osteoporosis postooforectomía, con fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M80.2) Osteoporosis por desuso, con fractura patológica">(M80.2) Osteoporosis por desuso, con fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M80.3) Osteoporosis por malabsorción postquirúrgica, con fractura patológica">(M80.3) Osteoporosis por malabsorción postquirúrgica, con fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M80.4) Osteoporosis inducida por drogas, con fractura patológica">(M80.4) Osteoporosis inducida por drogas, con fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M80.5) Osteoporosis idiopática, con fractura patológica">(M80.5) Osteoporosis idiopática, con fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M80.8) Otras osteoporosis, con fractura patológica">(M80.8) Otras osteoporosis, con fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M80.9) Osteoporosis no especificada, con fractura patológica">(M80.9) Osteoporosis no especificada, con fractura patológica</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M81) Osteoporosis sin fractura patológica.">(M81) Osteoporosis sin fractura patológica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M81.0) Osteoporosis postmenopáusica, sin fractura patológica">(M81.0) Osteoporosis postmenopáusica, sin fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M81.1) Osteoporosis postooforectomía, sin fractura patológica">(M81.1) Osteoporosis postooforectomía, sin fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M81.2) Osteoporosis por desuso, sin fractura patológica">(M81.2) Osteoporosis por desuso, sin fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M81.3) Osteoporosis por malabsorción postquirúrgica, sin fractura patológica">(M81.3) Osteoporosis por malabsorción postquirúrgica, sin fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M81.4) Osteoporosis inducida por drogas, sin fractura patológica">(M81.4) Osteoporosis inducida por drogas, sin fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M81.5) Osteoporosis idiopática, sin fractura patológica">(M81.5) Osteoporosis idiopática, sin fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M81.6) Osteoporosis localizada [Lequesne], sin fractura patológica">(M81.6) Osteoporosis localizada [Lequesne], sin fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M81.8) Otras osteoporosis, sin fractura patológica">(M81.8) Otras osteoporosis, sin fractura patológica</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M81.9) Osteoporosis no especificada, sin fractura patológica">(M81.9) Osteoporosis no especificada, sin fractura patológica</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M82) Osteoporosis en enfermedades clasificadas en otra parte.">(M82) Osteoporosis en enfermedades clasificadas en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M82.0) Osteoporosis en mielomatosis múltiple (C90.0+)">(M82.0) Osteoporosis en mielomatosis múltiple (C90.0+)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M82.1) Osteoporosis en trastornos endocrinos (E00-E34+)">(M82.1) Osteoporosis en trastornos endocrinos (E00-E34+)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M82.8) Osteoporosis en otras enfermedades clasificadas en otra parte">(M82.8) Osteoporosis en otras enfermedades clasificadas en otra parte</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M83) Osteomalacia del adulto.">(M83) Osteomalacia del adulto.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M83.0) Osteomalacia puerperal">(M83.0) Osteomalacia puerperal</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M83.1) Osteomalacia senil">(M83.1) Osteomalacia senil</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M83.2) Osteomalacia del adulto debida a malabsorción">(M83.2) Osteomalacia del adulto debida a malabsorción</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M83.3) Osteomalacia del adulto debida a desnutrición">(M83.3) Osteomalacia del adulto debida a desnutrición</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M83.4) Enfermedad de los huesos por aluminio">(M83.4) Enfermedad de los huesos por aluminio</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M83.5) Otras osteomalacias del adulto inducidas por drogas">(M83.5) Otras osteomalacias del adulto inducidas por drogas</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M83.8) Otras osteomalacias del adulto">(M83.8) Otras osteomalacias del adulto</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M83.9) Osteomalacia del adulto, no especificada">(M83.9) Osteomalacia del adulto, no especificada</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M84) Trastornos de la continuidad del hueso.">(M84) Trastornos de la continuidad del hueso.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M84.0) Consolidación defectuosa de fractura">(M84.0) Consolidación defectuosa de fractura</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M84.1) Falta de consolidación de fractura [seudoartrosis]">(M84.1) Falta de consolidación de fractura [seudoartrosis]</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M84.2) Consolidación retardada de fractura">(M84.2) Consolidación retardada de fractura</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M84.3) Fractura por tensión, no clasificada en otra parte">(M84.3) Fractura por tensión, no clasificada en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M84.4) Fractura patológica, no clasificada en otra parte">(M84.4) Fractura patológica, no clasificada en otra parte</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M84.8) Otros trastornos de la continuidad del hueso">(M84.8) Otros trastornos de la continuidad del hueso</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M84.9) Trastorno de la continuidad del hueso, no especificado">(M84.9) Trastorno de la continuidad del hueso, no especificado</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M85) Otros trastornos de la densidad y de la estructura óseas.">(M85) Otros trastornos de la densidad y de la estructura óseas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M85.0) Displasia fibrosa (monostótica)">(M85.0) Displasia fibrosa (monostótica)</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M85.1) Fluorosis del esqueleto">(M85.1) Fluorosis del esqueleto</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M85.2) Hiperostosis del cráneo">(M85.2) Hiperostosis del cráneo</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M85.3) Osteítis condensante">(M85.3) Osteítis condensante</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M85.4) Quiste óseo solitario">(M85.4) Quiste óseo solitario</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M85.5) Quiste óseo aneurismático">(M85.5) Quiste óseo aneurismático</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M85.6) Otros quistes óseos">(M85.6) Otros quistes óseos</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M85.8) Otros trastornos especificados de la densidad y de la estructura óseas">(M85.8) Otros trastornos especificados de la densidad y de la estructura óseas</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M85.9) Trastorno de la densidad y de la estructura óseas, no especificado">(M85.9) Trastorno de la densidad y de la estructura óseas, no especificado</label>
























<a id="marcador_13" class="ancla"></a>
<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M86-M90) Otras osteopatías">(M86-M90) Otras osteopatías</label>
	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M86) Osteomielitis.">(M86) Osteomielitis.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M86.0) Osteomielitis hematógena aguda">(M86.0) Osteomielitis hematógena aguda</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M86.1) Otras osteomielitis agudas">(M86.1) Otras osteomielitis agudas</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M86.2) Osteomielitis subaguda">(M86.2) Osteomielitis subaguda</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M86.3) Osteomielitis multifocal crónica">(M86.3) Osteomielitis multifocal crónica</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M86.4) Osteomielitis crónica con drenaje del seno">(M86.4) Osteomielitis crónica con drenaje del seno</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M86.5) Otras osteomielitis hematógenas crónicas">(M86.5) Otras osteomielitis hematógenas crónicas</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M86.6) Otras osteomielitis crónicas">(M86.6) Otras osteomielitis crónicas</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M86.8) Otras osteomielitis">(M86.8) Otras osteomielitis</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M86.9) Osteomielitis, no especificada">(M86.9) Osteomielitis, no especificada</label>


<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M87) Osteonecrosis.">(M87) Osteonecrosis.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M87.0) Necrosis aséptica idiopática ósea">(M87.0) Necrosis aséptica idiopática ósea</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M87.1) Osteonecrosis debida a drogas">(M87.1) Osteonecrosis debida a drogas</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M87.2) Osteonecrosis debida a traumatismo previo">(M87.2) Osteonecrosis debida a traumatismo previo</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M87.3) Otras osteonecrosis secundarias">(M87.3) Otras osteonecrosis secundarias</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M87.8) Otras osteonecrosis">(M87.8) Otras osteonecrosis</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M87.9) Osteonecrosis, no especificada">(M87.9) Osteonecrosis, no especificada</label>


<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M88) Enfermedad de Paget de los huesos (osteítis deformante).">(M88) Enfermedad de Paget de los huesos (osteítis deformante).</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M88.0) Enfermedad de Paget del cráneo">(M88.0) Enfermedad de Paget del cráneo</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M88.8) Enfermedad de Paget de otros huesos">(M88.8) Enfermedad de Paget de otros huesos</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M88.9) Enfermedad ósea de Paget, huesos no especificados">(M88.9) Enfermedad ósea de Paget, huesos no especificados</label>


<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M89) Otros trastornos del hueso.">(M89) Otros trastornos del hueso.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M89.0) Algoneurodistrofia">(M89.0) Algoneurodistrofia</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M89.1) Detención del crecimiento epifisario">(M89.1) Detención del crecimiento epifisario</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M89.2) Otros trastornos del desarrollo y crecimiento óseo">(M89.2) Otros trastornos del desarrollo y crecimiento óseo</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M89.3) Hipertrofia del hueso">(M89.3) Hipertrofia del hueso</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M89.4) Otras osteoartropatías hipertróficas">(M89.4) Otras osteoartropatías hipertróficas</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M89.5) Osteólisis">(M89.5) </label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M89.6) Osteopatía a consecuencia de poliomielitis">(M89.6) Osteopatía a consecuencia de poliomielitis</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M89.8) Otros trastornos especificados del hueso">(M89.8) Otros trastornos especificados del hueso</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M89.9) Trastorno del hueso, no especificado">(M89.9) Trastorno del hueso, no especificado</label>


<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M90) Osteopatías en enfermedades clasificadas en otra parte.">(M90) Osteopatías en enfermedades clasificadas en otra parte.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M90.0) Tuberculosis ósea">(M90.0) Tuberculosis ósea</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M90.1) Periostitis en otras enfermedades infecciosas clasificadas en otra parte">(M90.1) Periostitis en otras enfermedades infecciosas clasificadas en otra parte</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M90.2) Osteopatía en otras enfermedades infecciosas clasificadas en otra parte">(M90.2) Osteopatía en otras enfermedades infecciosas clasificadas en otra parte</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M90.3) Osteonecrosis en la enfermedad causada por descompresión">(M90.3) Osteonecrosis en la enfermedad causada por descompresión</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M90.4) Osteonecrosis debida a hemoglobinopatía">(M90.4) Osteonecrosis debida a hemoglobinopatía</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M90.5) Osteonecrosis en otras enfermedades clasificadas en otra parte">(M90.5) Osteonecrosis en otras enfermedades clasificadas en otra parte</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M90.6) Osteítis deformante en enfermedad neoplásica">(M90.6) Osteítis deformante en enfermedad neoplásica</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M90.7) Fractura ósea en enfermedad neoplásica">(M90.7) Fractura ósea en enfermedad neoplásica</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M90.8) Osteopatía en otras enfermedades clasificadas en otra parte">(M90.8) Osteopatía en otras enfermedades clasificadas en otra parte</label>


































<a id="marcador_14" class="ancla"></a>
<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M91-M94) Condropatías ">(M91-M94) Condropatías </label>
<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M91) Osteocondrosis juvenil de la cadera y de la pelvis.">(M91) Osteocondrosis juvenil de la cadera y de la pelvis.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M91.0) Osteocondrosis juvenil de la pelvis.">(M91.0) Osteocondrosis juvenil de la pelvis.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M91.1) Osteocondrosis juvenil de la cabeza del fémur (Legg-Calvé-Perthes).">(M91.1) Osteocondrosis juvenil de la cabeza del fémur (Legg-Calvé-Perthes).</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M91.2) Coxa plana.">(M91.2) Coxa plana.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M91.3) Pseudocoxalgia.">(M91.3) Pseudocoxalgia.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M91.8) Otras osteocondrosis juveniles de la cadera y de la pelvis.">(M91.8) Otras osteocondrosis juveniles de la cadera y de la pelvis.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M91.9) Osteocondrosis juvenil de la cadera y de la pelvis, sin otra especificación .">(M91.9) Osteocondrosis juvenil de la cadera y de la pelvis, sin otra especificación .</label>


<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M92) Otras osteocondrosis juveniles.">(M92) Otras osteocondrosis juveniles.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M92.0) Osteocondrosis juvenil del húmero.">(M92.0) Osteocondrosis juvenil del húmero.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M92.1) Osteocondrosis juvenil del cúbito y del radio.">(M92.1) Osteocondrosis juvenil del cúbito y del radio.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M92.2) Osteocondrosis juvenil de la mano.">(M92.2) Osteocondrosis juvenil de la mano.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M92.3) Otras osteocondrosis juveniles del miembro superior.">(M92.3) Otras osteocondrosis juveniles del miembro superior.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M92.4) Osteocondrosis juvenil de la rótula.">(M92.4) Osteocondrosis juvenil de la rótula.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M92.5) Osteocondrosis juvenil de la tibia y del peroné.">(M92.5) Osteocondrosis juvenil de la tibia y del peroné.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M92.6) Osteocondrosis juvenil del tarso.">(M92.6) Osteocondrosis juvenil del tarso.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M92.7) Osteocondrosis juvenil del metatarso.">(M92.7) Osteocondrosis juvenil del metatarso.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M92.8) Otras osteocondrosis juveniles especificadas.">(M92.8) Otras osteocondrosis juveniles especificadas.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M92.9) Osteocondrosis juvenil, no especificada .">(M92.9) Osteocondrosis juvenil, no especificada .</label>


<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M93) Otras osteocondropatías.">(M93) Otras osteocondropatías.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M93.0) Deslizamiento de la epífisis femoral superior (no traumático).">(M93.0) Deslizamiento de la epífisis femoral superior (no traumático).</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M93.1) Enfermedad de Kienböck del adulto.">(M93.1) Enfermedad de Kienböck del adulto.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M93.2) Osteocondritis disecante.">(M93.2) Osteocondritis disecante.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M93.8) Otras osteocondropatías especificadas.">(M93.8) Otras osteocondropatías especificadas.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M93.9) Osteocondropatía, no especificada.">(M93.9) Osteocondropatía, no especificada.</label>


<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M94) Otros trastornos del cartílago.">(M94) Otros trastornos del cartílago.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M94.0) Costocondritis (síndrome de Tietze).">(M94.0) Costocondritis (síndrome de Tietze).</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M94.1) Policondritis recidivante.">(M94.1) Policondritis recidivante.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M94.2) Condromalacia.">(M94.2) Condromalacia.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M94.3) Condrólisis.">(M94.3) Condrólisis.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M94.8) Otros trastornos especificados del cartílago.">(M94.8) Otros trastornos especificados del cartílago.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M94.9) Trastorno del cartílago, no especificado.">(M94.9) Trastorno del cartílago, no especificado.</label>




































<a id="marcador_15" class="ancla"></a>
<label class="identar_2" style="margin-top: 8%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(M95-M99) Otros trastornos del sistema musculoesquelético y el tejido conectivo">(M95-M99) Otros trastornos del sistema musculoesquelético y el tejido conectivo .</label>
	<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M95) Otras deformidades adquiridas del sistema osteomuscular y del tejido conjuntivo.">(M95) Otras deformidades adquiridas del sistema osteomuscular y del tejido conjuntivo.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M95.0) Deformidad adquirida de la nariz.">(M95.0) Deformidad adquirida de la nariz.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M95.1) Oreja en coliflor.">(M95.1) Oreja en coliflor.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M95.2) Otras deformidades adquiridas de la cabeza.">(M95.2) Otras deformidades adquiridas de la cabeza.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M95.3) Deformidad adquirida del cuello.">(M95.3) Deformidad adquirida del cuello.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M95.4) Deformidad adquirida de costillas y tórax.">(M95.4) Deformidad adquirida de costillas y tórax.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M95.5) Deformidad adquirida de la pelvis.">(M95.5) Deformidad adquirida de la pelvis.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M95.8) Otras deformidades adquiridas especificadas del sistema osteomuscular.">(M95.8) Otras deformidades adquiridas especificadas del sistema osteomuscular.</label>
		<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M95.9) Deformidad adquirida del sistema osteomuscular, no especificada.">(M95.9) Deformidad adquirida del sistema osteomuscular, no especificada.</label>


<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M96) Trastornos osteomusculares secundarios a procedimientos terapéuticos, no clasificados en otra parte.">(M96) Trastornos osteomusculares secundarios a procedimientos terapéuticos, no clasificados en otra parte.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M96.0) Pseudoartrosis secundaria a fusión o artrodesis.">(M96.0) Pseudoartrosis secundaria a fusión o artrodesis.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M96.1) Síndrome postlaminectomía, no clasificado en otra parte.">(M96.1) Síndrome postlaminectomía, no clasificado en otra parte.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M96.2) Cifosis postradiación.">(M96.2) Cifosis postradiación.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M96.3) Cifosis postlaminectomía.">(M96.3) Cifosis postlaminectomía.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M96.4) Lordosis postquirúrgica.">(M96.4) Lordosis postquirúrgica.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M96.5) Escoliosis postradiación.">(M96.5) Escoliosis postradiación.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M96.6) Fractura de hueso secundaria a inserción o implante ortopédico, prótesis articular o placa ósea.">(M96.6) Fractura de hueso secundaria a inserción o implante ortopédico, prótesis articular o placa ósea.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M96.8) Otros trastornos osteomusculares secundarios a procedimientos terapéuticos.">(M96.8) Otros trastornos osteomusculares secundarios a procedimientos terapéuticos.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M96.9) Trastornos osteomusculares no especificados secundarios a procedimientos.">(M96.9) Trastornos osteomusculares no especificados secundarios a procedimientos.</label>


<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(M99) Lesiones biomecánicas, no clasificadas en otra parte.">(M99) Lesiones biomecánicas, no clasificadas en otra parte.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M99.0) Disfunción segmental o somática.">(M99.0) Disfunción segmental o somática.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M99.1) Complejo de subluxación (vertebral).">(M99.1) Complejo de subluxación (vertebral).</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M99.2) Subluxación con estenosis del canal neural.">(M99.2) Subluxación con estenosis del canal neural.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M99.3) Estenosis ósea del canal neural.">(M99.3) Estenosis ósea del canal neural.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M99.4) Estenosis del canal neural por tejido conjuntivo.">(M99.4) Estenosis del canal neural por tejido conjuntivo.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M99.5) Estenosis del canal neural por disco intervertebral.">(M99.5) Estenosis del canal neural por disco intervertebral.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M99.6) Estenosis ósea y subluxación de los agujeros intervertebrales.">(M99.6) Estenosis ósea y subluxación de los agujeros intervertebrales.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M99.7) Estenosis de los agujeros intervertebrales por tejido conjuntivo o por disco intervertebral.">(M99.7) Estenosis de los agujeros intervertebrales por tejido conjuntivo o por disco intervertebral.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M99.8) Otras lesiones biomecánicas.">(M99.8) Otras lesiones biomecánicas.</label>
<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(M99.9) Lesión biomecánica, no especificada.">(M99.9) Lesión biomecánica, no especificada.</label>


	<button hidden id="BotonEnviar" onclick="valores(this.form, 'diagnostico[]')">Cargar diagnostico</button>
</form>
</div>
</body>




