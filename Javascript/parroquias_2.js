function SeleccionarParroquia_2(form){
    
    var Estado = form.estadoNacimiento.options;//se captura el elemento select que contiene los estados
    var Municipio = form.municipioNacimiento.options;//se captura el elemento select que contiene los estados
    var Parroquia = form.parroquiaNacimiento.options;//se captura el elemento select que contiene los estados
    Parroquia.length = null;

    if(Estado[7].selected == true){
        if(Municipio[0].selected == true){
            var destino0 = new Option("espere","");
            Parroquia[0] = destino0;
        }
        if(Municipio[1].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Bejuma");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;      
        }
        if(Municipio[2].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Güigüe");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
        }
        if(Municipio[3].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Mariara");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;  
        }
        if(Municipio[4].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Guacara");
            var destino2 = new Option("Ciudad Alianza");
            var destino3 = new Option("Yagua");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
            Parroquia[2] = destino2;
            Parroquia[3] = destino3;
        }
        if(Municipio[5].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Morón");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
        }
        if(Municipio[6].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Independencia");
            var destino2 = new Option("Tocuyito");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
            Parroquia[2] = destino2;
        }
        if(Municipio[7].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Los Guayos");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
        }
        if(Municipio[8].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Miranda");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
        }
        if(Municipio[9].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Montalbán");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
        }
        if(Municipio[10].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Naguanagua");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
        }
        if(Municipio[11].selected == true){
            var destino0 = new Option(""); 
            var destino1 = new Option("Bartolomé Salóm");
            var destino2 = new Option("Democracia");
            var destino3 = new Option("Fraternidad");
            var destino4 = new Option("Goaigoaza");
            var destino5 = new Option("Juan José Flores");
            var destino6 = new Option("Unión");
            var destino7 = new Option("Borburata");
            var destino8 = new Option("Patanemo");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
            Parroquia[2] = destino2;
            Parroquia[3] = destino3;
            Parroquia[4] = destino4;
            Parroquia[5] = destino5;
            Parroquia[6] = destino6;
            Parroquia[7] = destino7;
            Parroquia[8] = destino8;       
        }
        if(Municipio[12].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("San Diego");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
        }
        if(Municipio[13].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("San Joaquín");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
        }
        if(Municipio[14].selected == true){ 
            var destino0 = new Option("");
            var destino1 = new Option("Candelaria");
            var destino2 = new Option("Catedral");
            var destino3 = new Option("El Socorro");
            var destino4 = new Option("Miguel Peña");
            var destino5 = new Option("Rafael Urdaneta");
            var destino6 = new Option("San Blas");
            var destino7 = new Option("San José");
            var destino8 = new Option("Santa Rosa");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;
            Parroquia[2] = destino2;
            Parroquia[3] = destino3;
            Parroquia[4] = destino4;
            Parroquia[5] = destino5;
            Parroquia[6] = destino6;
            Parroquia[7] = destino7;
            Parroquia[8] = destino8;
        }
    }





    if(Estado[23].selected == true){
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





    if(Estado[22].selected == true){
        if(Municipio[0].selected == true){
            var destino0 = new Option("espere","");
            Parroquia[0] = destino0;
        }
        if(Municipio[1].selected == true){
            var destino0 = new Option("");
            var destino1 = new Option("Caraballeda");
            var destino2 = new Option("Carayaca");
            var destino3 = new Option("Carlos Soublette");
            var destino4 = new Option("Caruao");
            var destino5 = new Option("Catia La Mar");
            var destino6 = new Option("EL Junko");
            var destino7 = new Option("La Guaira");
            var destino8 = new Option("Macuto");
            var destino9 = new Option("Maiquetía");
            var destino10 = new Option("Naiguatá");
            var destino11 = new Option("Urimare");
            Parroquia[0] = destino0;
            Parroquia[1] = destino1;  
            Parroquia[2] = destino2;
            Parroquia[3] = destino3;
            Parroquia[4] = destino4;
            Parroquia[5] = destino5;
            Parroquia[6] = destino6;
            Parroquia[7] = destino7;
            Parroquia[8] = destino8;
            Parroquia[9] = destino9;
            Parroquia[10] = destino10; 
            Parroquia[11] = destino11;     
        }
    }
}
    
