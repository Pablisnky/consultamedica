<?php
//Agrega un nuevo documento a la historia medica de un paciente
    session_start(); 

    include("../conexion/Conexion_BD.php");//conexion a BD
    mysqli_query($conexion,"SET NAMES 'utf8' ");
    
    $Paciente= $_SESSION["cedulaIdentidad"];//se introduce la cedula mediante $_SESSION
    //echo $Paciente . "<br>";

    $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION
    //echo $sesion;

    $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
                $UsDoctor= mysqli_fetch_row($NombreDoctor);
                $UsDoctor[1]; //se obtiene el nombre del doctor.

  ?>              
	<header class="fixed_1" >
                <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
                </div>
                <div style="float: right;  width: 25%;">
                    <?php

                        $consulta_1="SELECT ID_Doctor,nombre_doctor,apellido_doctor, especialidad,sexo FROM doctores INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE ID_Doctor= '$sesion' ";
                        $Recorset_1=mysqli_query($conexion,$consulta_1);
                        while($Doctor_Datos= mysqli_fetch_array($Recorset_1)){
                            if($Doctor_Datos["sexo"] == "M"){//mujer
                    ?>
                                <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                <?php } 
                            else{ ?>  
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                <?php
                            }
                        }
                    ?>
                </div>
                <nav class="n41">
                    <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="InicioSesion.php" >Consulta</a></div>
                    <div class="n44"><a href="RegistroPacientes.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual.php">Estadisticas</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php">HCD</a></div>              
                </nav>
        </header>


<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
<h1 style="cursor: default;">ConsultaMedica.com.ve</h1>
<h3>CIE_10</h3>
<p style="text-align: center;">Clasificación Internacional de Enfermedades</p>
<p class="Inicio_1">Capítulo XIII: Enfermedades del sistema osteomuscular y del tejido conectivo.</p>
<br><br>
<style type="text/css">
	a{
		display:block;
		line-height: 145%;
	}
	a:hover{
		background-color: #BEBFDD;
	}
	.identar_1{
		padding-left: 2%;
		color:#F4FCFB; 
		box-sizing: border-box;
		padding-top: 0%;
		font-size: 1.4vw;
		background-color: #575DCE;
		margin-top: 1%;
		margin-bottom: -1%;
		height: 4%;
	}
	.identar_2{
		margin-left: 0%;
		font-size: 1.3vw;
		margin-top: 1%;
		background-color: #040652;
		color: #F4FCFB;
		padding-left: 3.5%;
	}
	.identar_3{
		margin-left: 6%;
		margin-top: 1%;
		font-size: 1.2vw;
		font-weight: bolder;
	}
	.identar_4{
		margin-left: 8%;
		font-size: 1.1vw;
	}
	.identar_5{
		margin-top: ;
		margin-left: 3%;
		font-size: 1.2vw;
	}

</style>


	<a class="identar_5" style="margin-top: 2%;" href="#bajar_0">(M05-M14) Poliartropatías inflamatorias </a>
	<a class="identar_5" href="#bajar_1">(M15-M19) Artrosis </a>
	<a class="identar_5" href="#bajar_2">(M20-M25) Otras patologías articulares (excluye articulaciones de la columna)</a>
	<a class="identar_5" href="#bajar_3">(M30-M36) Trastornos sistémicos del tejido conectivo </a>
	<a class="identar_5" href="#bajar_4">(M40-M54) Dorsopatías </a>
	<a class="identar_5" href="#bajar_5">(M45-M49) Espondiloartropatías </a>
	<a class="identar_5" href="#bajar_6">(M60-M79) Trastornos de los tejidos blandos </a>
	<a class="identar_5" href="#bajar_7">(M65-M68) Trastornos de la sinovia y los tendones </a>
	<a class="identar_5" href="#bajar_8">(M80-M94) Osteopatías y condropatías </a>
	<a class="identar_5" href="#bajar_9">(M91-M94) Condropatías </a>
	<a class="identar_5" style="margin-bottom: 4%;"  href="#bajar_10">(M95-M99) Otros trastornos del sistema musculoesquelético y el tejido conectivo </a>




<p class="identar_1">Artropatías (M00-M25)</p> 
<a class="identar_2"> Artropatías infecciosas (M00-M09)</a>
<a class="identar_3" href="diagnostico_2_2.php?Diagnostico=(M00) Artritis piógena." >(M00) Artritis piógena.	</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M00.0) Artritis y poliartritis estafilocócica.">(M00.0) Artritis y poliartritis estafilocócica.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M00.1) Artritis y poliartritis neumocócica.">(M00.1) Artritis y poliartritis neumocócica.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M00.2) Otras artritis y poliartritis estreptocócicas.">(M00.2) Otras artritis y poliartritis estreptocócicas.</a>
<a class="identar_4"  href="diagnostico_2.php?Diagnostico=(M00.8) Artritis y poliartritis por otros agentes bacterianos especificados.">(M00.8) Artritis y poliartritis por otros agentes bacterianos especificados. (Use códigos adicionales (B95-B96) si desea especificar el agente.)</a>
<a class="identar_4"  href="diagnostico_2.php?Diagnostico=(M00.9) Artritis piógena, sin especificar.">(M00.9) Artritis piógena, sin especificar.</a>


<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M01) Infección directa de la articulación en enfermedades infecciosas y parasitarias clasificadas en otras partes.">(M01) Infección directa de la articulación en enfermedades infecciosas y parasitarias clasificadas en otras partes. (Excluye artropatía por sarcoidosis (M14.8) y artropatía postinfecciosa y reactiva (M03.-).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M01.0) Atritis meningocócica (A39.8).">(M01.0) Atritis meningocócica (A39.8). (Excluye artritis postmeningocócica (M03.0).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M01.1) Artritis tuberculosa (A18.0).">(M01.1) Artritis tuberculosa (A18.0). (Excluye de la columna (M49.0).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M01.2) Artritis en la enfermedad de Lyme (A69.2 ).">(M01.2) Artritis en la enfermedad de Lyme (A69.2 ).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M01.3) Artritis en otras enfermedades bacterianas clasificadas en otras partes: artritis en lepra (A30.-), infección localizada de salmonella (A02.2), fiebre tifoidea o paratifoidea (A01.-), artritis gonocócica (A54.4).">(M01.3) Artritis en otras enfermedades bacterianas clasificadas en otras partes: artritis en lepra (A30.-), infección localizada de salmonella (A02.2), fiebre tifoidea o paratifoidea (A01.-), artritis gonocócica (A54.4).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M01.4) Artritis por rubéola (B06.8).">(M01.4) Artritis por rubéola (B06.8).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M01.5) Artritis en otras enfermedades virales clasificadas en otras partes: artritis en parotiditis (B26.8), en fiebre por virus O\'nyong-nyong (A92.1).">(M01.5) Artritis en otras enfermedades virales clasificadas en otras partes: artritis en parotiditis (B26.8), en fiebre por virus O'nyong-nyong (A92.1).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M01.6) Artritis en micosis (B35-B49).">(M01.6) Artritis en micosis (B35-B49).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M01.8) Artritis en otras enfermedades infecciosas y parasitarias clasificadas en otras partes.">(M01.8) Artritis en otras enfermedades infecciosas y parasitarias clasificadas en otras partes.</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M02) Artopatías reactivas. (Excluye síndrome de Behcet (M35.2) y fiebre reumática (I00).)">(M02) Artopatías reactivas. (Excluye síndrome de Behcet (M35.2) y fiebre reumática (I00).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M02.0) Artropatías tras bypass intestinal.">(M02.0) Artropatías tras bypass intestinal.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M02.1) Artropatía post-disentérica.">(M02.1) Artropatía post-disentérica.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M02.2) Artropatía post-inmunización.">(M02.2) Artropatía post-inmunización.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M02.3) Artritis reactiva.">(M02.3) Artritis reactiva.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M02.8) Otras artropatías reactivas.">(M02.8) Otras artropatías reactivas.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M02.9) Artropatía reactiva, sin especificar.">(M02.9) Artropatía reactiva, sin especificar.</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M03) Artropatías reactivas y postinfecciosas clasificadas en otras partes. (Excluye infecciones directas de la articulación en enfermedades infecciosas y parasitarias clasificadas en otras partes (M01.-).)">(M03) Artropatías reactivas y postinfecciosas clasificadas en otras partes. (Excluye infecciones directas de la articulación en enfermedades infecciosas y parasitarias clasificadas en otras partes (M01.-).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M03.0) Artritis postmeningocócica (A39.8+). (Excluye artritis meningocócica (M01.0).)">(M03.0) Artritis postmeningocócica (A39.8+). (Excluye artritis meningocócica (M01.0).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M03.1) Artropatía postinfecciosa sifilítica: articulación de Clutton. (Excluye artropatía tabética o de Charcot (M14.6).)">(M03.1) Artropatía postinfecciosa sifilítica: articulación de Clutton. (Excluye artropatía tabética o de Charcot (M14.6).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M03.2) Otras artropatías postinfecciosas en enfermedades clasificadas en otras partes: artropatía postinfecciosa en enteritis por Yersinia enterocolitica (A04.6), hepatitis viral (B15-B19). (Excluye artropatías virales (M01.4-M01.5).)">(M03.2) Otras artropatías postinfecciosas en enfermedades clasificadas en otras partes: artropatía postinfecciosa en enteritis por Yersinia enterocolitica (A04.6), hepatitis viral (B15-B19). (Excluye artropatías virales (M01.4-M01.5).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M03.6) Artropatía reactiva en otras enfermedades clasificadaa en otras partes: artropatía en endocarditis infecciosa (I33.0).">(M03.6) Artropatía reactiva en otras enfermedades clasificadaa en otras partes: artropatía en endocarditis infecciosa (I33.0).</a>



<a name="bajar_0"></a>
<a class="identar_2" href="diagnostico_2.php?Diagnostico=Poliartropatías inflamatorias (M05-M14)">Poliartropatías inflamatorias (M05-M14)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M05) Artritis reumatoide seropositiva. (Excluye fiebre reumática (I00), artritis reumatoide juvenil (M08.-) y artritis reumatoide espinal (M45).)">(M05) Artritis reumatoide seropositiva. (Excluye fiebre reumática (I00), artritis reumatoide juvenil (M08.-) y artritis reumatoide espinal (M45).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M05.0) Síndrome de Felty: artritis reumatoide con esplenomegalia y leucopenia.">(M05.0) Síndrome de Felty: artritis reumatoide con esplenomegalia y leucopenia.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M05.1) Enfermedad pulmonar reumatoide (J99.0).">(M05.1) Enfermedad pulmonar reumatoide (J99.0).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M05.2) Vasculitis reumatoide.">(M05.2) Vasculitis reumatoide.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M05.3) Artritis reumatoide con afectación de otros órganos y sistemas: carditis (I52.8), endocarditis (I39.-), miocarditis (I41.8), miopatía (G73.7), pericarditis (I32.8) o polineuropatía (G63.6) reumatoide.">(M05.3) Artritis reumatoide con afectación de otros órganos y sistemas: carditis (I52.8), endocarditis (I39.-), miocarditis (I41.8), miopatía (G73.7), pericarditis (I32.8) o polineuropatía (G63.6) reumatoide.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M05.8) Otras artritis reumatoides seropositivas.">(M05.8) Otras artritis reumatoides seropositivas.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M05.9) Artritis reumatoide seropositiva, sin especificar">(M05.9) Artritis reumatoide seropositiva, sin especificar</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M06) Otras artritis reumatoides.">(M06) Otras artritis reumatoides.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M06.1) Enfermedad de Still de aparición en el adulto. (Excluye enfermedad de Still, sin especificar (M08.2).)">(M06.1) Enfermedad de Still de aparición en el adulto. (Excluye enfermedad de Still, sin especificar (M08.2).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M06.2) Bursitis reumatoide.">(M06.2) Bursitis reumatoide.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M06.3) Nódulo reumatoide.">(M06.3) Nódulo reumatoide.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M06.4) Poliartropatía inflamatoria. (Excluye poliartritis, sin especificar (M13.0).)">(M06.4) Poliartropatía inflamatoria. (Excluye poliartritis, sin especificar (M13.0).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M06.8) Otras artritis reumatoides especificadas.">(M06.8) Otras artritis reumatoides especificadas.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M06.9) Artritis reumatoide, sin especificar.(no está vigente)">(M06.9) Artritis reumatoide, sin especificar.(no está vigente)</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M07) Artropatías psoriásicas y enteropáticas. (Excluye artropatías psoriásicas y enteropáticas juveniles (M09.-).)">(M07) Artropatías psoriásicas y enteropáticas. (Excluye artropatías psoriásicas y enteropáticas juveniles (M09.-).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M07.0) Artropatía psoriásica interfalángica (L40.5).">(M07.0) Artropatía psoriásica interfalángica (L40.5).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M07.1) Artritis mutilans (L40.5).">(M07.1) Artritis mutilans (L40.5).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M07.2) Espondilitis psoriásica (L40.5).">(M07.2) Espondilitis psoriásica (L40.5).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M07.3) Otras artropatías psoriásicas (L40.5).">(M07.3) Otras artropatías psoriásicas (L40.5).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M07.4) Artropatía en enfermedad de Crohn (K50.-).">(M07.4) Artropatía en enfermedad de Crohn (K50.-).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M07.5) Artropatía en colitis ulcerosa (K51.-).">(M07.5) Artropatía en colitis ulcerosa (K51.-).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M07.6) Otras artropatías enteropáticas.">(M07.6) Otras artropatías enteropáticas.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M08) Artritis juvenil. (Incluye artritis infantil, de aparición antes del 16º cumpleaños y con más de 3 meses de duración. Excluye síndrome de Felty (M05.0) y dermatomiositis juvenil (M33.0).)">(M08) Artritis juvenil. (Incluye artritis infantil, de aparición antes del 16º cumpleaños y con más de 3 meses de duración. Excluye síndrome de Felty (M05.0) y dermatomiositis juvenil (M33.0).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M08.0) Artritis reumatoide juvenil (con o sin factor reumatoide).">(M08.0) Artritis reumatoide juvenil (con o sin factor reumatoide).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M08.1) Espondilitis anquilosante juvenil. (Excluye espondilitis anquilosante del adulto (M45).)">(M08.1) Espondilitis anquilosante juvenil. (Excluye espondilitis anquilosante del adulto (M45).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M08.2) Artritis juvenil con afectación sistémica: enfermedad de Still, sin especificar). (Excluye enfermedad de Still de aparición en el adulto (M06.1).)">(M08.2) Artritis juvenil con afectación sistémica: enfermedad de Still, sin especificar). (Excluye enfermedad de Still de aparición en el adulto (M06.1).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M08.3) Poliartritis juvenil crónica (seronegativa).">(M08.3) Poliartritis juvenil crónica (seronegativa).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M08.4) Artritis juvenil pauciarticular.">(M08.4) Artritis juvenil pauciarticular.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M08.8) Otras artritis juveniles.">(M08.8) Otras artritis juveniles.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M08.9) Artritis juvenil, sin especificar.">(M08.9) Artritis juvenil, sin especificar.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M09) Artritis juvenil en enfermedades clasificadas en otras partes. (Excluye artropatía en enfermedad de Whipple (M14.8).)">(M09) Artritis juvenil en enfermedades clasificadas en otras partes. (Excluye artropatía en enfermedad de Whipple (M14.8).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M09.0) Artritis juvenil en psoriasis (L40.5).">(M09.0) Artritis juvenil en psoriasis (L40.5).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M09.1) Artritis juvenil en enfermedad de Crohn (enteritis regional) (K50.-)">(M09.1) Artritis juvenil en enfermedad de Crohn (enteritis regional) (K50.-)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M09.2) Artritis juvenil en colitis ulcerosa (K51.-).">(M09.2) Artritis juvenil en colitis ulcerosa (K51.-).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M09.8) Artritis juvenil en otras enfermedades clasificadas en otras partes.">(M09.8) Artritis juvenil en otras enfermedades clasificadas en otras partes.</a>





<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M10) Gota.">(M10) Gota.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M10.0) Gota idiopática (bursitis gotosa, gota primaria o tofo gotoso del corazón (I43.8).">(M10.0) Gota idiopática (bursitis gotosa, gota primaria o tofo gotoso del corazón (I43.8).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M10.1) Gota inducida por plomo.">(M10.1) Gota inducida por plomo.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M10.2) Gota inducida por fármacos o drogas. Use los códigos del capítulo XX si desea identificar cuál.">(M10.2) Gota inducida por fármacos o drogas. Use los códigos del capítulo XX si desea identificar cuál.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M10.3) Gota debida a empeoramiento de la función renal.">(M10.3) Gota debida a empeoramiento de la función renal.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M10.4) Otras gotas secundarias.">(M10.4) Otras gotas secundarias.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M10.9) Gota, sin especificar.">(M10.9) Gota, sin especificar.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M11) Otras artropatías por cristales.">(M11) Otras artropatías por cristales.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M11.0) Enfermedad por depósito de hidroxiapatita.">(M11.0) Enfermedad por depósito de hidroxiapatita.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M11.1) Condrocalcinosis familiar.">(M11.1) Condrocalcinosis familiar.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M11.2) Otras condrocalcinosis. Condrocalcinosis, sin especificar.">(M11.2) Otras condrocalcinosis. Condrocalcinosis, sin especificar.>/
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M11.8) Otras artropatías por cristales especificardas.">(M11.8) Otras artropatías por cristales especificardas.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M11.9) Artropatía por cristales, sin especificar.">(M11.9) Artropatía por cristales, sin especificar.</a>




<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M12) Otras artropatías específicas. (Excluye artropatía, sin especificar (M13.9), artrosis (M15-M19) y artropatía cricoaritenoidea (J38.7).)">(M12) Otras artropatías específicas. (Excluye artropatía, sin especificar (M13.9), artrosis (M15-M19) y artropatía cricoaritenoidea (J38.7).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M12.0) Artropatía postreumática crónica (enfermedad de Jaccoud).">(M12.0) Artropatía postreumática crónica (enfermedad de Jaccoud).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M12.1) Enfermedad de Kaschin-Beck.">(M12.1) Enfermedad de Kaschin-Beck.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M12.2) Sinovitis vellonodular pigmentada.">(M12.2) Sinovitis vellonodular pigmentada.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M12.3) Reumatismo palindrómico.">(M12.3) Reumatismo palindrómico.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M12.4) Hidrartrosis intermitente.">(M12.4) Hidrartrosis intermitente.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M12.5) Artropatía traumática. (Excluye artrosis post-traumática, sin especificar (M19.1) y artrosis post-traumática de la primera articulación carpometacarpiana (M18.2-M18.3), cadera (M16.4-M16.5), rodilla (M17.2-M17.3) y otras monoarticulaciones (M19.1).)">(M12.5) Artropatía traumática. (Excluye artrosis post-traumática, sin especificar (M19.1) y artrosis post-traumática de la primera articulación carpometacarpiana (M18.2-M18.3), cadera (M16.4-M16.5), rodilla (M17.2-M17.3) y otras monoarticulaciones (M19.1).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M12.8) Otras artropatías específicas, no clasificadas en otras partes. Artropatía transiente.">(M12.8) Otras artropatías específicas, no clasificadas en otras partes. Artropatía transiente.</a>





<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M13) Otras artritis. (Excluye artrosis (M15-M19).)">(M13) Otras artritis. (Excluye artrosis (M15-M19).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M13.0) Poliartritis, sin especificar.">(M13.0) Poliartritis, sin especificar.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M13.1) Monoartritis, no clasificada en otras partes.">(M13.1) Monoartritis, no clasificada en otras partes.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M13.8) Otras artritis especificadas. Artritis alérgica.">(M13.8) Otras artritis especificadas. Artritis alérgica.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M13.9) Artritis, sin especificar. Artropatía, sin especificar.">(M13.9) Artritis, sin especificar. Artropatía, sin especificar.</a>





<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M14) Artropatías en otras enfermedades clasificadas en otras partes. (Excluye artropatías en enfermedades hematológicas (M36.2-M36.3), reacciones de hipersensibilidad (M36.4), neoplasias (M36.1); espondilopatía neuropática (M49.4); artropatías psoriásicas y enteropáticas (M07.-) y juvenil (M09.-).)">(M14) Artropatías en otras enfermedades clasificadas en otras partes. (Excluye artropatías en enfermedades hematológicas (M36.2-M36.3), reacciones de hipersensibilidad (M36.4), neoplasias (M36.1); espondilopatía neuropática (M49.4); artropatías psoriásicas y enteropáticas (M07.-) y juvenil (M09.-).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M14.0) Artropatía gotosa debida a defectos enzimáticos y otros desórdenes hereditarios: artropatía gotosa en síndrome de Lesch-Nyhan (E79.1) y en la anemia de células falciformes (D57.-).">(M14.0) Artropatía gotosa debida a defectos enzimáticos y otros desórdenes hereditarios: artropatía gotosa en síndrome de Lesch-Nyhan (E79.1) y en la anemia de células falciformes (D57.-).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M14.1) Artropatía por cristales en otros desórdenes metabólicos: artropatía por cristales en hiperparatiroidismo (E21.-).">(M14.1) Artropatía por cristales en otros desórdenes metabólicos: artropatía por cristales en hiperparatiroidismo (E21.-).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M14.2) Artropatía diabética (E10-E14, con el cuarto carácter .6 en común). (Excluye artropatía neuropática diabética (M14.6).)">(M14.2) Artropatía diabética (E10-E14, con el cuarto carácter .6 en común). (Excluye artropatía neuropática diabética (M14.6).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M14.3) Dermatoartritis lipoidea (E78.8).">(M14.3) Dermatoartritis lipoidea (E78.8).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M14.4) Artropatía en amiloidosis (E85.-).">(M14.4) Artropatía en amiloidosis (E85.-).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M14.5) Artropatías en otras enfermedades endocrinas, nutricionales y metabólicas: artropatía en acromegalia y gigantismo pituitiario (E22.0), hemocromatosis (E83.1), hipotiroidismo (E00-E03) e hipertiroidismo (tirotoxicosis) (E05.-).">(M14.5) Artropatías en otras enfermedades endocrinas, nutricionales y metabólicas: artropatía en acromegalia y gigantismo pituitiario (E22.0), hemocromatosis (E83.1), hipotiroidismo (E00-E03) e hipertiroidismo (tirotoxicosis) (E05.-).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M14.6) Artropatía neuropática: artropatía tabética o de Charcot (A52.1) y artropatía neuropática diabética (E10-E14, con el cuarto carácter .6 en común).">(M14.6) Artropatía neuropática: artropatía tabética o de Charcot (A52.1) y artropatía neuropática diabética (E10-E14, con el cuarto carácter .6 en común).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M14.8) Artropatías en otras enfermedades especificadas clasificadas en otras partes. Artropatías en eritema multiforme (L51.-), eritema nodoso (L52.-), sarcoidosis (D86.8) y enfermedad de Whipple (K90.8).">(M14.8) Artropatías en otras enfermedades especificadas clasificadas en otras partes. Artropatías en eritema multiforme (L51.-), eritema nodoso (L52.-), sarcoidosis (D86.8) y enfermedad de Whipple (K90.8).</a>



<a name="bajar_1"></a>
<a class="identar_2" href="diagnostico_2.php?Diagnostico=Artrosis (M15-M19)">Artrosis (M15-M19)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M15) Poliartrosis. (Incluye artrosis con mención de más de una localización. Excluye afectación bilateral de una articulación (M16-M19).)">(M15) Poliartrosis. (Incluye artrosis con mención de más de una localización. Excluye afectación bilateral de una articulación (M16-M19).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M15.0) (Osteo)artrosis primaria generalizada.">(M15.0) (Osteo)artrosis primaria generalizada.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M15.1) Nódulos de Heberden con artropatía.">(M15.1) Nódulos de Heberden con artropatía.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M15.2) Nódulos de Bouchard con artropatía.">(M15.2) Nódulos de Bouchard con artropatía.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M15.3) Artrosis secundaria múltiple. Poliartrosis post-traumática.">(M15.3) Artrosis secundaria múltiple. Poliartrosis post-traumática.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M15.4) (Osteo)artrosis erosiva.">(M15.4) (Osteo)artrosis erosiva.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M15.9) Poliartrosis, sin especificar. Osteoatritis generalizada, sin especificar.">(M15.9) Poliartrosis, sin especificar. Osteoatritis generalizada, sin especificar.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M16)Coxartrosis (artrosis de la cadera).">(M16)Coxartrosis (artrosis de la cadera).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M16.0)Coxartrosis primaria bilateral.
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M16.1) Otras coxartrosis primarias: unilateral o sin especificar.
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M16.2) Coxartrosis displásica bilateral.
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M16.3) Otras coxartrosis displásicas: unilateral o sin especificar.
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M16.4) Coxartrosis post-traumática bilateral.
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M16.5) Otras coxartrosis post-traumáticas: unilateral o sin especificar.
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M16.6) Otras coxartrosis secundarias bilaterales.
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M16.7) Otras coxartrosis secundarias: unilateral o sin especificar.
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M16.9) Coxartrosis, sin especificar.




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M17) Gonartrosis (artrosis de la rodilla).">(M17) Gonartrosis (artrosis de la rodilla).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M17.0) Gonartrosis primaria bilateral.">(M17.0) Gonartrosis primaria bilateral.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M17.1) Otras gonartrosis primarias: unilateral o sin especificar.">(M17.1) Otras gonartrosis primarias: unilateral o sin especificar.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M17.2) Gonartrosis post-traumática bilateral.">(M17.2) Gonartrosis post-traumática bilateral.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M17.3) Otras gonartrosis post-traumáticas: unilateral o sin especificar.">(M17.3) Otras gonartrosis post-traumáticas: unilateral o sin especificar.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M17.4) Otras gonartrosis secundarias bilaterales.">(M17.4) Otras gonartrosis secundarias bilaterales.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M17.5) Otras gonartrosis secundarias: unilateral o sin especificar.">(M17.5) Otras gonartrosis secundarias: unilateral o sin especificar.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M17.9) Gonartrosis, sin especificar.">(M17.9) Gonartrosis, sin especificar.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M18) Artrosis de la primera articulación carpometacarpiana.">(M18) Artrosis de la primera articulación carpometacarpiana.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M18.0) Artrosis primaria bilateral de la primera articulación carpometarcarpiana.">(M18.0) Artrosis primaria bilateral de la primera articulación carpometarcarpiana.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M18.1) Otras artrosis primarias de la primera articulación carpometacarpiana: unilateral o sin especificar.">(M18.1) Otras artrosis primarias de la primera articulación carpometacarpiana: unilateral o sin especificar.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M18.2) Artrosis post-traumática bilateral de la primera articulación carpometacarpiana">(M18.2) Artrosis post-traumática bilateral de la primera articulación carpometacarpiana</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M18.3) Otras artrosis post-traumáticas bilaterales de la primera articulación carpometacarpiana: unilateral o sin especificar.">(M18.3) Otras artrosis post-traumáticas bilaterales de la primera articulación carpometacarpiana: unilateral o sin especificar.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M18.4) Otras artrosis secundarias bilaterales de la primera articulación carpometacarpiana.">(M18.4) Otras artrosis secundarias bilaterales de la primera articulación carpometacarpiana.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M18.5) Otras artrosis secundarias de la primera articulación carpometacarpiana: unilateral o sin especificar.">(M18.5) Otras artrosis secundarias de la primera articulación carpometacarpiana: unilateral o sin especificar.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M18.9) Artrosis de la primera articulación carpometacarpiana, sin especificar.">(M18.9) Artrosis de la primera articulación carpometacarpiana, sin especificar.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M19) Otras artrosis. (Excluye artrosis de la columna(M47.-), hallux rigidus (M20.-), poliartrosis (M15.-).)">(M19) Otras artrosis. (Excluye artrosis de la columna(M47.-), hallux rigidus (M20.-), poliartrosis (M15.-).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M19.0) Artrosis primaria de otras articulaciones (sin especificar).">(M19.0) Artrosis primaria de otras articulaciones (sin especificar).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M19.1) Artrosis post-traumática de otras articulaciones (sin especificar).">(M19.1) Artrosis post-traumática de otras articulaciones (sin especificar).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M19.2) Otras artrosis secundarias (sin especificar).">(M19.2) Otras artrosis secundarias (sin especificar).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M19.8) Otras artrosis especificadas.">(M19.8) Otras artrosis especificadas.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M19.9) Artrosis, sin especificar.">(M19.9) Artrosis, sin especificar.</a>


<a name="bajar_2"></a>
<a class="identar_2" href="diagnostico_2.php?Diagnostico=Otras patologías articulares (M20-M25) (excluye articulaciones de la columna)">Otras patologías articulares (M20-M25) (excluye articulaciones de la columna)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M20) Deformidades adquiridas de los dedos. (Excluye ausencia adquirida de dedos (Z98.-), ausencia congénita de dedos (Q71.2, Q72.3), deformidades y malformaciones de los dedos (Q66.-, Q68-Q70, Q74.-).)">(M20) Deformidades adquiridas de los dedos. (Excluye ausencia adquirida de dedos (Z98.-), ausencia congénita de dedos (Q71.2, Q72.3), deformidades y malformaciones de los dedos (Q66.-, Q68-Q70, Q74.-).)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M20.0) Deformidad de los dedos las manos y de los pies">(M20.0) Deformidad de los dedos las manos y de los pies</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M20.1) Hallux valgus (adquirida)">(M20.1) Hallux valgus (adquirida)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M20.2) Hallux rigidus">(M20.2) Hallux rigidus</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M20.3) Otras deformaciones del hállux (adquiridas)">(M20.3) Otras deformaciones del hállux (adquiridas)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M20.4) Dedo en martillo (adquirido)">(M20.4) Dedo en martillo (adquirido)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M20.5) Otras deformidades de los dedos de los pies">(M20.5) Otras deformidades de los dedos de los pies</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M20.6) Deformidad de los dedos de los pies sin especificar">(M20.6) Deformidad de los dedos de los pies sin especificar</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M21) Otras deformidades de las extremidades.">(M21) Otras deformidades de las extremidades.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M21.0) Deformidad en valgo no clasificada en otra parte">(M21.0) Deformidad en valgo no clasificada en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M21.1) Deformidad en varo no clasificada en otra parte">(M21.1) Deformidad en varo no clasificada en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M21.2) Deformidad en flexión">(M21.2) Deformidad en flexión</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M21.3) Muñeca o pie caído (adquirido)">(M21.3) Muñeca o pie caído (adquirido)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M21.4) Pies planos (adquirido)">(M21.4) Pies planos (adquirido)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M21.5) Garra de mano, mano deforme, garra de pie y pie deforme adquiridas">(M21.5) Garra de mano, mano deforme, garra de pie y pie deforme adquiridas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M21.6) Otras deformidades adquiridas del tobillo y del pie">(M21.6) Otras deformidades adquiridas del tobillo y del pie</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M21.7) Longitud desigual de las extremidades (adquirida)">(M21.7) Longitud desigual de las extremidades (adquirida)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M21.8) Otras deformidades adquiridas de las extremidades especificadas">(M21.8) Otras deformidades adquiridas de las extremidades especificadas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M21.9) Deformidad adquirida de las extremidades sin especificar.">(M21.9) Deformidad adquirida de las extremidades sin especificar.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M22) Trastornos de la rótula.">(M22) Trastornos de la rótula.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M22.0) Dislocación recurrende de la rótula">(M22.0) Dislocación recurrende de la rótula</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M22.1) Subluxación recurrente de la rótula">(M22.1) Subluxación recurrente de la rótula</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M22.2) Trastornos rotulofemorales">(M22.2) Trastornos rotulofemorales</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M22.4) Condromalacia rotuliana">(M22.4) Condromalacia rotuliana</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M22.8) Otros trastornos de la rótula">(M22.8) Otros trastornos de la rótula</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M22.9) Trastorno de la rótula sin especificar">(M22.9) Trastorno de la rótula sin especificar</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M23) Trastornos internos de la rodilla.">(M23) Trastornos internos de la rodilla.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M23.0) Menisco quístico">(M23.0) Menisco quístico</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M23.1) Menisco discoide (congénito)">(M23.1) Menisco discoide (congénito)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M23.2) Trastorno del menisco debido a roturas o heridas antiguas">(M23.2) Trastorno del menisco debido a roturas o heridas antiguas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M23.3) Otros trastornos del menisco">(M23.3) Otros trastornos del menisco</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M23.4) Flacidez de la rodilla">(M23.4) Flacidez de la rodilla</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M23.5) Inestabilidad crónica de la rodilla">(M23.5) Inestabilidad crónica de la rodilla</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M23.6) Otras roturas espontáneas de los ligamentos de la rodilla">(M23.6) Otras roturas espontáneas de los ligamentos de la rodilla</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M23.8) Otros trastornos internos de la rodilla">(M23.8) Otros trastornos internos de la rodilla</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M23.9) Trastorno interno de la rodilla sin especificar">(M23.9) Trastorno interno de la rodilla sin especificar</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M24) Otros trastornos específicos de las articulaciones.">(M24) Otros trastornos específicos de las articulaciones.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M24.0) Flacidez de las articulaciones">(M24.0) Flacidez de las articulaciones</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M24.1) Otros trastornos de los cartílados articulares">(M24.1) Otros trastornos de los cartílados articulares</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M24.2) Trastorno de los ligamentos">(M24.2) Trastorno de los ligamentos</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M24.3) Dislocación patológica y subluxación de las articulaciones, no clasificadas en otra parte">(M24.3) Dislocación patológica y subluxación de las articulaciones, no clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M24.4) Dislocación recurrente y subluxación de las articulaciones">(M24.4) Dislocación recurrente y subluxación de las articulaciones</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M24.5) Contractura de las articulaciones">(M24.5) Contractura de las articulaciones</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M24.6) Anquilosis de las articulaciones">(M24.6) Anquilosis de las articulaciones</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M24.7) Protrusión acetabular">(M24.7) Protrusión acetabular</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M24.8) Otros trastornos articulares específicos, no clasificados en otra parte">(M24.8) Otros trastornos articulares específicos, no clasificados en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M24.9) Trastorno articular sin especificar">(M24.9) Trastorno articular sin especificar</a>





<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M25) Otros trastornos articulares no clasificados en otra parte.">(M25) Otros trastornos articulares no clasificados en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M25.0) Hemartrosis">(M25.0) Hemartrosis</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M25.1) Fístula articular">(M25.1) Fístula articular</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M25.2) Articulación batiente">(M25.2) Articulación batiente</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M25.3) Otras inestabilidades articulates">(M25.3) Otras inestabilidades articulates</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M25.4) Derrame articular">(M25.4) Derrame articular</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M25.5) Dolor articular">(M25.5) Dolor articular</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M25.6) Rigidez articular, no clasificada en otra parte">(M25.6) Rigidez articular, no clasificada en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M25.7) Osteofito">(M25.7) Osteofito</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M25.8) Otros trastornos especificados articulares">(M25.8) Otros trastornos especificados articulares</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M25.9) Trastorno articular sin especificar">(M25.9) Trastorno articular sin especificar</a>



<a name="bajar_3"></a>
<a class="identar_1"  style="margin-bottom: 1%" href="diagnostico_2.php?Diagnostico=Trastornos sistémicos del tejido conectivo (M30-M36)">Trastornos sistémicos del tejido conectivo (M30-M36)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M30) Poliarteritis nodosa y enfermedades relacionadas.">(M30) Poliarteritis nodosa y enfermedades relacionadas.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M30.0) Poliarteritis nodosa">(M30.0) Poliarteritis nodosa</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M30.1) Poliarteritis con implicación del pulmón">(M30.1) Poliarteritis con implicación del pulmón</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M30.2) Poliarteritis juvenil">(M30.2) Poliarteritis juvenil</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M30.3) Síndrome de los nodos linfáticos mucocutáneos">(M30.3) Síndrome de los nodos linfáticos mucocutáneos</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M30.8) Otras enfermedades relacionadas con la poliarteritis nodosa">(M30.8) Otras enfermedades relacionadas con la poliarteritis nodosa</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M31) Otras vasculopatías necrotizantes.">(M31) Otras vasculopatías necrotizantes.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M31.0) Angiitis hipersensitiva">(M31.0) Angiitis hipersensitiva</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M31.1) Microangiopatía trombótica">(M31.1) Microangiopatía trombótica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M31.2) Granuloma de media línea letal">(M31.2) Granuloma de media línea letal</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M31.3) Granulomatosis de Wegener">(M31.3) Granulomatosis de Wegener</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M31.4) Síndrome del arco aórtico">(M31.4) Síndrome del arco aórtico</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M31.5) Arteritis de célula gigante con polimialgia reumática">(M31.5) Arteritis de célula gigante con polimialgia reumática</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M31.6) Otras arteritis de célula gigante">(M31.6) Otras arteritis de célula gigante</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M31.8) Otras vasculopatías necrotizantes especificadas">(M31.8) Otras vasculopatías necrotizantes especificadas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=">(M31.9) Vasculopatía necrotizante sin especificar</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M32) Lupus eritematoso sistémico.">(M32) Lupus eritematoso sistémico.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M32.0) Lupus eritematoso sistémico inducido por drogas">(M32.0) Lupus eritematoso sistémico inducido por drogas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M32.1) Lupus eritematoso sistémico con implicación de órganos os sistemas">(M32.1) Lupus eritematoso sistémico con implicación de órganos os sistemas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M32.8) Otras formas de lupus eritematoso sistémico">(M32.8) Otras formas de lupus eritematoso sistémico</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M32.9) Lupus eritematoso sistémico sin especificar">(M32.9) Lupus eritematoso sistémico sin especificar</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M33) Dermatopolimiositis.">(M33) Dermatopolimiositis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M33.0) Dermatomiositis juvenil">(M33.0) Dermatomiositis juvenil</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M33.1) Otras dermatomiositis">(M33.1) Otras dermatomiositis</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M33.2) Polimiositis">(M33.2) Polimiositis</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M34) Esclerosis sistémica.">(M34) Esclerosis sistémica.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M35) Otras implicaciones sistémicas de tejidos conectivos.">(M35) Otras implicaciones sistémicas de tejidos conectivos.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M35.0) Síndrome de Sjögren (síndrome de Sicca)">(M35.0) Síndrome de Sjögren (síndrome de Sicca)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M35.2) Síndrome de Behçet">(M35.2) Síndrome de Behçet</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M35.3) Polimialgia reumática">(M35.3) Polimialgia reumática</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M35.4) Fascitis difusa (eosinofílica)">(M35.4) Fascitis difusa (eosinofílica)</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M36) Trastornos sistémicos de tejidos conectivos en enfermedades clasificadas en otra parte.">(M36) Trastornos sistémicos de tejidos conectivos en enfermedades clasificadas en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M36.2) Artropatia Hemofilica (D66-D68+)">(M36.2) Artropatia Hemofilica (D66-D68+)</a>


<a name="bajar_4"></a>
<a class="identar_1" href="diagnostico_2.php?Diagnostico=Dorsopatías (M40-M54)">Dorsopatías (M40-M54)</a>
<a class="identar_2" href="diagnostico_2.php?Diagnostico=Dorsopatías deformantes (M40-M43)">Dorsopatías deformantes (M40-M43)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M40) Cifosis y lordosis.">(M40) Cifosis y lordosis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M40.0) Cifosis postural">(M40.0) Cifosis postural</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M41) Escoliosis.">(M41) Escoliosis.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M42) Osteocondrosis espinal.">(M42) Osteocondrosis espinal.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M42.0) Osteocondrosis espinal juvenil">(M42.0) Osteocondrosis espinal juvenil</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M42.1) Osteocondrosis espinal adulta">(M42.1) Osteocondrosis espinal adulta</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M42.9) Osteocondrosis espinal sin especificar">(M42.9) Osteocondrosis espinal sin especificar</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M43) Otras dorsopatías deformantes.">(M43) Otras dorsopatías deformantes.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M43.0) Espondilolisis">(M43.0) Espondilolisis</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M43.1) Espondilolistesis">(M43.1) Espondilolistesis</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M43.2) Otras fusiones de la espina dorsal">(M43.2) Otras fusiones de la espina dorsal</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M43.6) Tortícolis">(M43.6) Tortícolis</a>


<a name="bajar_5"></a>
<a class="identar_2" href="diagnostico_2.php?Diagnostico=Espondiloartropatías (M45-M49)">Espondiloartropatías (M45-M49)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M45) Espondilitis anquilosante.">(M45) Espondilitis anquilosante.</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M46) Otras espondilopatías inflamatorias.">(M46) Otras espondilopatías inflamatorias.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M47) Espondilolisis.">(M47) Espondilolisis.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M48) Otras espondiloartropatías.">(M48) Otras espondiloartropatías.</a>




<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M48.0) Estenosis espinal">(M48.0) Estenosis espinal</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M48.1) Hiperostosos anquilosante (Forestier)">(M48.1) Hiperostosos anquilosante (Forestier)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M48.2) Espondilopatía interespinosa (vértebras &quot;en beso&quot;)">(M48.2) Espondilopatía interespinosa (vértebras "en beso")</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M48.3) Otras espondilopatías">(M48.3) Otras espondilopatías</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M48.4) Fractura de vértebra por fatiga">(M48.4) Fractura de vértebra por fatiga</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M48.5) Vértebra colapsada, no clasificada en otra parte">(M48.5) Vértebra colapsada, no clasificada en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M48.8) Otras espondilopatías especificadas">(M48.8) Otras espondilopatías especificadas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M48.9) Espondilopatía, no especificada">(M48.9) Espondilopatía, no especificada</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M49) Espondiloartropatías en enfermedades clasificadas en otra parte.">(M49) Espondiloartropatías en enfermedades clasificadas en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M49.0) Tuberculosis de la columna vertebral">(M49.0) Tuberculosis de la columna vertebral</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M49.1) Espondilitis por brucelosis">(M49.1) Espondilitis por brucelosis</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M49.2) Espondilitis por enterobacterias">(M49.2) Espondilitis por enterobacterias</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M49.3) Espondilopatía en otras enfermedades infecciosas y parasitarias clasificadas en otra parte">(M49.3) Espondilopatía en otras enfermedades infecciosas y parasitarias clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M49.4) Espondilopatía neurotica">(M49.4) Espondilopatía neurotica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M49.5) Vértebra colapsada en enfermedades clasificadas en otra parte">(M49.5) Vértebra colapsada en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M49.8) Espondilopatía en otras enfermedades clasificadas en otra parte">(M49.8) Espondilopatía en otras enfermedades clasificadas en otra parte



<a class="identar_2" href="diagnostico_2.php?Diagnostico=Otras dorsopatías (M50-M54)">Otras dorsopatías (M50-M54)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M50) Trastornos de disco cervical.">(M50) Trastornos de disco cervical.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M50.0) Trastorno de disco cervical con mielopatía (G99.2*)">(M50.0) Trastorno de disco cervical con mielopatía (G99.2*)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M50.1) Trastorno de disco cervical con radiculopatía">(M50.1) Trastorno de disco cervical con radiculopatía</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M50.2) Otros desplazamientos de disco cervical">(M50.2) Otros desplazamientos de disco cervical</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M50.3) Otras degeneraciones de disco cervical">(M50.3) Otras degeneraciones de disco cervical</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M50.8) Otros trastornos de disco cervical">(M50.8) Otros trastornos de disco cervical</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M50.9) Trastorno de disco cervical, no especificado">(M50.9) Trastorno de disco cervical, no especificado</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M51) Otros trastornos de los discos intervertebrales.">(M51) Otros trastornos de los discos intervertebrales.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M51.0) Trastornos de discos intervertebrales lumbares y otros, con mielopatía (G99.2*)">(M51.0) Trastornos de discos intervertebrales lumbares y otros, con mielopatía (G99.2*)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M51.1) Trastornos de disco lumbar y otros, con radiculopatía">(M51.1) Trastornos de disco lumbar y otros, con radiculopatía</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M51.2) Otros desplazamientos especificados de disco intervertebral">(M51.2) Otros desplazamientos especificados de disco intervertebral</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M51.3) Otras degeneraciones especificadas de disco intervertebral">(M51.3) Otras degeneraciones especificadas de disco intervertebral</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M51.4) Nódulo de Schmorl">(M51.4) Nódulo de Schmorl</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M51.8) Otros trastornos especificados de los discos intervertebrales">(M51.8) Otros trastornos especificados de los discos intervertebrales</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M51.9) Trastorno de los discos intervertebrales, no especificado">(M51.9) Trastorno de los discos intervertebrales, no especificado</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M53) Otras dorsopatías, no clasificadas en otra parte.">(M53) Otras dorsopatías, no clasificadas en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M53.0) Síndrome cervicocraneal">(M53.0) Síndrome cervicocraneal</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M53.1) Síndrome cervicobraquial">(M53.1) Síndrome cervicobraquial</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M53.2) Inestabilidad de la columna vertebral">(M53.2) Inestabilidad de la columna vertebral</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M53.3) Trastornos sacrococcígeos, no clasificados en otra parte">(M53.3) Trastornos sacrococcígeos, no clasificados en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M53.8) Otras dorsopatías especificadas">(M53.8) Otras dorsopatías especificadas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M53.9) Dorsopatía, no especificada">(M53.9) Dorsopatía, no especificada</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M54) Dorsalgia.">(M54) Dorsalgia.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M54.0) Paniculitis que afecta regiones del cuello y de la espalda">(M54.0) Paniculitis que afecta regiones del cuello y de la espalda</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M54.1) Radiculopatía">(M54.1) Radiculopatía</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M54.2) Cervicalgia">(M54.2) Cervicalgia</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M54.3) Ciática">(M54.3) Ciática</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M54.4) Lumbago con ciática">(M54.4) Lumbago con ciática</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M54.5) Lumbago no especificado">(M54.5) Lumbago no especificado</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M54.6) Dolor en la columna dorsal">(M54.6) Dolor en la columna dorsal</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M54.8) Otras dorsalgias">(M54.8) Otras dorsalgias</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M54.9) Dorsalgia, no especificada">(M54.9) Dorsalgia, no especificada</a>



<a name="bajar_6"></a>
<a class="identar_1" href="diagnostico_2.php?Diagnostico=Trastornos de los tejidos blandos (M60-M79)">Trastornos de los tejidos blandos (M60-M79)</a>
<a class="identar_2" href="diagnostico_2.php?Diagnostico=">Trastornos de los músculos (M60-M63)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M60) Miositis.">(M60) Miositis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M60.0) Miositis infecciosa">(M60.0) Miositis infecciosa</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M60.1) Miositis intersticial">(M60.1) Miositis intersticial</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M60.2) Granuloma por cuerpo extraño en tejido blando, no clasificado en otra parte">(M60.2) Granuloma por cuerpo extraño en tejido blando, no clasificado en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M60.8) Otras miositis">(M60.8) Otras miositis</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M60.9) Miositis, no especificada">(M60.9) Miositis, no especificada</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M61) Calcificación y osificación del músculo.">(M61) Calcificación y osificación del músculo.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M61.0) Miositis osificante traumática">(M61.0) Miositis osificante traumática</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M61.1) Miositis osificante progresiva">(M61.1) Miositis osificante progresiva</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M61.2) Calcificación y osificación paralítica del músculo">(M61.2) Calcificación y osificación paralítica del músculo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M61.3) Calcificación y osificación de los músculos asociadas con quemaduras">(M61.3) Calcificación y osificación de los músculos asociadas con quemaduras</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M61.4) Otras calcificaciones del músculo">(M61.4) Otras calcificaciones del músculo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M61.5) Otras osificaciones del músculo">(M61.5) Otras osificaciones del músculo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M61.9) Calcificación y osificación del músculo, no especificada">(M61.9) Calcificación y osificación del músculo, no especificada</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M62) Otros trastornos de los músculos.">(M62) Otros trastornos de los músculos.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M62.0) Diástasis del músculo">(M62.0) Diástasis del músculo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M62.1) Otros desgarros (no traumáticos) del músculo">(M62.1) Otros desgarros (no traumáticos) del músculo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M62.2) Infarto isquémico del músculo">(M62.2) Infarto isquémico del músculo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M62.3) Síndrome de inmovilidad (parapléjico)">(M62.3) Síndrome de inmovilidad (parapléjico)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M62.4) Contractura muscular">(M62.4) Contractura muscular</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M62.5) Atrofia y desgaste musculares, no clasificados en otra parte">(M62.5) Atrofia y desgaste musculares, no clasificados en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M62.6) Distensión muscular">(M62.6) Distensión muscular</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M62.8) Otros trastornos especificados de los músculos">(M62.8) Otros trastornos especificados de los músculos</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M62.9) Trastorno muscular, no especificado">(M62.9) Trastorno muscular, no especificado</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M63) Trastornos de los músculos en enfermedades clasificadas en otra parte.">(M63) Trastornos de los músculos en enfermedades clasificadas en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M63.0) Miositis en enfermedades bacterianas clasificadas en otra parte">(M63.0) Miositis en enfermedades bacterianas clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M63.1) Miositis en infecciones por protozoarios y par sitos clasificadas en otra parte">(M63.1) Miositis en infecciones por protozoarios y par sitos clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M63.2) Miositis en otras enfermedades infecciosas clasificadas en otra parte">(M63.2) Miositis en otras enfermedades infecciosas clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M63.3) Miositis en sarcoidosis (D86.8+)">(M63.3) Miositis en sarcoidosis (D86.8+)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M63.8) Otros trastornos de los músculos en enfermedades clasificadas en otra parte">(M63.8) Otros trastornos de los músculos en enfermedades clasificadas en otra parte</a>




<a name="bajar_7"></a>
<a class="identar_2" href="diagnostico_2.php?Diagnostico=Trastornos de la sinovia y los tendones (M65-M68)">Trastornos de la sinovia y los tendones (M65-M68)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M65) Sinovitis y tenosinovitis.">(M65) Sinovitis y tenosinovitis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M65.0) Absceso de vaina tendinosa">(M65.0) Absceso de vaina tendinosa</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M65.1) Otras (teno)sinovitis infecciosas">(M65.1) Otras (teno)sinovitis infecciosas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M65.2) Tendinitis calcificada">(M65.2) Tendinitis calcificada</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M65.3) Dedo en gatillo">(M65.3) Dedo en gatillo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M65.4) Tenosinovitis de estiloides radial [de Quervain]">(M65.4) Tenosinovitis de estiloides radial [de Quervain]</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M65.8) Otras sinovitis y tenosinovitis">(M65.8) Otras sinovitis y tenosinovitis</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M65.9) Sinovitis y tenosinovitis, no especificada">(M65.9) Sinovitis y tenosinovitis, no especificada</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M66) Ruptura espontánea de la membrana sinovial y del tendón.">(M66) Ruptura espontánea de la membrana sinovial y del tendón.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M66.0) Ruptura de quiste sinovial poplíteo">(M66.0) Ruptura de quiste sinovial poplíteo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M66.1) Ruptura de la sinovia">(M66.1) Ruptura de la sinovia</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M66.2) Ruptura espontánea de tendones extensores">(M66.2) Ruptura espontánea de tendones extensores</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M66.3) Ruptura espontánea de tendones flexores">(M66.3) Ruptura espontánea de tendones flexores</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M66.4) Ruptura espontánea de otros tendones">(M66.4) Ruptura espontánea de otros tendones</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M66.5) Ruptura espontánea de tendón no especificado">(M66.5) Ruptura espontánea de tendón no especificado</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M67) Otros trastornos de la membrana sinovial y del tendón.">(M67) Otros trastornos de la membrana sinovial y del tendón.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M67.0) Acortamiento del tendón de Aquiles (adquirido)">(M67.0) Acortamiento del tendón de Aquiles (adquirido)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M67.1) Otras contracturas de tendón (vaina)">(M67.1) Otras contracturas de tendón (vaina)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M67.2) Hipertrofia sinovial, no clasificada en otra parte">(M67.2) Hipertrofia sinovial, no clasificada en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M67.3) Sinovitis transitoria">(M67.3) Sinovitis transitoria</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M67.4) Ganglión">(M67.4) Ganglión</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M67.8) Otros trastornos especificados de la sinovia y del tendón">(M67.8) Otros trastornos especificados de la sinovia y del tendón</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M67.9) Trastorno sinovial y tendinoso, no especificado">(M67.9) Trastorno sinovial y tendinoso, no especificado</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M68) Trastornos de los tendones y de la sinovia en enfermedades clasificadas en otra parte.">(M68) Trastornos de los tendones y de la sinovia en enfermedades clasificadas en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M68.0) Sinovitis y tenosinovitis en enfermedades bacterianas clasificadas en otra parte">(M68.0) Sinovitis y tenosinovitis en enfermedades bacterianas clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M68.8) Otros trastornos sinoviales y tendinosos en enfermedades clasificadas en otra parte">(M68.8) Otros trastornos sinoviales y tendinosos en enfermedades clasificadas en otra parte</a>



<a class="identar_2" href="diagnostico_2.php?Diagnostico=Otros trastornos de los tejidos blandos (M70-M79)">Otros trastornos de los tejidos blandos (M70-M79)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M70) Trastornos de los tejidos blandos relacionados con el uso, el uso excesivo y la presión.">(M70) Trastornos de los tejidos blandos relacionados con el uso, el uso excesivo y la presión.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M70.0) Sinovitis crepitante crónica de la mano y de la muñeca">(M70.0) Sinovitis crepitante crónica de la mano y de la muñeca</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M70.1) Bursitis de la mano">(M70.1) Bursitis de la mano</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M70.2) Bursitis del olécranon">(M70.2) Bursitis del olécranon</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M70.3) Otras bursitis del codo">(M70.3) Otras bursitis del codo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M70.4) Otras bursitis prerrotulianas">(M70.4) Otras bursitis prerrotulianas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M70.5) Otras bursitis de la rodilla">(M70.5) Otras bursitis de la rodilla</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M70.6) Bursitis del trocánter">(M70.6) Bursitis del trocánter</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M70.7) Otras bursitis de la cadera">(M70.7) Otras bursitis de la cadera</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M70.8) Otros trastornos de los tejidos blandos relacionados con el uso, el uso excesivo y la presión">(M70.8) Otros trastornos de los tejidos blandos relacionados con el uso, el uso excesivo y la presión</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M70.9) Trastorno no especificado de los tejidos blandos relacionado con el uso, el uso excesivo y la presión">(M70.9) Trastorno no especificado de los tejidos blandos relacionado con el uso, el uso excesivo y la presión</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M71) Otras bursopatías.">(M71) Otras bursopatías.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M71.0) Absceso de la bolsa sinovial">(M71.0) Absceso de la bolsa sinovial</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M71.1) Otras bursitis infecciosas">(M71.1) Otras bursitis infecciosas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M71.2) Quiste sinovial del hueco poplíteo [de Baker]">(M71.2) Quiste sinovial del hueco poplíteo [de Baker]</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M71.3) Otros quistes de la bolsa serosa">(M71.3) Otros quistes de la bolsa serosa</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M71.4) Depósito de calcio en la bolsa serosa">(M71.4) Depósito de calcio en la bolsa serosa</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M71.5) Otras bursitis, no clasificadas en otra parte">(M71.5) Otras bursitis, no clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M71.8) Otros trastornos especificados de la bolsa serosa">(M71.8) Otros trastornos especificados de la bolsa serosa</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M71.9) Bursopatía, no especificada">(M71.9) Bursopatía, no especificada</a>





<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M72) Trastornos fibroblásticos.">(M72) Trastornos fibroblásticos.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M72.0) Fibromatosis de la aponeurosis palmar [Dupuytren]">(M72.0) Fibromatosis de la aponeurosis palmar [Dupuytren]</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M72.1) Nódulos interfalángicos">(M72.1) Nódulos interfalángicos</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M72.2) Fibromatosis de la aponeurosis plantar">(M72.2) Fibromatosis de la aponeurosis plantar</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M72.3) Fascitis nodular">(M72.3) Fascitis nodular</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M72.4) Fibromatosis seudosarcomatosa">(M72.4) Fibromatosis seudosarcomatosa</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M72.5) Fascitis, no clasificada en otra parte">(M72.5) Fascitis, no clasificada en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M72.8) Otros trastornos fibroblásticos">(M72.8) Otros trastornos fibroblásticos</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M72.6) Fascitis necrotizante">(M72.6) Fascitis necrotizante</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M72.9) Trastorno fibroblástico, no especificado">(M72.9) Trastorno fibroblástico, no especificado</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M73) Trastornos de los tejidos blandos en enfermedades clasificadas en otra parte.">(M73) Trastornos de los tejidos blandos en enfermedades clasificadas en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M73.0) Bursitis gonocócica (A54.4+)">(M73.0) Bursitis gonocócica (A54.4+)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M73.1) Bursitis sifilítica (A52.7+)">(M73.1) Bursitis sifilítica (A52.7+)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M73.8) Otros trastornos de los tejidos blandos en enfermedades clasificadas en otra parte">(M73.8) Otros trastornos de los tejidos blandos en enfermedades clasificadas en otra parte</a>





<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M75) Lesiones del hombro.">(M75) Lesiones del hombro.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M75.0) Capsulitis adhesiva del hombro">(M75.0) Capsulitis adhesiva del hombro</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M75.1) Síndrome del manguito rotatorio">(M75.1) Síndrome del manguito rotatorio</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M75.2) Tendinitis del bíceps">(M75.2) Tendinitis del bíceps</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M75.3) Tendinitis calcificante del hombro">(M75.3) Tendinitis calcificante del hombro</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M75.4) Síndrome de abducción dolorosa del hombro">(M75.4) Síndrome de abducción dolorosa del hombro</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M75.5) Bursitis del hombro">(M75.5) Bursitis del hombro</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M75.8) Otras lesiones del hombro">(M75.8) Otras lesiones del hombro</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M75.9) Lesión del hombro, no especificada">(M75.9) Lesión del hombro, no especificada</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M76) Entesopatías del miembro inferior, excluido el pie.">(M76) Entesopatías del miembro inferior, excluido el pie.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M76.0) Tendinitis del glúteo">(M76.0) Tendinitis del glúteo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M76.1) Tendinitis del psoas">(M76.1) Tendinitis del psoas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M76.2) Espolón de la cresta iliaca">(M76.2) Espolón de la cresta iliaca</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M76.3) Síndrome del tendón del tensor de la fascia lata">(M76.3) Síndrome del tendón del tensor de la fascia lata</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M76.4) Bursitis tibial colateral [Pellegrini-Stieda]">(M76.4) Bursitis tibial colateral [Pellegrini-Stieda]</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M76.5) Tendinitis rotuliana">(M76.5) Tendinitis rotuliana</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M76.6) Tendinitis aquiliana">(M76.6) Tendinitis aquiliana</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M76.7) Tendinitis peroneal">(M76.7) Tendinitis peroneal</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M76.8) Otras entesopatías del miembro inferior, excluido el pie">(M76.8) Otras entesopatías del miembro inferior, excluido el pie</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M76.9) Entesopatía del miembro inferior, no especificada">(M76.9) Entesopatía del miembro inferior, no especificada</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M77) Otras entesopatías.">(M77) Otras entesopatías.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M77.0) Epicondilitis media">(M77.0) Epicondilitis media</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M77.1) Epicondilitis lateral">(M77.1) Epicondilitis lateral</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M77.2) Periartritis de la muñeca">(M77.2) Periartritis de la muñeca</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M77.3) Espolón calcáneo">(M77.3) Espolón calcáneo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M77.4) Metatarsalgia">(M77.4) Metatarsalgia</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M77.5) Otras entesopatías del pie">(M77.5) Otras entesopatías del pie</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M77.8) Otras entesopatías, no clasificadas en otra parte">(M77.8) Otras entesopatías, no clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M77.9) Entesopatía, no especificada">(M77.9) Entesopatía, no especificada</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M79) Otros trastornos de los tejidos blandos, no clasificados en otra parte.">(M79) Otros trastornos de los tejidos blandos, no clasificados en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M79.0) Reumatismo, no especificado">(M79.0) Reumatismo, no especificado</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M79.1) Mialgia">(M79.1) Mialgia</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M79.2) Neuralgia y neuritis, no especificadas">(M79.2) Neuralgia y neuritis, no especificadas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M79.3) Paniculitis, no especificada">(M79.3) Paniculitis, no especificada</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M79.4) Hipertrofia de paquete adiposo (infrarrotuliano)">(M79.4) Hipertrofia de paquete adiposo (infrarrotuliano)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M79.5) Cuerpo extraño residual en tejido blando">(M79.5) Cuerpo extraño residual en tejido blando</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M79.6) Dolor en miembro">(M79.6) Dolor en miembro</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M79.7) Fibromialgia">(M79.7) Fibromialgia</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M79.8) Otros trastornos especificados de los tejidos blandos">(M79.8) Otros trastornos especificados de los tejidos blandos</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M79.9) Trastorno de los tejidos blandos, no especificado">(M79.9) Trastorno de los tejidos blandos, no especificado</a>



<a name="bajar_8"></a>
<a class="identar_1" href="diagnostico_2.php?Diagnostico=Osteopatías y condropatías (M80-M94)">Osteopatías y condropatías (M80-M94)</a>
<a class="identar_2" href="diagnostico_2.php?Diagnostico=Desórdenes de la densidad y estructura óseas (M80-M85)">Desórdenes de la densidad y estructura óseas (M80-M85)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M80) Osteoporosis con fractura patológica.">(M80) Osteoporosis con fractura patológica.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M80.0) Osteoporosis postmenopáusica, con fractura patológica">(M80.0) Osteoporosis postmenopáusica, con fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M80.1) Osteoporosis postooforectomía, con fractura patológica">(M80.1) Osteoporosis postooforectomía, con fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M80.2) Osteoporosis por desuso, con fractura patológica">(M80.2) Osteoporosis por desuso, con fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M80.3) Osteoporosis por malabsorción postquirúrgica, con fractura patológica">(M80.3) Osteoporosis por malabsorción postquirúrgica, con fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M80.4) Osteoporosis inducida por drogas, con fractura patológica">(M80.4) Osteoporosis inducida por drogas, con fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M80.5) Osteoporosis idiopática, con fractura patológica">(M80.5) Osteoporosis idiopática, con fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M80.8) Otras osteoporosis, con fractura patológica">(M80.8) Otras osteoporosis, con fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M80.9) Osteoporosis no especificada, con fractura patológica">(M80.9) Osteoporosis no especificada, con fractura patológica</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M81) Osteoporosis sin fractura patológica.">(M81) Osteoporosis sin fractura patológica.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M81.0) Osteoporosis postmenopáusica, sin fractura patológica">(M81.0) Osteoporosis postmenopáusica, sin fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M81.1) Osteoporosis postooforectomía, sin fractura patológica">(M81.1) Osteoporosis postooforectomía, sin fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M81.2) Osteoporosis por desuso, sin fractura patológica">(M81.2) Osteoporosis por desuso, sin fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M81.3) Osteoporosis por malabsorción postquirúrgica, sin fractura patológica">(M81.3) Osteoporosis por malabsorción postquirúrgica, sin fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M81.4) Osteoporosis inducida por drogas, sin fractura patológica">(M81.4) Osteoporosis inducida por drogas, sin fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M81.5) Osteoporosis idiopática, sin fractura patológica">(M81.5) Osteoporosis idiopática, sin fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M81.6) Osteoporosis localizada [Lequesne], sin fractura patológica">(M81.6) Osteoporosis localizada [Lequesne], sin fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M81.8) Otras osteoporosis, sin fractura patológica">(M81.8) Otras osteoporosis, sin fractura patológica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M81.9) Osteoporosis no especificada, sin fractura patológica">(M81.9) Osteoporosis no especificada, sin fractura patológica</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M82) Osteoporosis en enfermedades clasificadas en otra parte.">(M82) Osteoporosis en enfermedades clasificadas en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M82.0) Osteoporosis en mielomatosis múltiple (C90.0+)">(M82.0) Osteoporosis en mielomatosis múltiple (C90.0+)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M82.1) Osteoporosis en trastornos endocrinos (E00-E34+)">(M82.1) Osteoporosis en trastornos endocrinos (E00-E34+)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M82.8) Osteoporosis en otras enfermedades clasificadas en otra parte">(M82.8) Osteoporosis en otras enfermedades clasificadas en otra parte</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M83) Osteomalacia del adulto.">(M83) Osteomalacia del adulto.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M83.0) Osteomalacia puerperal">(M83.0) Osteomalacia puerperal</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M83.1) Osteomalacia senil">(M83.1) Osteomalacia senil</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M83.2) Osteomalacia del adulto debida a malabsorción">(M83.2) Osteomalacia del adulto debida a malabsorción</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M83.3) Osteomalacia del adulto debida a desnutrición">(M83.3) Osteomalacia del adulto debida a desnutrición</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M83.4) Enfermedad de los huesos por aluminio">(M83.4) Enfermedad de los huesos por aluminio</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M83.5) Otras osteomalacias del adulto inducidas por drogas">(M83.5) Otras osteomalacias del adulto inducidas por drogas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M83.8) Otras osteomalacias del adulto">(M83.8) Otras osteomalacias del adulto</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M83.9) Osteomalacia del adulto, no especificada">(M83.9) Osteomalacia del adulto, no especificada</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M84) Trastornos de la continuidad del hueso.">(M84) Trastornos de la continuidad del hueso.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M84.0) Consolidación defectuosa de fractura">(M84.0) Consolidación defectuosa de fractura</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M84.1) Falta de consolidación de fractura [seudoartrosis]">(M84.1) Falta de consolidación de fractura [seudoartrosis]</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M84.2) Consolidación retardada de fractura">(M84.2) Consolidación retardada de fractura</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M84.3) Fractura por tensión, no clasificada en otra parte">(M84.3) Fractura por tensión, no clasificada en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M84.4) Fractura patológica, no clasificada en otra parte">(M84.4) Fractura patológica, no clasificada en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M84.8) Otros trastornos de la continuidad del hueso">(M84.8) Otros trastornos de la continuidad del hueso</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M84.9) Trastorno de la continuidad del hueso, no especificado">(M84.9) Trastorno de la continuidad del hueso, no especificado</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M85) Otros trastornos de la densidad y de la estructura óseas.">(M85) Otros trastornos de la densidad y de la estructura óseas.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M85.0) Displasia fibrosa (monostótica)">(M85.0) Displasia fibrosa (monostótica)</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M85.1) Fluorosis del esqueleto">(M85.1) Fluorosis del esqueleto</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M85.2) Hiperostosis del cráneo">(M85.2) Hiperostosis del cráneo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M85.3) Osteítis condensante">(M85.3) Osteítis condensante</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M85.4) Quiste óseo solitario">(M85.4) Quiste óseo solitario</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M85.5) Quiste óseo aneurismático">(M85.5) Quiste óseo aneurismático</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M85.6) Otros quistes óseos">(M85.6) Otros quistes óseos</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M85.8) Otros trastornos especificados de la densidad y de la estructura óseas">(M85.8) Otros trastornos especificados de la densidad y de la estructura óseas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M85.9) Trastorno de la densidad y de la estructura óseas, no especificado">(M85.9) Trastorno de la densidad y de la estructura óseas, no especificado</a>



<a class="identar_2" href="diagnostico_2.php?Diagnostico=Otras osteopatías (M86-M90)">Otras osteopatías (M86-M90)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M86) Osteomielitis.">(M86) Osteomielitis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M86.0) Osteomielitis hematógena aguda">(M86.0) Osteomielitis hematógena aguda</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M86.1) Otras osteomielitis agudas">(M86.1) Otras osteomielitis agudas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M86.2) Osteomielitis subaguda">(M86.2) Osteomielitis subaguda</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M86.3) Osteomielitis multifocal crónica">(M86.3) Osteomielitis multifocal crónica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M86.4) Osteomielitis crónica con drenaje del seno">(M86.4) Osteomielitis crónica con drenaje del seno</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M86.5) Otras osteomielitis hematógenas crónicas">(M86.5) Otras osteomielitis hematógenas crónicas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M86.6) Otras osteomielitis crónicas">(M86.6) Otras osteomielitis crónicas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M86.8) Otras osteomielitis">(M86.8) Otras osteomielitis</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M86.9) Osteomielitis, no especificada">(M86.9) Osteomielitis, no especificada</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M87) Osteonecrosis.">(M87) Osteonecrosis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M87.0) Necrosis aséptica idiopática ósea">(M87.0) Necrosis aséptica idiopática ósea</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M87.1) Osteonecrosis debida a drogas">(M87.1) Osteonecrosis debida a drogas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M87.2) Osteonecrosis debida a traumatismo previo">(M87.2) Osteonecrosis debida a traumatismo previo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M87.3) Otras osteonecrosis secundarias">(M87.3) Otras osteonecrosis secundarias</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M87.8) Otras osteonecrosis">(M87.8) Otras osteonecrosis</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M87.9) Osteonecrosis, no especificada">(M87.9) Osteonecrosis, no especificada</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M88) Enfermedad de Paget de los huesos (osteítis deformante).">(M88) Enfermedad de Paget de los huesos (osteítis deformante).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M88.0) Enfermedad de Paget del cráneo">(M88.0) Enfermedad de Paget del cráneo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M88.8) Enfermedad de Paget de otros huesos">(M88.8) Enfermedad de Paget de otros huesos</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M88.9) Enfermedad ósea de Paget, huesos no especificados">(M88.9) Enfermedad ósea de Paget, huesos no especificados</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M89) Otros trastornos del hueso.">(M89) Otros trastornos del hueso.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M89.0) Algoneurodistrofia">(M89.0) Algoneurodistrofia</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M89.1) Detención del crecimiento epifisario">(M89.1) Detención del crecimiento epifisario</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M89.2) Otros trastornos del desarrollo y crecimiento óseo">(M89.2) Otros trastornos del desarrollo y crecimiento óseo</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M89.3) Hipertrofia del hueso">(M89.3) Hipertrofia del hueso</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M89.4) Otras osteoartropatías hipertróficas">(M89.4) Otras osteoartropatías hipertróficas</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M89.5) Osteólisis">(M89.5) </a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M89.6) Osteopatía a consecuencia de poliomielitis">(M89.6) Osteopatía a consecuencia de poliomielitis</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M89.8) Otros trastornos especificados del hueso">(M89.8) Otros trastornos especificados del hueso</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M89.9) Trastorno del hueso, no especificado">(M89.9) Trastorno del hueso, no especificado</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M90) Osteopatías en enfermedades clasificadas en otra parte.">(M90) Osteopatías en enfermedades clasificadas en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M90.0) Tuberculosis ósea">(M90.0) Tuberculosis ósea</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M90.1) Periostitis en otras enfermedades infecciosas clasificadas en otra parte">(M90.1) Periostitis en otras enfermedades infecciosas clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M90.2) Osteopatía en otras enfermedades infecciosas clasificadas en otra parte">(M90.2) Osteopatía en otras enfermedades infecciosas clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M90.3) Osteonecrosis en la enfermedad causada por descompresión">(M90.3) Osteonecrosis en la enfermedad causada por descompresión</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M90.4) Osteonecrosis debida a hemoglobinopatía">(M90.4) Osteonecrosis debida a hemoglobinopatía</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M90.5) Osteonecrosis en otras enfermedades clasificadas en otra parte">(M90.5) Osteonecrosis en otras enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M90.6) Osteítis deformante en enfermedad neoplásica">(M90.6) Osteítis deformante en enfermedad neoplásica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M90.7) Fractura ósea en enfermedad neoplásica">(M90.7) Fractura ósea en enfermedad neoplásica</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M90.8) Osteopatía en otras enfermedades clasificadas en otra parte">(M90.8) Osteopatía en otras enfermedades clasificadas en otra parte</a>



<a name="bajar_9"></a>
<a class="identar_2" href="diagnostico_2.php?Diagnostico=Condropatías (M91-M94)">Condropatías (M91-M94)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M91) Osteocondrosis juvenil de la cadera y de la pelvis.">(M91) Osteocondrosis juvenil de la cadera y de la pelvis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M91.0) Osteocondrosis juvenil de la pelvis.">(M91.0) Osteocondrosis juvenil de la pelvis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M91.1) Osteocondrosis juvenil de la cabeza del fémur (Legg-Calvé-Perthes).">(M91.1) Osteocondrosis juvenil de la cabeza del fémur (Legg-Calvé-Perthes).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M91.2) Coxa plana.">(M91.2) Coxa plana.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M91.3) Pseudocoxalgia.">(M91.3) Pseudocoxalgia.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M91.8) Otras osteocondrosis juveniles de la cadera y de la pelvis.">(M91.8) Otras osteocondrosis juveniles de la cadera y de la pelvis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M91.9) Osteocondrosis juvenil de la cadera y de la pelvis, sin otra especificación .">(M91.9) Osteocondrosis juvenil de la cadera y de la pelvis, sin otra especificación .</a>



<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M92) Otras osteocondrosis juveniles.">(M92) Otras osteocondrosis juveniles.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M92.0) Osteocondrosis juvenil del húmero.">(M92.0) Osteocondrosis juvenil del húmero.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M92.1) Osteocondrosis juvenil del cúbito y del radio.">(M92.1) Osteocondrosis juvenil del cúbito y del radio.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M92.2) Osteocondrosis juvenil de la mano.">(M92.2) Osteocondrosis juvenil de la mano.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M92.3) Otras osteocondrosis juveniles del miembro superior.">(M92.3) Otras osteocondrosis juveniles del miembro superior.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M92.4) Osteocondrosis juvenil de la rótula.">(M92.4) Osteocondrosis juvenil de la rótula.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M92.5) Osteocondrosis juvenil de la tibia y del peroné.">(M92.5) Osteocondrosis juvenil de la tibia y del peroné.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M92.6) Osteocondrosis juvenil del tarso.">(M92.6) Osteocondrosis juvenil del tarso.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M92.7) Osteocondrosis juvenil del metatarso.">(M92.7) Osteocondrosis juvenil del metatarso.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M92.8) Otras osteocondrosis juveniles especificadas.">(M92.8) Otras osteocondrosis juveniles especificadas.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M92.9) Osteocondrosis juvenil, no especificada .">(M92.9) Osteocondrosis juvenil, no especificada .</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M93) Otras osteocondropatías.">(M93) Otras osteocondropatías.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M93.0) Deslizamiento de la epífisis femoral superior (no traumático).">(M93.0) Deslizamiento de la epífisis femoral superior (no traumático).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M93.1) Enfermedad de Kienböck del adulto.">(M93.1) Enfermedad de Kienböck del adulto.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M93.2) Osteocondritis disecante.">(M93.2) Osteocondritis disecante.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M93.8) Otras osteocondropatías especificadas.">(M93.8) Otras osteocondropatías especificadas.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M93.9) Osteocondropatía, no especificada.">(M93.9) Osteocondropatía, no especificada.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M94) Otros trastornos del cartílago.">(M94) Otros trastornos del cartílago.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M94.0) Costocondritis (síndrome de Tietze).">(M94.0) Costocondritis (síndrome de Tietze).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M94.1) Policondritis recidivante.">(M94.1) Policondritis recidivante.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M94.2) Condromalacia.">(M94.2) Condromalacia.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M94.3) Condrólisis.">(M94.3) Condrólisis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M94.8) Otros trastornos especificados del cartílago.">(M94.8) Otros trastornos especificados del cartílago.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M94.9) Trastorno del cartílago, no especificado.">(M94.9) Trastorno del cartílago, no especificado.</a>



<a name="bajar_10"></a>
<a class="identar_1" style="margin-bottom: 1%;" href="diagnostico_2.php?Diagnostico=Otros trastornos del sistema musculoesquelético y el tejido conectivo (M95-M99)">Otros trastornos del sistema musculoesquelético y el tejido conectivo (M95-M99)</a>
<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M95) Otras deformidades adquiridas del sistema osteomuscular y del tejido conjuntivo.">(M95) Otras deformidades adquiridas del sistema osteomuscular y del tejido conjuntivo.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M95.0) Deformidad adquirida de la nariz.">(M95.0) Deformidad adquirida de la nariz.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M95.1) Oreja en coliflor.">(M95.1) Oreja en coliflor.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M95.2) Otras deformidades adquiridas de la cabeza.">(M95.2) Otras deformidades adquiridas de la cabeza.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M95.3) Deformidad adquirida del cuello.">(M95.3) Deformidad adquirida del cuello.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M95.4) Deformidad adquirida de costillas y tórax.">(M95.4) Deformidad adquirida de costillas y tórax.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M95.5) Deformidad adquirida de la pelvis.">(M95.5) Deformidad adquirida de la pelvis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M95.8) Otras deformidades adquiridas especificadas del sistema osteomuscular.">(M95.8) Otras deformidades adquiridas especificadas del sistema osteomuscular.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M95.9) Deformidad adquirida del sistema osteomuscular, no especificada.">(M95.9) Deformidad adquirida del sistema osteomuscular, no especificada.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M96) Trastornos osteomusculares secundarios a procedimientos terapéuticos, no clasificados en otra parte.">(M96) Trastornos osteomusculares secundarios a procedimientos terapéuticos, no clasificados en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M96.0) Pseudoartrosis secundaria a fusión o artrodesis.">(M96.0) Pseudoartrosis secundaria a fusión o artrodesis.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M96.1) Síndrome postlaminectomía, no clasificado en otra parte.">(M96.1) Síndrome postlaminectomía, no clasificado en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M96.2) Cifosis postradiación.">(M96.2) Cifosis postradiación.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M96.3) Cifosis postlaminectomía.">(M96.3) Cifosis postlaminectomía.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M96.4) Lordosis postquirúrgica.">(M96.4) Lordosis postquirúrgica.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M96.5) Escoliosis postradiación.">(M96.5) Escoliosis postradiación.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M96.6) Fractura de hueso secundaria a inserción o implante ortopédico, prótesis articular o placa ósea.">(M96.6) Fractura de hueso secundaria a inserción o implante ortopédico, prótesis articular o placa ósea.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M96.8) Otros trastornos osteomusculares secundarios a procedimientos terapéuticos.">(M96.8) Otros trastornos osteomusculares secundarios a procedimientos terapéuticos.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M96.9) Trastornos osteomusculares no especificados secundarios a procedimientos.">(M96.9) Trastornos osteomusculares no especificados secundarios a procedimientos.</a>




<a class="identar_3" href="diagnostico_2.php?Diagnostico=(M99) Lesiones biomecánicas, no clasificadas en otra parte.">(M99) Lesiones biomecánicas, no clasificadas en otra parte.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M99.0) Disfunción segmental o somática.">(M99.0) Disfunción segmental o somática.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M99.1) Complejo de subluxación (vertebral).">(M99.1) Complejo de subluxación (vertebral).</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M99.2) Subluxación con estenosis del canal neural.">(M99.2) Subluxación con estenosis del canal neural.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M99.3) Estenosis ósea del canal neural.">(M99.3) Estenosis ósea del canal neural.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M99.4) Estenosis del canal neural por tejido conjuntivo.">(M99.4) Estenosis del canal neural por tejido conjuntivo.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M99.5) Estenosis del canal neural por disco intervertebral.">(M99.5) Estenosis del canal neural por disco intervertebral.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M99.6) Estenosis ósea y subluxación de los agujeros intervertebrales.">(M99.6) Estenosis ósea y subluxación de los agujeros intervertebrales.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M99.7) Estenosis de los agujeros intervertebrales por tejido conjuntivo o por disco intervertebral.">(M99.7) Estenosis de los agujeros intervertebrales por tejido conjuntivo o por disco intervertebral.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M99.8) Otras lesiones biomecánicas.">(M99.8) Otras lesiones biomecánicas.</a>
<a class="identar_4" href="diagnostico_2.php?Diagnostico=(M99.9) Lesión biomecánica, no especificada.">(M99.9) Lesión biomecánica, no especificada.</a>








