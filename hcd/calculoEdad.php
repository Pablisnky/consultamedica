<?php
//calcula la edad del paciente al insertar la fecha de nacimiento
ini_set('display_errors', 0); 
$fechanacimiento= $_GET["val_12"];

// echo "Fecha de Nac: " . $fechanacimiento . "<br>";

if($fechanacimiento){
	function calculaEdad($fechanacimiento){
	    list($dia,$mes,$ano) = explode("-", $fechanacimiento);
	    
	    $ano_diferencia  = date("Y") - $ano;
	    // echo "año actual: " . date("Y") . "<br>";
	    // echo "El año es: " . $ano . "<br>";

	    $mes_actual = date("m") ;
	    // echo "El mes de nacimeinto es: " . $mes . "<br>";

	    $dia_actual   = date("d");
	    // echo "Dia actual: " . date("d") . "<br>";
	    // echo "El dia de nacimiento es: " . $dia . "<br>";

	    if ($dia_actual > $dia || $mes_actual > $mes){
	        $ano_diferencia;
	    }
	    else{
	        $ano_diferencia--;
	    }
	    
	    return $ano_diferencia;
	}
	echo calculaEdad($fechanacimiento);
}
else{
	echo "<p style='color:white'>incorrecta</p>";
}

 
	

?>