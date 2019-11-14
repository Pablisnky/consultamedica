function seleccionarhora(form) {
	
	var fecha=form.datepicker
	var hora = form.Hora.options;
	hora.length = null;
	

	if(fecha == "07/27/2017"){
		var horario0 = new Option("Hora");
		var horario1 = new Option("03:00 am");
		var horario2 = new Option("04:00 am");
		var horario3 = new Option("05:00 am");
		var horario4 = new Option("06:00 am");
		var horario5 = new Option("07:00 am");
		var horario6 = new Option("08:00 am");
		var horario7 = new Option("09:00 am");
		var horario8 = new Option("10:00 am");
		var horario9 = new Option("11:00 am");
		var horario10 = new Option("12:00 m");
		var horario11 = new Option("01:00 pm");
		var horario12 = new Option("02:00 pm");
		var horario13 = new Option("03:00 pm");
		var horario14 = new Option("04:00 pm");
		var horario15 = new Option("05:00 pm");
		var horario16 = new Option("06:00 pm");
		var horario17 = new Option("07:00 pm");
		hora[0]= horario0;
	  	hora[1]= horario1;
	  	hora[2]= horario2;
	  	hora[3]= horario3;
	  	hora[4]= horario4;
	  	hora[5]= horario5;
	  	hora[6]= horario6;
	  	hora[7]= horario7;
	  	hora[8]= horario8;
	  	hora[9]= horario9;
	  	hora[10]= horario10;
	  	hora[11]= horario11;
	  	hora[12]= horario12;
	  	hora[13]= horario13;
	  	hora[14]= horario14;
	  	hora[15]= horario15;
	  	hora[16]= horario16;
	  	hora[17]= horario17;
	}

	if(salida == "Barquisimeto" && llegada == "Coro","maracaibo","San Cristobal"){
		var horario0 = new Option("Hora");
		var horario1 = new Option("06:00 am");
		hora[0]= horario0;
		hora[1]= horario1;
	}

	if(salida == "Barquisimeto" && llegada == "Valencia"){
		var horario0 = new Option("Hora");
		var horario1 = new Option("04:00 am");
		var horario2 = new Option("06:00 am");
		var horario3 = new Option("08:00 am");
		var horario4 = new Option("10:00 am");
		var horario5 = new Option("02:00 pm");
		var horario6 = new Option("04:00 pm");
		hora[0]= horario0;
	  	hora[1]= horario1;
	  	hora[2]= horario2;
	  	hora[3]= horario3;
	  	hora[4]= horario4;
	  	hora[5]= horario5;
	  	hora[6]= horario6;
	}
}