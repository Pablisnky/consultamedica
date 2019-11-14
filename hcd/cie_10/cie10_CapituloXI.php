<?php
//Agrega un nuevo documento a la historia medica de un paciente
    session_start(); 

    include("../../conexion/Conexion_BD.php");//conexion a BD
    
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
  	</head>     
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
	<body>
		<?php
			include("../../vista/headerCIE_10.php");
		?>

<link rel="stylesheet" type="text/css" href="../../css/EstilosCitasMedicas.css"/> 
<h1 style="cursor: default;">ConsultaMedica.com.co</h1>
<h3>CIE_10   Capitulo XI</h3>
<p style="text-align: center;">Clasificación Internacional de Enfermedades</p>
<p class="Inicio_1">Capítulo XI: Enfermedades del aparato digestivo.</p>
<br>
<br>
<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<a class="identar_5" style="margin-top: 2%;" href="#marcador_01">(K00-K14) Enfermedades de la cavidad oral, las glándulas salivales,mandibula y maxilar</a>
	<a class="identar_5" href="#marcador_02">(K20-K31) Enfermedades del esófago, estómago y del duodeno</a>
	<a class="identar_5" href="#marcador_03">(K40-K46) Hernias abdominales</a>
	<a class="identar_5" href="#marcador_04">(K50-K52) Enteritis y colitis no infecciosas</a>
	<a class="identar_5" href="#marcador_05">(K55-K63) Otras enfermedades de los intestinos</a>
	<a class="identar_5" href="#marcador_06">(K65-K67) Enfermedades del peritoneo</a>
	<a class="identar_5" href="#marcador_07">(K70-K77) Enfermedades del hígado</a>
	<a class="identar_5" href="#marcador_08">(K80-K87) Trastornos de la vesícula biliar, del tracto biliar y del páncreas</a>
	<a class="identar_5" style="margin-bottom: 10%;" href="#marcador_09">(K90-K93) Otras enfermedades del sistema digestivo</a>

<script type="text/javascript">
	function valores(f, cual){//Esta funcion se encarga de almacenar en un array todos los medicamentos seleccionados es llamada al precionar el boton cargar de este archivo
        todos= new Array(); 
        for(var i = 0, total = f[cual].length; i < total; i++)
        if (f[cual][i].checked) todos[todos.length] = f[cual][i].value;
            window.opener.document.getElementById("Diagnostico").innerHTML = todos.join("\n" + "\n" ); 
        
           this.window.close();
    }

    function cerrar(){
    	window.close();
    }
</script>

<div style="padding-bottom: 5%;">
<form>
<a id="marcador_01" class="ancla"></a>
	<label class="identar_2" style="margin-top: 6%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(K00-K14) Enfermedades de la cavidad oral, las glándulas salivales,mandibula y maxilar.">(K00-K14) Enfermedades de la cavidad oral, las glándulas salivales,mandibula y maxilar.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K00) Trastornos del desarrollo y erupciones de los dientes">(K00) Trastornos del desarrollo y erupciones de los dientes</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K00.0) Anodontia.">(K00.0) Anodontia.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K00.1) Hiperodontia.">(K00.1) Hiperodontia.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K00.2) Anormalidades de tamaño y forma de los dientes.">(K00.2) Anormalidades de tamaño y forma de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K00.4) Trastornos en la formación de los dientes.">(K00.4) Trastornos en la formación de los dientes</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K00.5) Trastornos hereditarios en la estructura de los dientes, no clasificados en otra parte.">(K00.5) Trastornos hereditarios en la estructura de los dientes, no clasificados en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K00.6) Trastornos en la erupción de los dientes.">(K00.6) Trastornos en la erupción de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K00.7) Síndrome de la dentición">(K00.7) Síndrome de la dentición</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K00.8) Otros trastornos del desarrollo de los dientes.">(K00.8) Otros trastornos del desarrollo de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K00.9) Trastorno del desarrollo de los dientes sin especificar.">(K00.9) Trastorno del desarrollo de los dientes sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K01) Dientes embebidos e impactados.">(K01) Dientes embebidos e impactados.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K01.0) Dientes embebidos.">(K01.0) Dientes embebidos.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K01.1) Dientes impactados.">(K01.1) Dientes impactados.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K02) Caries.">(K02) Caries.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K02.0) Caries limitada al esmalte.">(K02.0) Caries limitada al esmalte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K02.1) Caries de la dentina.">(K02.1) Caries de la dentina.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K02.2) Caries del cemento.">(K02.2) Caries del cemento.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K02.3) Caries arrestada.">(K02.3) Caries arrestada.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K02.4) Odontoclasia.">(K02.4) Odontoclasia.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K02.8) Otras caries.">(K02.8) Otras caries.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K02.9) Caries sin especificar.">(K02.9) Caries sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K03) Otras enfermedades de los tejidos duros de los dientes.">(K03) Otras enfermedades de los tejidos duros de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K03.0) Atrición excesiva de los dientes">(K03.0) Atrición excesiva de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K03.1) Abrasion de los dientes">(K03.1) Abrasion de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K03.2) Erosión de los dientes">(K03.2) Erosión de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K03.3) Resorción patológica de los dientes">(K03.3) Resorción patológica de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K03.4) Hipercementosis">(K03.4) Hipercementosis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K03.5) Anquilosis de los dientes">(K03.5) Anquilosis de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K03.6) Depósitos (acreciones) de los dientes">(K03.6) Depósitos (acreciones) de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K03.7) Cambios de color posteruptivos de los tejidos duros dentales">(K03.7) Cambios de color posteruptivos de los tejidos duros dentales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K03.8) Otras enfermedades especificadas de los tejidos duros de los dientes">(K03.8) Otras enfermedades especificadas de los tejidos duros de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K03.9) Enfermedad de los tejidos duros de los dientes sin especificar">(K03.9) Enfermedad de los tejidos duros de los dientes sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K04) Enfermedades de la pulpa dentaria y los tejidos periapicales.">(K04) Enfermedades de la pulpa dentaria y los tejidos periapicales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K04.0) Pulpitis">(K04.0) Pulpitis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K04.1) Necrosis de la pulpa dentaria">(K04.1) Necrosis de la pulpa dentaria.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K04.2) Degeneración de la pulpa dentaria">(K04.2) Degeneración de la pulpa dentaria.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K04.3) Formación anormal de los tejidos duros de la pulpa dentaria">(K04.3) Formación anormal de los tejidos duros de la pulpa dentaria.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K04.4) Periodontitis apical aguda de la pulpa dentaria">(K04.4) Periodontitis apical aguda de la pulpa dentaria.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K04.5) Periodontitis apical crónica">(K04.5) Periodontitis apical crónica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K04.6) Absceso periapical con senos">(K04.6) Absceso periapical con senos.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K04.7) Absceso periapical sin senos">(K04.7) Absceso periapical sin senos.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K04.8) Quiste radicular">(K04.8) Quiste radicular.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K04.9) Otras enfermedades de la pulpa dentaria y los tejidos periapicales y enfermedades sin especificar">(K04.9) Otras enfermedades de la pulpa dentaria y los tejidos periapicales y enfermedades sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K05) Gingivitis y enfermedades periodontales.">(K05) Gingivitis y enfermedades periodontales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K05.0) Gingivitis aguda.">(K05.0) Gingivitis aguda.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K05.1) Gingivitis crónica.">(K05.1) Gingivitis crónica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K05.2) Periodontitis aguda.">(K05.2) Periodontitis aguda.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K05.3) Periodontitis crónica.">(K05.3) Periodontitis crónica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K05.4) Periodontosis.">(K05.4) Periodontosis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K05.5) Otras enfermedades periodontales.">(K05.5) Otras enfermedades periodontales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K05.6) Enfermedad periodontal sin especificar.">(K05.6) Enfermedad periodontal sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K06) Otros trastornos de la gingiva y de la cresta alveolar edentulosa.">(K06) Otros trastornos de la gingiva y de la cresta alveolar edentulosa.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K06.0) Recesión gingival.">(K06.0) Recesión gingival.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K06.1) Alargamiento gingival.">(K06.1) Alargamiento gingival.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K06.2) Lesiones gingivales y de la cresta alveolar edentulosa asociadas con traumas.">(K06.2) Lesiones gingivales y de la cresta alveolar edentulosa asociadas con traumas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K06.8) Otros trastornos gingivales y de la cresta alveolar edentulosa especificados.">(K06.8) Otros trastornos gingivales y de la cresta alveolar edentulosa especificados.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K06.9) Trastorno gingival y de la cresta alveolar edentulosa sin especificar.">(K06.9) Trastorno gingival y de la cresta alveolar edentulosa sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K07) Anomalías dentofaciales (incluyendo maloclusión).">(K07) Anomalías dentofaciales (incluyendo maloclusión).</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K07.0) Anomalías mayores del tamaño de la mandíbula.">(K07.0) Anomalías mayores del tamaño de la mandíbula.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K07.1) Anomalías de la relación mandíbula-base del cráneo.">(K07.1) Anomalías de la relación mandíbula-base del cráneo.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K07.2) Anomalías de la relación del arco dental.">(K07.2) Anomalías de la relación del arco dental.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K07.3) Anomalías de la posición de los dientes.">(K07.3) Anomalías de la posición de los dientes.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K07.4) Maloclusión sin especificar.">(K07.4) Maloclusión sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K07.5) Anormalidades funcionales dentofaciales.">(K07.5) Anormalidades funcionales dentofaciales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K07.6) Trastornos de la unión temporomandibular.">(K07.6) Trastornos de la unión temporomandibular.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K07.8) Otras anomalías dentofaciales.">(K07.8) Otras anomalías dentofaciales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K07.9) Anomalía dentofacial sin especificar.">(K07.9) Anomalía dentofacial sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K08) Otros trastornos de los dientes y las estructuras de soporte.">(K08) Otros trastornos de los dientes y las estructuras de soporte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K08.0) Exfoliación de los dientes debida a causas sistémicas.">(K08.0) Exfoliación de los dientes debida a causas sistémicas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K08.1) Pérdida de los dientes debido a un accidente, extracción o enfermedad periodontal local.">(K08.1) Pérdida de los dientes debido a un accidente, extracción o enfermedad periodontal local.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K08.2) Atrofia de la cresta alveolar edentulosa.">(K08.2) Atrofia de la cresta alveolar edentulosa.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K08.3) Raíz dental retenida.">(K08.3) Raíz dental retenida.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K08.8) Otros trastornos especificados de dientes y estructuras de soporte.">(K08.8) Otros trastornos especificados de dientes y estructuras de soporte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K08.9) Trastorno especificado de dientes y estructuras de soporte sin especificar.">(K08.9) Trastorno especificado de dientes y estructuras de soporte sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K09) Quistes de la región oral, no clasificados en otra parte.">(K09) Quistes de la región oral, no clasificados en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K09.0) Quiste odontogánico de desarrollo.">(K09.0) Quiste odontogánico de desarrollo.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K09.1) Quistes de desarrollo (no-odontogénicos) de la región oral.">(K09.1) Quistes de desarrollo (no-odontogénicos) de la región oral.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K09.2) Otros quistes de la mandíbula.">(K09.2) Otros quistes de la mandíbula.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K09.8) Otros quistes de la región oral, no clasificados en otra parte.">(K09.8) Otros quistes de la región oral, no clasificados en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K09.9) Quiste de la región oral sin especificar.">(K09.9) Quiste de la región oral sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K10) Otras enfermedades de las mandíbulas.">(K10) Otras enfermedades de las mandíbulas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K10.0) Trastornos de desarrollo de las mandíbulas.">(K10.0) Trastornos de desarrollo de las mandíbulas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K10.1) Granuloma celular gigante, central.">(K10.1) Granuloma celular gigante, central.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K10.2) Condiciones inflamatorias de las mandíbulas.">(K10.2) Condiciones inflamatorias de las mandíbulas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K10.3) Alveolitis de las mandíbulas.">(K10.3) Alveolitis de las mandíbulas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K10.8) Otras enfermedades de las mandíbulas especificadas.">(K10.8) Otras enfermedades de las mandíbulas especificadas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K10.9) Enfermedad de las mandíbulas, sin especificar.">(K10.9) Enfermedad de las mandíbulas, sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K11) Enfermedades de las glándulas salivales.">(K11) Enfermedades de las glándulas salivales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K11.0) Atrofia de las glándulas salivales.">(K11.0) Atrofia de las glándulas salivales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K11.1) Hipertrofia de las glándulas salivales.">(K11.1) Hipertrofia de las glándulas salivales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K11.2) Sialadenitis.">(K11.2) Sialadenitis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K11.3) Abceso de las glándulas salivales.">(K11.3) Abceso de las glándulas salivales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K11.4) Fístula de las glándulas salivales.">(K11.4) Fístula de las glándulas salivales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K11.5) Sialolitiasis.">(K11.5) Sialolitiasis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K11.6) Mucocele de las glándulas salivales.">(K11.6) Mucocele de las glándulas salivales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K11.7) Trastornos de la secreción salival.">(K11.7) Trastornos de la secreción salival.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K11.8) Otras enfermedades de las glándulas salivales.">(K11.8) Otras enfermedades de las glándulas salivales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K11.9) Enfermedad de las glándulas salivales sin especificar.">(K11.9) Enfermedad de las glándulas salivales sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K12) Estomatitis y lesiones relacionadas.">(K12) Estomatitis y lesiones relacionadas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K12.0) Afta oral recurrente.">(K12.0) Afta oral recurrente.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K12.1) Otras formas de estomatitis.">(K12.1) Otras formas de estomatitis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K12.2) Celulitis y abceso bucal.">(K12.2) Celulitis y abceso bucal.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K13) Otros trastornos de los labios y la mucosa oral.">(K13) Otros trastornos de los labios y la mucosa oral.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K13.0) Enfermedades de los labios.">(K13.0) Enfermedades de los labios.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K13.1) Picadure en la mejilla y los labios.">(K13.1) Picadure en la mejilla y los labios.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K13.2) Leucoplaquia y otros trastornos del epitelio oral, incluyendo la lengua.">(K13.2) Leucoplaquia y otros trastornos del epitelio oral, incluyendo la lengua.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K13.3) Leucoplaquia capilar.">(K13.3) Leucoplaquia capilar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K13.4) Granuloma y lesiones de tipo granulómico de la mucosa oral.">(K13.4) Granuloma y lesiones de tipo granulómico de la mucosa oral.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K13.5) Fibrosis oral submucosa.">(K13.5) Fibrosis oral submucosa.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K13.6) Hiperplasia irritaqtiva de la mucosa oral.">(K13.6) Hiperplasia irritaqtiva de la mucosa oral.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K13.7) Otras lesiones y lesiones sin especificar de la mucosa oral.">(K13.7) Otras lesiones y lesiones sin especificar de la mucosa oral.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K14) Enfermedades de la lengua.">(K14) Enfermedades de la lengua.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K14.0) Glositis.">(K14.0) Glositis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K14.1) Lengua geográfica.">(K14.1) Lengua geográfica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K14.2) Glositis romboidea mediana.">(K14.2) Glositis romboidea mediana.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K14.3) Hipertrofia de las papilas gustativas.">(K14.3) Hipertrofia de las papilas gustativas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K14.4) Atrofia de las papilas gustativas.">(K14.4) Atrofia de las papilas gustativas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K14.5) Lengua plicada.">(K14.5) Lengua plicada.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K14.6) Glosodinia.">(K14.6) Glosodinia.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K14.8) Otras enfermedades de la lengua.">(K14.8) Otras enfermedades de la lengua.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K14.9) Enfermedad de la lengua sin especificar.">(K14.9) Enfermedad de la lengua sin especificar.</label>
















<a id="marcador_02" class="ancla"></a>
	<label class="identar_2" style="margin-top: 6%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(K20-K31) Enfermedades del esófago, estómago y del duodeno.">(K20-K31) Enfermedades del esófago, estómago y del duodeno.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K20) Esofagitis.">(K20) Esofagitis.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K21) Enfermedad del reflujo gastroesofagial.">(K21) Enfermedad del reflujo gastroesofagial.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K22) Otras enfermedades del esófago.">(K22) Otras enfermedades del esófago.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K22.0) Achalasia del cardias.">(K22.0) Achalasia del cardias.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K22.1) Úlcera de esófago.">(K22.1) Úlcera de esófago.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K22.2) Obstrucción esofagial.">(K22.2) Obstrucción esofagial.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K22.3) Perforación del esófago.">(K22.3) Perforación del esófago.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K22.4) Discinesia de esófago.">(K22.4) Discinesia de esófago.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K22.5) Divertículo de esófago adquirido.">(K22.5) Divertículo de esófago adquirido.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K22.6) Síndrome de laceratión-hemorragia gastro-esofagial.">(K22.6) Síndrome de laceratión-hemorragia gastro-esofagial.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K22.7) Esófago de Barrett.">(K22.7) Esófago de Barrett.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K22.8) Otras enfermedades del esófago especificadas.">(K22.8) Otras enfermedades del esófago especificadas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K22.9) Enfermedad del esófago sin especificar.">(K22.9) Enfermedad del esófago sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K23) Trastornos del esófago en enfermedades clasificadas en otra parte.">(K23) Trastornos del esófago en enfermedades clasificadas en otra parte.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K25) Úlcera gástrica.">(K25) Úlcera gástrica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K25.5) Úlcera gástrica con perforación.">(K25.5) Úlcera gástrica con perforación.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K26) Úlcera duodenal.">(K26) Úlcera duodenal.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K27) Úlcera péptica, sitio sin especificar.">(K27) Úlcera péptica, sitio sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K28) Úlcera gastrojejunal.">(K28) Úlcera gastrojejunal.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K29) Gastritis y duodenitis.">(K29) Gastritis y duodenitis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4" name="diagnostico[]" value="(K29.7) Gastritis (simple).">(K29.7) Gastritis (simple).</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K30) Dispepsia.">(K30) Dispepsia.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K31) Otras enfermedades del estómago y del duodeno.">(K31) Otras enfermedades del estómago y del duodeno.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K31.0) Dilatación aguda del estómago.">(K31.0) Dilatación aguda del estómago.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K31.1) Estenosis pilórica hipertrófica adulta.">(K31.1) Estenosis pilórica hipertrófica adulta.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K31.2) Constricción de reloj de arena y estenosis estomacal.">(K31.2) Constricción de reloj de arena y estenosis estomacal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K31.3) Pilorospasmo, no clasificado en otra parte.">(K31.3) Pilorospasmo, no clasificado en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K31.4) Divertículo gástrico.">(K31.4) Divertículo gástrico.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K31.5) Obstrucción del duodeno.">(K31.5) Obstrucción del duodeno.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K31.6) Fístula del estómago y del duodeno.">(K31.6) Fístula del estómago y del duodeno.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K31.7) Pólipo del estómago y del duodeno.">(K31.7) Pólipo del estómago y del duodeno.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K31.8) Otras enfermedades especificadas del estómago y del duodeno.">(K31.8) Otras enfermedades especificadas del estómago y del duodeno.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K31.9) Enfermedad sin especificar del estómago y del duodeno.">(K31.9) Enfermedad sin especificar del estómago y del duodeno.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K35) Apendicitis aguda.">(K35) Apendicitis aguda.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K35.0) Apendicitis aguda con peritonitis generalizada.">(K35.0) Apendicitis aguda con peritonitis generalizada.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K35.1) Apendicitis aguda con absceso peritoneal.">(K35.1) Apendicitis aguda con absceso peritoneal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K35.9) Apendicitis aguda sin especificar.">(K35.9) Apendicitis aguda sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K36) Otras apendicitis.">(K36) Otras apendicitis.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K37) Apendicitis sin especificar.">(K37) Apendicitis sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K38) Otras enfermedades del apéndice.">(K38) Otras enfermedades del apéndice.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K38.0) Hiperplasia of apéndice.">(K38.0) Hiperplasia of apéndice.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K38.1) Constricciones apendiculares.">(K38.1) Constricciones apendiculares.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K38.2) Divertículo de apéndice.">(K38.2) Divertículo de apéndice.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K38.3) Fístula de apéndice.">(K38.3) Fístula de apéndice.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K38.8) Otras enfermedades especificadas del apéndice.">(K38.8) Otras enfermedades especificadas del apéndice.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K38.9) Enfermedad del apéndice sin especificar.">(K38.9) Enfermedad del apéndice sin especificar.</label>






















<a id="marcador_03" class="ancla"></a>
	<label class="identar_2" style="margin-top: 6%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(K40-K46) Hernias abdominales.">(K40-K46) Hernias abdominales.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K40) Hernia inguinal.">(K40) Hernia inguinal.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K41) Hernia femoral.">(K41) Hernia femoral.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K42) Hernia umbilical.">(K42) Hernia umbilical.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K43) Hernia ventral.">(K43) Hernia ventral.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K44) Hernia diafrágmica.">(K44) Hernia diafrágmica.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K45) Otras hernias abdominales.">(K45) Otras hernias abdominales.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K46) Hernia abdominal sin especificar.">(K46) Hernia abdominal sin especificar.</label>























<a id="marcador_04" class="ancla"></a>
	<label class="identar_2" style="margin-top: 6%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(K50-K52) Enteritis y colitis no infecciosas">(K50-K52) Enteritis y colitis no infecciosas.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K50) Enfermedad de Crohn (enteritis regional).">(K50) Enfermedad de Crohn (enteritis regional).</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K51) Colitis ulcerosa.">(K51) Colitis ulcerosa.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K52) Otras gastroenteritis y colitis no infecciosas.">(K52) Otras gastroenteritis y colitis no infecciosas.</label>









<a id="marcador_05" class="ancla"></a>
	<label class="identar_2" style="margin-top: 6%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(K55-K63) Otras enfermedades de los intestinos">(K55-K63) Otras enfermedades de los intestinos</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K55) Trastornos vasculares del intestino.">(K55) Trastornos vasculares del intestino.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K56) Íleo paralítico y obstrucción intestinal sin hernia.">(K56) Íleo paralítico y obstrucción intestinal sin hernia.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K56.0) Íleo paralítico.">(K56.0) Íleo paralítico.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K56.1) Intususcepción.">(K56.1) Intususcepción.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K56.2) Volvulus.">(K56.2) Volvulus.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K56.3) Cálculo biliar del íleo.">(K56.3) Cálculo biliar del íleo.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K56.4) Otras impacciones del intestineo.">(K56.4) Otras impacciones del intestineo.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K56.5) Adhesiones intestinales (bandas) con obstrucción.">(K56.5) Adhesiones intestinales (bandas) con obstrucción.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K56.6) Otras obstrucciones intestinales y obstrucciones sin especificar.">(K56.6) Otras obstrucciones intestinales y obstrucciones sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K56.7) Íleo sin especificar.">(K56.7) Íleo sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K57) Enfermedad diverticular del intestino.">(K57) Enfermedad diverticular del intestino.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K57.0) Enfermedad diverticular del intestino delgado con perforación y abceso.">(K57.0) Enfermedad diverticular del intestino delgado con perforación y abceso.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K57.1) Enfermedad diverticular del intestino delgado sin perforación y abceso.">(K57.1) Enfermedad diverticular del intestino delgado sin perforación y abceso.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K57.2) Enfermedad diverticular del intestino grueso con perforación y abceso.">(K57.2) Enfermedad diverticular del intestino grueso con perforación y abceso.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K57.3) Enfermedad diverticular del intestino grueso sin perforación y abceso.">(K57.3) Enfermedad diverticular del intestino grueso sin perforación y abceso.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K57.4) Enfermedad diverticular del intestino delgado y del intestino grueso con perforación y abceso.">(K57.4) Enfermedad diverticular del intestino delgado y del intestino grueso con perforación y abceso.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K57.5) Enfermedad diverticular del intestino delgado y del intestino grueso sin perforación y abceso.">(K57.5) Enfermedad diverticular del intestino delgado y del intestino grueso sin perforación y abceso.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K57.8) Enfermedad diverticular del intestino, parte sin especificar, con perforación y abceso.">(K57.8) Enfermedad diverticular del intestino, parte sin especificar, con perforación y abceso.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K57.9) Enfermedad diverticular del intestino, parte sin especificar, sin perforación y abceso.">(K57.9) Enfermedad diverticular del intestino, parte sin especificar, sin perforación y abceso.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K58) Síndrome del intestino irritable.">(K58) Síndrome del intestino irritable.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K59) Otros trastornos intestinales funcionales.">(K59) Otros trastornos intestinales funcionales.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K59.0) Estreñimiento.">(K59.0) Estreñimiento.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K59.1) Diarrea funcional.">(K59.1) Diarrea funcional.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K59.2) Intestino neurogénico, no clasificado en otra parte.">(K59.2) Intestino neurogénico, no clasificado en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K59.3) Megacolon, no clasificado en otra parte.">(K59.3) Megacolon, no clasificado en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K59.4) Espasmo anal.">(K59.4) Espasmo anal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K59.8) Otros trastornos intestinales funcionales especificados.">(K59.8) Otros trastornos intestinales funcionales especificados.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K59.9) Trastorno intestinal funcional sin especificar.">(K59.9) Trastorno intestinal funcional sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K60) Fisura y fístula de las regiones anal y rectal.">(K60) Fisura y fístula de las regiones anal y rectal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K60.0) Fisura anal aguda.">(K60.0) Fisura anal aguda.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K60.1) Fisura anal crónica.">(K60.1) Fisura anal crónica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K60.2) Fisura anal sin especificar.">(K60.2) Fisura anal sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K60.3) Fístula anal.">(K60.3) Fístula anal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K60.4) Fístula rectal.">(K60.4) Fístula rectal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K60.5) Fístula anorectal.">(K60.5) Fístula anorectal.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K61) Abceso de las regines anal y rectal.">(K61) Abceso de las regines anal y rectal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K61.0) Abceso anal.">(K61.0) Abceso anal.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K62) Otras enfermedades del ano y del recto.">(K62) Otras enfermedades del ano y del recto.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K62.2) Prolapso anal.">(K62.2) Prolapso anal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K62.3) Prolapso rectal.">(K62.3) Prolapso rectal.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K63) Otras enfermedades del intestino.">(K63) Otras enfermedades del intestino.</label>



























<a id="marcador_06" class="ancla"></a>
	<label class="identar_2" style="margin-top: 6%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(K65-K67) Enfermedades del peritoneo">(K65-K67) Enfermedades del peritoneo.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K65) Peritonitis causada por apendicitis.">(K65) Peritonitis causada por apendicitis.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K66) Otros trastornos del peritoneo.">(K66) Otros trastornos del peritoneo.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K67) Trastornos del peritoneo en enfermedades infecciosas clasificadas en otra parte.">(K67) Trastornos del peritoneo en enfermedades infecciosas clasificadas en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K66.1) Hemoperitoneo.">(K66.1) Hemoperitoneo.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K66.2) Ascitis por enfermedad benigna.">(K66.2) Ascitis por enfermedad benigna.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K66.3) Ascitis por enfermedad maligna.">(K66.3) Ascitis por enfermedad maligna.</label>


























<a id="marcador_07" class="ancla"></a>
	<label class="identar_2" style="margin-top: 6%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(K70-K77) Enfermedades del hígado.">(K70-K77) Enfermedades del hígado.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K70) Enfermedad del hígado alcohólica.">(K70) Enfermedad del hígado alcohólica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K70.0) Hígado graso.">(K70.0) Hígado graso.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K70.1) Hepatitis alcohólica.">(K70.1) Hepatitis alcohólica.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K70.2) Fibrosis y esclerosis alcohólica del hígado.">(K70.2) Fibrosis y esclerosis alcohólica del hígado.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K70.3) Cirrosis alcohólica del hígado.">(K70.3) Cirrosis alcohólica del hígado.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K70.4) Fallo hepático alcohólico.">(K70.4) Fallo hepático alcohólico.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K70.9) Enfermedad hepática alcohólica sin especificar.">(K70.9) Enfermedad hepática alcohólica sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K71) Enfermedad tóxica de hígado.">(K71) Enfermedad tóxica de hígado.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K71.0) Enfermedad tóxica de hígado con colestasia.">(K71.0) Enfermedad tóxica de hígado con colestasia.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K71.1) Enfermedad tóxica de hígado con necrosis hepática.">(K71.1) Enfermedad tóxica de hígado con necrosis hepática.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K71.2) Enfermedad tóxica de hígado con hepatitis aguda.">(K71.2) Enfermedad tóxica de hígado con hepatitis aguda.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K71.3) Enfermedad tóxica de hígado con hepatitis crónica persistente.">(K71.3) Enfermedad tóxica de hígado con hepatitis crónica persistente.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K71.4) Enfermedad tóxica de hígado con hepatitis crónica lobular.">(K71.4) Enfermedad tóxica de hígado con hepatitis crónica lobular.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K71.5) Enfermedad tóxica de hígado con hepatitis crónica activa.">(K71.5) Enfermedad tóxica de hígado con hepatitis crónica activa.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K71.6) Enfermedad tóxica de hígado con hepatitis, no clasificada en otra parte.">(K71.6) Enfermedad tóxica de hígado con hepatitis, no clasificada en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K71.7) Enfermedad tóxica de hígado con fibrosis y cirrosis de hígado.">(K71.7) Enfermedad tóxica de hígado con fibrosis y cirrosis de hígado.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K71.8) Enfermedad tóxica de hígado con otros trastornos del hígado.">(K71.8) Enfermedad tóxica de hígado con otros trastornos del hígado.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K71.9) Enfermedad tóxica de hígado sin especificar.">(K71.9) Enfermedad tóxica de hígado sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K72) Fallo hepático, no clasificado en otra parte.">(K72) Fallo hepático, no clasificado en otra parte.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K73) Hepatitis crónica, no clasificada en otra parte.">(K73) Hepatitis crónica, no clasificada en otra parte.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K74) Fibrosis y cirrosis del hígado.">(K74) Fibrosis y cirrosis del hígado.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K74.0) Fibrosis hepática.">(K74.0) Fibrosis hepática.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K74.1) Esclerosis hepática.">(K74.1) Esclerosis hepática.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K74.2) Fibrosis hepática con Esclerosis hepática.">(K74.2) Fibrosis hepática con Esclerosis hepática.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K74.3) Cirrosis biliar primaria.2>(K74.3) Cirrosis biliar primaria.">(K74.3) Cirrosis biliar primaria.2</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K74.4) Cirrosis biliar secundaria.">(K74.4) Cirrosis biliar secundaria.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K74.5) Cirrosis biliar sin especificar.">(K74.5) Cirrosis biliar sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K74.6) Otras cirrosis hepáticas y cirrosis sin especificar.">(K74.6) Otras cirrosis hepáticas y cirrosis sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K75) Otras enfermedades de hígado inflamatorias.">(K75) Otras enfermedades de hígado inflamatorias.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K75.0) Abceso de hígado.">(K75.0) Abceso de hígado.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K75.1) Flebitis de la vena porta.">(K75.1) Flebitis de la vena porta.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K75.2) Hepatitis reactiva no especificada.">(K75.2) Hepatitis reactiva no especificada.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K75.3) Hepatitis granulomatosa, no clasificada en otra parte.">(K75.3) Hepatitis granulomatosa, no clasificada en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K75.4) Hepatitis autoinmune.">(K75.4) Hepatitis autoinmune.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K75.8) Otras enfermedades inflamatorias del hígado especificadas.">(K75.8) Otras enfermedades inflamatorias del hígado especificadas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K75.9) Enfermedad inflamatoria del hígado sin especificar.">(K75.9) Enfermedad inflamatoria del hígado sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K76) Otras enfermedades del hígado.">(K76) Otras enfermedades del hígado.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K76.0) Hígado graso no clasificado en otra parte.">(K76.0) Hígado graso no clasificado en otra parte.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K76.1) Congestión pasiva crónica del hígado.">(K76.1) Congestión pasiva crónica del hígado.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K76.2) Necrosis hemorrágica central del hígado.">(K76.2) Necrosis hemorrágica central del hígado.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K76.3) Infarcio de liver.">(K76.3) Infarcio de liver.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K76.4) Peliosis hepatis.">(K76.4) Peliosis hepatis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K76.5) Enfermedad hepática veno-oclusiva.">(K76.5) Enfermedad hepática veno-oclusiva.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K76.6) Hipertensión porta.">(K76.6) Hipertensión porta.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K76.7) Síndrome hepatorrenal.">(K76.7) Síndrome hepatorrenal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K76.8) Otras enfermedades de hígado especificadas.">(K76.8) Otras enfermedades de hígado especificadas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K76.9) Enfermedad de hígado especificadas.">(K76.9) Enfermedad de hígado especificadas.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K77) Trastornos de hígado en enfermedades clasificadas en otra parte.">(K77) Trastornos de hígado en enfermedades clasificadas en otra parte.</label>



























<a id="marcador_08" class="ancla"></a>
	<label class="identar_2" style="margin-top: 6%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(K80-K87) Trastornos de la vesícula biliar, del tracto biliar y del páncreas.">(K80-K87) Trastornos de la vesícula biliar, del tracto biliar y del páncreas.</label>
		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K80) Colelitiasis.">(K80) Colelitiasis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K80.0) Litiasis de la vesícula biliar con colecistitis aguda.">(K80.0) Litiasis de la vesícula biliar con colecistitis aguda.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K80.1) Litiasis de la vesícula biliar con otras colecistitis.">(K80.1) Litiasis de la vesícula biliar con otras colecistitis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K80.2) Litiasis de la vesícula biliar sin colecistitis.">(K80.2) Litiasis de la vesícula biliar sin colecistitis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K80.3) Litiasis de los conductos biliares con colangitis.">(K80.3) Litiasis de los conductos biliares con colangitis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K80.4) Litiasis de los conductos biliares con colecistitis.">(K80.4) Litiasis de los conductos biliares con colecistitis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K80.5) Litiasis de los conductos biliares con colangitis o colecistitis.">(K80.5) Litiasis de los conductos biliares con colangitis o colecistitis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K80.8) Otras colelitiasis.">(K80.8) Otras colelitiasis.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K81) Colecistitis.">(K81) Colecistitis.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K82) Otras enfermedades de la vesícula biliar.">(K82) Otras enfermedades de la vesícula biliar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K83) Otras enfermedades del tracto biliar.">(K83) Otras enfermedades del tracto biliar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K83.0) Colangitis.">(K83.0) Colangitis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K83.1) Obstrucción de los conductos biliares.">(K83.1) Obstrucción de los conductos biliares.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K83.2) Perforación de los conductos biliares.">(K83.2) Perforación de los conductos biliares.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K83.3) Fístula de los conductos biliares.">(K83.3) Fístula de los conductos biliares.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K83.4) Espasmo del esfínter de Oddi.">(K83.4) Espasmo del esfínter de Oddi.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K83.5) Quiste biliar.">(K83.5) Quiste biliar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K83.8) Otras enfermedades especificadas del tracto biliar.">(K83.8) Otras enfermedades especificadas del tracto biliar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K83.9) Enfermedad del tracto biliar sin especificar.">(K83.9) Enfermedad del tracto biliar sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K85) Pancreatitis aguda.">(K85) Pancreatitis aguda.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K86) Otras enfermedades del páncreas.">(K86) Otras enfermedades del páncreas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K86.0) Pancreatitis crónica inducida por alcohol.">(K86.0) Pancreatitis crónica inducida por alcohol.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K86.1) Otras pancreatitis crónicas.">(K86.1) Otras pancreatitis crónicas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K86.2) Quiste de páncreas.">(K86.2) Quiste de páncreas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K86.3) Pseudoquiste de páncreas.">(K86.3) Pseudoquiste de páncreas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K86.8) Otras enfermedades especificadas de páncreas.">(K86.8) Otras enfermedades especificadas de páncreas.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K86.9) Enfermedad de páncreas sin especificar.">(K86.9) Enfermedad de páncreas sin especificar.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K87) Trastornos de la vesícula biliar, tracto biliar y pácreas en enfermedades clasificadas en otra parte.">(K87) Trastornos de la vesícula biliar, tracto biliar y pácreas en enfermedades clasificadas en otra parte.</label>



















<a id="marcador_09" class="ancla"></a>
	<label class="identar_2" style="margin-top: 6%;"><input type="checkbox" class="identar_check_2" name="diagnostico[]" value="(K90-K93) Otras enfermedades del sistema digestivo.">(K90-K93) Otras enfermedades del sistema digestivo.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K90) Malabsorción intestinal.">(K90) Malabsorción intestinal.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K90.0) Celiaquía.">(K90.0) Celiaquía.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K90.1) Sprue tropical.">(K90.1) Sprue tropical.</label>
		

		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K91) Trastornos postprocedurales del sistema digestivo, no clasificados en otra parte.">(K91) Trastornos postprocedurales del sistema digestivo, no clasificados en otra parte.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K92) Otras enfermedades del sistema digestivo.">(K92) Otras enfermedades del sistema digestivo.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K92.0) Hematemesis.">(K92.0) Hematemesis.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K92.1) Melena.">(K92.1) Melena.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K92.2) Hemorragia gastrointestinal sin especificar.">(K92.2) Hemorragia gastrointestinal sin especificar.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K92.8) Otras enfermedades especificadas del sistema digestivo.">(K92.8) Otras enfermedades especificadas del sistema digestivo.</label>
			<label class="identar_4"><input type="checkbox" class="identar_check_4"  name="diagnostico[]" value="(K92.9) Enfermedad del sistema digestivo sin especificar.">(K92.9) Enfermedad del sistema digestivo sin especificar.</label>


		<label class="identar_3"><input type="checkbox" class="identar_check_3" name="diagnostico[]" value="(K93) Trastonos de otros órganos digestivos en enfermedades clasificadas en otra parte.">(K93) Trastonos de otros órganos digestivos en enfermedades clasificadas en otra parte.</label>


	<button hidden id="BotonEnviar" onclick="valores(this.form, 'diagnostico[]')">Cargar diagnostico</button>
</form>
</div>
</body>