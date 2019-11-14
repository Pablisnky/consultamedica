function reservacion(){
	var reservacion=document.getElementById("reservaciones").value;
	var Cedula=document.getElementById("cedula").value;

	if (isNaN(reservacion)){
			alert ("Introduzca un número de puestos valido");
			document.getElementById("reservaciones").value="";
        	return true;
        	}		

    if (reservacion =="0"){
			alert ("Introduzca un número de puestos valido");
			document.getElementById("reservaciones").value="";
        	return true;
        	}

    if (reservacion > 5 || reservacion == 5){
			alert ("Los viajes se realizan en carros de 4 puestos");
			document.getElementById("reservaciones").value="";
        	return true;
        	}

    if (isNaN(Cedula)){
			alert ("Introduzca solo números");
			document.getElementById("cedula").value="";
        	return true;
        	}
	}

