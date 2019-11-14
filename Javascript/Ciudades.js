//Este archivo es utilizado en Afiliacion.php
function SeleccionarCiudad(form){
    
    var Estado = form.estado.options;
    var Ciudad = form.ciudad.options;
    Ciudad.length = null;

    if(Estado[0].selected == true){
        var destino0 = new Option("espere","");
        Ciudad[0] = destino0;
    }
    if(Estado[1].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Pto. Ayacucho");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;      
    }
    if(Estado[2].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Barcelona");
        var destino2 = new Option("Pto. La Cruz");
        var destino3 = new Option("Anaco");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
        Ciudad[3] = destino3;
    }
    if(Estado[3].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("San Fernando de Apure");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;   
    }
    if(Estado[4].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Maracay");
        var destino2 = new Option("La Victoria");
        var destino3 = new Option("Cagüa");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
        Ciudad[3] = destino3;
    }
    if(Estado[5].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Barinas");
        var destino2 = new Option("Sta. Barbara");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
    }
    if(Estado[6].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Pto. Ordaz");
        var destino2 = new Option("Ciudad Bolivar");
        var destino3 = new Option("Upata");
        var destino4 = new Option("San Felix");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
        Ciudad[3] = destino3;
        Ciudad[4] = destino4;
    }
    if(Estado[7].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Valencia");
        var destino2 = new Option("Pto. Cabello");
        var destino3 = new Option("Mariara");
        var destino4 = new Option("Bejuma");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
        Ciudad[3] = destino3;
        Ciudad[4] = destino4;
    }
    if(Estado[8].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("San Carlos");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
    }
    if(Estado[9].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Tucupita");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
    }
    if(Estado[10].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Caracas");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
    }
    if(Estado[11].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Coro");
        var destino2 = new Option("Pto. Fijo");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
    }
    if(Estado[12].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("San Juan de los Morros");
        var destino2 = new Option("Valle de La Pascua");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
    }
    if(Estado[13].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Barquisimeto");
        var destino2 = new Option("Cabudare");
        var destino3 = new Option("Carora");
        var destino4 = new Option("Duaca");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
        Ciudad[3] = destino3;
        Ciudad[4] = destino4;
    }
    if(Estado[14].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Merida");
        var destino2 = new Option("Ejido");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
    }
    if(Estado[15].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Los Teques");
        var destino2 = new Option("Charallave");
        var destino3 = new Option("Baruta");
        var destino4 = new Option("Guarenas");
        var destino5 = new Option("Guatire");
        var destino6 = new Option("Sta. Teresa");
        var destino7 = new Option("San Antonio");
        var destino8 = new Option("Carrizal");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
        Ciudad[3] = destino3;
        Ciudad[4] = destino4;
        Ciudad[5] = destino5;
        Ciudad[6] = destino6;
        Ciudad[7] = destino7;
        Ciudad[8] = destino8;
    }
    if(Estado[16].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Maturin");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
    }
    if(Estado[17].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("La Asunción");
        var destino2 = new Option("Porlamar");
        var destino3 = new Option("Pampatar");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
        Ciudad[3] = destino3;
    }
    if(Estado[18].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Acarigua");
        var destino2 = new Option("Araure");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
    }
    if(Estado[19].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Cumana");
        var destino2 = new Option("Pto. La Cruz");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
    }
    if(Estado[20].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("San Cristobal");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
    }
    if(Estado[21].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Trujillo");
        var destino2 = new Option("Valera");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
    }
    if(Estado[22].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("La Guaira");
        var destino2 = new Option("Maiquetía");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
    }
     if(Estado[23].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("San Felipe");
        var destino2 = new Option("Yaritagua");
        var destino3 = new Option("Chivacoa");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
        Ciudad[3] = destino3;
    }
    if(Estado[24].selected == true){
        var destino0 = new Option("");
        var destino1 = new Option("Maracaibo");
        var destino2 = new Option("Ciudad Ojeda");
        var destino3 = new Option("Cabimas");
        Ciudad[0] = destino0;
        Ciudad[1] = destino1;
        Ciudad[2] = destino2;
        Ciudad[3] = destino3;
    }
}
