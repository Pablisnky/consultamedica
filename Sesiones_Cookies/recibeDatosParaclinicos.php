<?php 
	$Cedula= $_POST["cedula"];
	$Doctor= $_POST["id_doctor"];

	$Hb= $_POST["Hb"];
	$Hto= $_POST["Hto"]; 
	$Leuc= $_POST["Leuc"]; 
	$Seg= $_POST["Seg"]; 
	$Linf= $_POST["Linf"]; 
	$Plt= $_POST["Plt"]; 
	$Tp= $_POST["TP"]; 
	$Tpt= $_POST["TPT"]; 
	$Inr= $_POST["INR"]; 
	$Sodio=$_POST["Sodio"]; 
	$Potasio= $_POST["Potasio"];                                 
	$Calcio= $_POST["Calcio"]; 
	$Magnesio= $_POST["Magnesio"]; 
	$Glic= $_POST["Glic"]; 
	$Urea= $_POST["Urea"]; 
	$Creat= $_POST["Creat"];
	$Depur= $_POST["Depur"]; 
	$Prot= $_POST["Prot"]; 
	$Alb= $_POST["Alb"]; 
	$Glob= $_POST["Glob"]; 
	$Ag= $_POST["A_G"];
	$Tgo= $_POST["TGO"];
	$Tgp=$_POST["TGP"];
	$Bt= $_POST["BT"];
	$Bi= $_POST["BI"];
	$Bd= $_POST["BD"];
	$Fost= $_POST["Fosf"];
	$Colest= $_POST["Colest"];
	$Hdlc= $_POST["HDLc"];
	$Ldlc= $_POST["LDLc"];
	$Triglic= $_POST["Triglic"];
	$Hiv= $_POST["HIV"];
	$Vdrl=$_POST["VDRL"];
	$AcUr= $_POST["Ac"];


	
	echo $Cedula . "<br>";
	echo $Doctor . "<br>";
	echo $Hb . "<br>";
	echo $Hto . "<br>";
	echo $Leuc . "<br>"; 
	echo $Seg . "<br>";
	echo $Linf . "<br>";
	echo $Plt . "<br>";
	echo $Tp . "<br>";
	echo $Tpt . "<br>"; 
	echo $Inr . "<br>";
	echo $Sodio . "<br>";
	echo $Potasio . "<br>";                               
	echo $Calcio . "<br>";
	echo $Magnesio . "<br>";
	echo $Glic . "<br>";
	echo $Urea . "<br>";
	echo $Creat . "<br>";
	echo $Depur . "<br>";
	echo $Prot . "<br>";
	echo $Alb . "<br>";
	echo $Glob . "<br>";
	echo $Ag . "<br>";
	echo $Tgo . "<br>";
	echo $Tgp . "<br>";
	echo $Bt . "<br>";
	echo $Bi . "<br>";
	echo $Bd . "<br>";
	echo $Fost . "<br>";
	echo $Colest . "<br>";
	echo $Hdlc . "<br>";
	echo $Ldlc . "<br>";
	echo $Triglic . "<br>";
	echo $Hiv . "<br>";
	echo $Vdrl . "<br>";
	echo $AcUr . "<br>";

	include("../conexion/Conexion_BD.php");
    mysqli_query($conexion,"SET NAMES 'utf8' ");

	$Insertar= "INSERT INTO valores_paraclinicos(CedulaPaciente, ID_Doctor, Fecha, Hb, Hbmax, Hbmin, Hto, Leuc, Seg, Linf, Plt, TP, TPT, INR, Sodio, Potasio, Calcio, Magnesio, Glic, Urea, Creat, Depur, Prot, Alb, Glob, A_G, TGO, TGP, BT, BI, BD, Fosf, Colest, HDLc, LDLc, Triglic, HIV, VDRL, AcUr) VALUES('$Cedula','$Doctor',CURDATE(), '$Hb', '16', '12', '$Hto','$Leuc','$Seg','$Linf','$Plt','$Tp','$Tpt','$Inr','$Sodio','$Potasio','$Calcio','$Magnesio','$Glic','$Urea','$Creat','$Depur','$Prot','$Alb','$Glob','$Ag','$Tgo','$Tgp','$Bt','$Bi','$Bd','$Fost','$Colest','$Hdlc','$Ldlc=','$Triglic','$Hiv','$Vdrl','$AcUr')";

	mysqli_query($conexion,$Insertar);
	header("location: HistoriasClinicas.php?cedula_pacient=". $Cedula);
    
	