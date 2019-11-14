<?php
//calcula la edad del paciente al insertar la fecha de nacimiento
ini_set('display_errors', 0); 
$fechanacimiento= $_GET["val_12"];

function calculaEdad($fechanacimiento){
    list($dia,$mes,$ano) = explode("-",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
        $ano_diferencia--;
    return $ano_diferencia;
}

echo calculaEdad($fechanacimiento); 
	

?>