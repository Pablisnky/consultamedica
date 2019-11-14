function SeleccionarParroquia(form){
    
    var Municipio = form.municipio.options;//se captura el elemento select que contiene los estados
    var Parroquia = form.parroquia.options;//se captura el elemento select que contiene los estados
    Parroquia.length = null;

    if(Municipio[0].selected == true){
        var destino0 = new Option("espere","");
        Parroquia[0] = destino0;
    }
    if(Municipio[1].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Aristides Bastidas");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;      
    }
    if(Municipio[2].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Bolivar");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
    }
    if(Municipio[3].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Campo Elias");
        var destino2 = new Option("Chivacoa");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1; 
        Parroquia[2] = destino2;  
    }
    if(Municipio[4].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Cocorote");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
    }
    if(Municipio[5].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Independencia");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
    }
    if(Municipio[6].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Jose Antonio Paez");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
    }
    if(Municipio[7].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("La Trinidad");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
    }
    if(Municipio[8].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Manuel Monge");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
    }
    if(Municipio[9].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Nirgua");
        var destino2 = new Option("Salom");
        var destino3 = new Option("Temerla");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
        Parroquia[2] = destino2;
        Parroquia[3] = destino3;
    }
    if(Municipio[10].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("San Andres");
        var destino2 = new Option("Yaritagua");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
        Parroquia[2] = destino2;
    }
    if(Municipio[11].selected == true){//San Felipe tiene la posicion 11 en el array del select Municipio en cargarPaciente.php
        var destino0 = new Option("");
        var destino1 = new Option("Albarico");
        var destino2 = new Option("San Felipe");
        var destino3 = new Option("San Javier");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
        Parroquia[2] = destino2;
        Parroquia[3] = destino3;        
    }
    if(Municipio[12].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Sucre");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
    }
    if(Municipio[13].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Urachiche");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
    }
    if(Municipio[14].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("El Guayabo");
        var destino2 = new Option("Farriar");
        Parroquia[0] = destino0;
        Parroquia[1] = destino1;
        Parroquia[2] = destino2;
    }
}
    
