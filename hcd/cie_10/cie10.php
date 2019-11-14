<?php
//Agrega un nuevo documento a la historia medica de un paciente
    session_start(); 
    $verifica_2 = 2018;  
    $_SESSION["verifica_2"] = $verifica_2;//para poder entrar a diagnostico_Basico_2.php

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
    
	  	<style type="text/css">
			a{
				background-color: ;
				display:block;
				line-height: 145%;
			}
			a:hover{
				background-color:#BEBFDD;
				font-weight: normal;/*Al aplicar este efecto con valor bold, en el capitulo II la pagina brinca*/
			}
			.identar_4{
				margin-top: ;
				margin-left: 3%;
				font-size: 1.2vw;
				padding-left: 2%;
			}
			.identar_5{
				margin-top: ;
				margin-left: 3%;
				font-size: 1.2vw;
			}
			.identar_6{
				margin-top: ;
				margin-left: 3%;
				font-size: 1.2vw;
				padding-left: 2%
			}
			.Degradado{
				color: rgba(4, 6, 82,0.4);
			}
		</style>  
		
   <script src="../../Javascript/Funciones_varias.js"></script> 
	</head>  

	<body style=" background-color: ; padding-bottom: 15%;">
	<header class="fixed_1" >
                <div style="width: 75%; background-color: #040652; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;  ">
                    <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%;color: rgba(194, 245, 19,1);">ConsultaMedica.com.ve</h1>
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
                </nav>
        </header>


	<h1 style="cursor: default;">ConsultaMedica.com.ve</h1>
	<h3 style="margin-top: 3%; margin-bottom: 0%">CIE_10</h3>
	<h3>Clasificación Internacional de Enfermedades</h3>
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<table style="background-color: ; margin: auto; width: 85%;">
	<thead>
		<th>Capitulo</th>
		<th>Código</th>
		<th>Título</th>
	</thead>
	<tbody>
		<tr>
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">I</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">A00-B99</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Ciertas enfermedades infecciosas y parasitarias</a></td>
		</tr>
		<tr>	
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">II</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">C00-D48</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Neoplasias</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">III</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">D50-D89</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Enfermedades de la sangre y de los órganos hematopoyéticos y otros trastornos que afectan el mecanismo de la inmunidad</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">IV</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">E00-E90</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Enfermedades endocrinas, nutricionales y metabólicas</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">V</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">F00-F99</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Trastornos mentales y del comportamiento</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">VI</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">G00-G99</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Enfermedades del sistema nervioso</a></td>
		</tr>
		<tr>	
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">VII</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">H00-H59</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Enfermedades del ojo y sus anexos</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">VIII</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">H60-H95</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Enfermedades del oído y de la apófisis mastoides</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">IX</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">I00-I99</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Enfermedades del sistema circulatorio</a></td>
		</tr>
		<tr>	
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">X</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">J00-J99</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Enfermedades del sistema respiratorio</a></td>
		</tr>
		<tr>		
			<td class="identar_4"><a href="cie10_CapituloXI.php">XI</a></td>
			<td class="identar_5"><a href="cie10_CapituloXI.php">K00-K93</a></td>
			<td class="identar_6"><a href="cie10_CapituloXI.php">Enfermedades del aparato digestivo</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">XII</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">L00-L99</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Enfermedades de la piel y el tejido subcutáneo</a></td>
		</tr>
		<tr>		
			<td class="identar_4"><a href="cie10_CapituloXIII.php">XIII</a></td>
			<td class="identar_5"><a href="cie10_CapituloXIII.php">M00-M99</a></td>
			<td class="identar_6"><a href="cie10_CapituloXIII.php">Enfermedades del sistema osteomuscular y del tejido conectivo</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">XIV</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">N00-N99</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Enfermedades del aparato genitourinario</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">XV</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">O00-O99</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Embarazo, parto y puerperio</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">XVI</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">P00-P96</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Ciertas afecciones originadas en el periodo perinatal</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">XVII</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">Q00-Q99</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Malformaciones congénitas, deformidades y anomalías cromosómicas</a></td>
		</tr>
		<tr>	
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">XVIII</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">R00-R99	</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Síntomas, signos y hallazgos anormales clínicos y de laboratorio, no clasificados en otra parte</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">XIX</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">S00-T98</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Traumatismos, envenenamientos y algunas otras consecuencias de causa externa</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">XX</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">V01-Y98</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Causas externas de morbilidad y de mortalidad</a></td>
		</tr>
		<tr>		
			<td class="identar_4"><a href="cie10_CapituloXXI.php">XXI</a></td>
			<td class="identar_5"><a href="cie10_CapituloXXI.php">Z00-Z99</a></td>
			<td class="identar_6"><a href="cie10_CapituloXXI.php">Factores que influyen en el estado de salud y contacto con los servicios de salud</a></td>
		</tr>
		<tr>		
			<td class="identar_4" onclick="Disponibilidad()"><a class="Degradado" href="">XXII</a></td>
			<td class="identar_5" onclick="Disponibilidad()"><a class="Degradado" href="">U00-U99</a></td>
			<td class="identar_6" onclick="Disponibilidad()"><a class="Degradado" href="">Códigos para situaciones especiales</a></td>
		</tr>
	</tbody>
</table>

</body>
<script type="text/javascript">
    function Disponibilidad(){
    	alert("Este capitulo aún no esta disponible, proximamente estará habilitado")
    }
</script>