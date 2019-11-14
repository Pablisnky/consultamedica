<?php
	//Fija los precios de los planes en todos los archivos donde aparezca reflejado el precio
	$Dolar = 981;
	$PlanBasico = 3.5;//Precio en dolares
	$PlanEspecial = 5.5;//Precio en dolares
	$PrecioBasico = intval($Dolar * $PlanBasico) . " Bs." ;//Siempre devolvera un numero entero
	$PrecioEspecial = intval($Dolar * $PlanEspecial) . " Bs." ;//Siempre devolvera un numero entero
?>