<?php 
//Este archivo requiere que introduzca la clave del Dr. y el ID_Doctor que le fueron asignado al Dr.
	include("../conexion/Conexion_BD.php");
    
    //Se inserta el valor de la clave inicial del usuario
	$Clave= "15203047";
	//$Valor_A= "0000";
	//$Valor_B= "1111";

	//echo "Clave a cifrar= " . $Clave . "<br>";
	//echo "Valor_A= " . $Valor_A . "<br>";
	//echo "Valor_B= " . $Valor_B . "<br>";

    //se cifran los datos insertados con un algoritmo de encriptación
    $ClaveCifrada= password_hash($Clave,PASSWORD_DEFAULT);
    // $ValorA_Cifrado= password_hash($Valor_A,PASSWORD_DEFAULT);
    // $ValorB_Cifrado= password_hash($Valor_B,PASSWORD_DEFAULT);

//-------------------------------------------------------------------------------------------------------------------
//insercion en la base de datos.
	    $Actualizar= "UPDATE usuario_doctor SET claveDoctor= '$ClaveCifrada' WHERE ID_Doctor = 26 ";
	    mysqli_query($conexion,$Actualizar);

	    echo "Clave cifrada exitosamente";

//se entra a este archivo -> /Sesiones_Cookies/cifrar_Clave.php
//----------------------------------------------------------------------------------------------------------------------- 
?>
<a style='margin: auto; display: block;'  href='../ingresar.php' class='buttonCuatro_2'>Salir</a>
	       