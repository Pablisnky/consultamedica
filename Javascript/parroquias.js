function SeleccionarParroquia(form){
    
    var Estado = form.estadoResidencia.options;//se captura el elemento select que contiene los estados
    var Municipio = form.municipioResidencia.options;//se captura el elemento select que contiene los estados
    var Parroquia = form.parroquiaResidencia.options;//se captura el elemento select que contiene los estados
    Parroquia.length = null;


// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[1].selected == true){//Amazonas
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Alto Orinoco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Alto Orinoco");
            Parroquia[2] = new Option("Huachamacare Acanaña");
            Parroquia[3] = new Option("Marawaka Toky Shamanaña");
            Parroquia[4] = new Option("Mavaka Mavaka");
            Parroquia[5] = new Option("Sierra Parima Parimabé");    
        }
        if(Municipio[2].selected == true){//Atabapo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Atabapo");
            Parroquia[2] = new Option("Ucata Laja Lisa");
            Parroquia[3] = new Option("Yapacana Macuruco");
            Parroquia[4] = new Option("Caname Guarinuma");    
        }
        if(Municipio[3].selected == true){//Atures
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Fernando Girón Tovar");
            Parroquia[2] = new Option("Luis Alberto Gómez");
            Parroquia[3] = new Option("Pahueña Limón de Parhueña");
            Parroquia[4] = new Option("Platanillal");    
        }
        if(Municipio[4].selected == true){//Autana
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Samariapo");
            Parroquia[2] = new Option("Sipapo Pendar");
            Parroquia[3] = new Option("Munduapo");
            Parroquia[4] = new Option("Guayapo San Pedro del Orinoco");
            Parroquia[5] = new Option("Isla Ratón");    
        }
        if(Municipio[5].selected == true){//Manapiare
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Alto Ventuari");
            Parroquia[2] = new Option("Medio Ventuari");
            Parroquia[3] = new Option("Bajo Vnetuari");
            Parroquia[4] = new Option("Manapiare");     
        }
        if(Municipio[6].selected == true){//Maroa
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Maroa");
            Parroquia[2] = new Option("Victorino");
            Parroquia[3] = new Option("Comunidad");     
        }
        if(Municipio[7].selected == true){//Río Negro
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Casiquiare Curimacare");
            Parroquia[2] = new Option("Cocuy");
            Parroquia[3] = new Option("San Carlos de Río Negro");
            Parroquia[4] = new Option("Solano");    
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[2].selected == true){//Anzoátegui
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Anaco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Anaco");
            Parroquia[2] = new Option("San Joaquín");     
        }
        if(Municipio[2].selected == true){//Aragua
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cachipo");
            Parroquia[2] = new Option("Aragua de Barcelona");     
        }
        if(Municipio[3].selected == true){//Bolivar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bergantín");
            Parroquia[2] = new Option("Caigua");
            Parroquia[3] = new Option("El Carmen");
            Parroquia[4] = new Option("El Pilar");
            Parroquia[5] = new Option("Naricual");
            Parroquia[6] = new Option("San Cristóbal");    
        }
        if(Municipio[4].selected == true){//Bruzual
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Clarines");
            Parroquia[2] = new Option("Guanape");
            Parroquia[3] = new Option("Sabana de Uchire");     
        }
        if(Municipio[5].selected == true){//Carvajal
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Valle de Guanape");
            Parroquia[2] = new Option("Santa Bárbara");    
        }
        if(Municipio[6].selected == true){//Cajigal
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Onoto");
            Parroquia[2] = new Option("San Pablo");     
        }
        if(Municipio[7].selected == true){//Diego Bautista Urbaneja
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Lechería");
            Parroquia[2] = new Option("El Morro");     
        }
        if(Municipio[8].selected == true){//Freites
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cantaura");
            Parroquia[2] = new Option("Libertador");
            Parroquia[3] = new Option("Santa Rosa");
            Parroquia[4] = new Option("Urica");     
        }
        if(Municipio[9].selected == true){//Guanta
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guanta");
            Parroquia[2] = new Option("Chorrerón");     
        }
        if(Municipio[10].selected == true){//Guanipa
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San José de Guanipa");     
        }
        if(Municipio[11].selected == true){//Independencia
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Mamo");
            Parroquia[2] = new Option("Soledad"); 
        }
        if(Municipio[12].selected == true){//Libertad
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Mateo");
            Parroquia[2] = new Option("El Carito");
            Parroquia[3] = new Option("Santa Inés");
            Parroquia[4] = new Option("La Romereña");     
        }
        if(Municipio[13].selected == true){//Miranda
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Atapirire");
            Parroquia[2] = new Option("Boca del Pao");
            Parroquia[3] = new Option("El Pao");
            Parroquia[4] = new Option("Pariaguán");  
        }
        if(Municipio[14].selected == true){//Monagas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Mapire");
            Parroquia[2] = new Option("Piar");
            Parroquia[3] = new Option("Santa Clara");
            Parroquia[4] = new Option("San Diego de Cabrutica");
            Parroquia[5] = new Option("Uverito");
            Parroquia[6] = new Option("Zuata");    
        }
        if(Municipio[15].selected == true){//Peñalver
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Puerto Píritu");
            Parroquia[2] = new Option("San Miguel");
            Parroquia[3] = new Option("Sucre");  
        }
        if(Municipio[16].selected == true){//Piritu
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Píritu");
            Parroquia[2] = new Option("San Francisco");   
        }
        if(Municipio[17].selected == true){//San Juan de Capistrano
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Boca de Uchire");
            Parroquia[2] = new Option("Boca de Chávez");    
        }
        if(Municipio[18].selected == true){//Santa Ana
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Pueblo Nuevo");
            Parroquia[2] = new Option("Santa Ana");     
        }
        if(Municipio[19].selected == true){//Simón Rodríguez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Edmundo Barrios");
            Parroquia[2] = new Option("Miguel Otero Silva");    
        }
        if(Municipio[20].selected == true){//Sir Arthur McGregor
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Chaparro");
            Parroquia[2] = new Option("Tomás Alfaro");
            Parroquia[3] = new Option("Calatrava");     
        }
        if(Municipio[21].selected == true){//Sotillo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Puerto La Cruz");
            Parroquia[2] = new Option("Pozuelos");     
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[3].selected == true){//Apure
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Achaguas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Achaguas");
            Parroquia[2] = new Option("Apurito");
            Parroquia[3] = new Option("EL Yagual");
            Parroquia[4] = new Option("Guachara");
            Parroquia[5] = new Option("Mucuritas");
            Parroquia[6] = new Option("Queseras del Medio");     
        }
        if(Municipio[2].selected == true){//Biruaca
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Biruaca");   
        }
        if(Municipio[3].selected == true){//Muñoz
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bruzual");
            Parroquia[2] = new Option("Mantecal");
            Parroquia[3] = new Option("Quintero");
            Parroquia[4] = new Option("Rincón Hondo");
            Parroquia[5] = new Option("San Vicente");     
        }
        if(Municipio[4].selected == true){//Paéz
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guasdalito");
            Parroquia[2] = new Option("Aramendi");
            Parroquia[3] = new Option("El Amparo");
            Parroquia[4] = new Option("San Camilo");
            Parroquia[5] = new Option("Urdaneta");     
        }
        if(Municipio[5].selected == true){//Pedro Camejo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Juan de Payara");
            Parroquia[2] = new Option("Codazzi");
            Parroquia[3] = new Option("Cunaviche");     
        }
        if(Municipio[6].selected == true){//Rómulo Gallegos
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Elorza");
            Parroquia[2] = new Option("La Trinidad");     
        }
        if(Municipio[7].selected == true){//San Fernando
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Fernando");
            Parroquia[2] = new Option("El Recreo");
            Parroquia[3] = new Option("Peñalver");
            Parroquia[4] = new Option("San Rafael de Atamica");    
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[4].selected == true){//Aragua
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Bolivar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bolivar");    
        }
        if(Municipio[2].selected == true){//Camatagua
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Camatagua");
            Parroquia[2] = new Option("Carmen de Cura");    
        }
        if(Municipio[3].selected == true){//Francisco Linares Alcántara
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Rita");
            Parroquia[2] = new Option("Francisco de Miranda");
            Parroquia[3] = new Option("Monseñor Feliciano González");    
        }
        if(Municipio[4].selected == true){//Girardot
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("José Ovalles");
            Parroquia[2] = new Option("Joaquín Crespo");
            Parroquia[3] = new Option("José Casanova Godoy");
            Parroquia[4] = new Option("Madre María de San José");
            Parroquia[5] = new Option("Andrés Eloy Blanco");
            Parroquia[6] = new Option("Los Tacarigua");
            Parroquia[7] = new Option("Las Delicias");
            Parroquia[8] = new Option("Choroní");    
        }
        if(Municipio[5].selected == true){//José Ángel Lamas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Cruz");    
        }
        if(Municipio[6].selected == true){//José Felix Rivas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Jua Vicente Bolívar");
            Parroquia[2] = new Option("Castor Nieves Rios");
            Parroquia[3] = new Option("Las Guacamayas");
            Parroquia[4] = new Option("Pao de Zárate");
            Parroquia[5] = new Option("Zuata");     
        }
        if(Municipio[7].selected == true){//José  Rafael Revenga
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("José  Rafael Revenga");     
        }
        if(Municipio[8].selected == true){//Libertador
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Palo Negro");
            Parroquia[2] = new Option("San Martín de Porres");   
        }
        if(Municipio[9].selected == true){//Mario Briceño Iragorry
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Limón");
            Parroquia[2] = new Option("Caña de Azucar");    
        }
        if(Municipio[10].selected == true){//Ocumare de la Costa 
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Ocumare de la Costa");    
        }
        if(Municipio[11].selected == true){//San Casimiro
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Casimiro");
            Parroquia[2] = new Option("Güiripa");
            Parroquia[3] = new Option("Ollas de Caramacate");
            Parroquia[4] = new Option("Valle Morín");    
        }
        if(Municipio[12].selected == true){//San Sebastián
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Sebastián");    
        }
        if(Municipio[13].selected == true){//Santiago Mariño
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Turmero");
            Parroquia[2] = new Option("Arevalo Aponte");
            Parroquia[3] = new Option("Chuao");
            Parroquia[4] = new Option("Samán de Güere");
            Parroquia[5] = new Option("Pacheco Miranda");    
        }
        if(Municipio[14].selected == true){//Santos Michelena
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santos Michelena");
            Parroquia[2] = new Option("Tiara");    
        }
        if(Municipio[15].selected == true){//Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cagua");
            Parroquia[2] = new Option("Bella Vista");    
        }
        if(Municipio[16].selected == true){//Tovar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tovar");     
        }
        if(Municipio[17].selected == true){//Urdaneta
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Urdaneta");
            Parroquia[2] = new Option("Las Peñitas");
            Parroquia[3] = new Option("San Francisco de Cara");
            Parroquia[4] = new Option("Taguay");    
        }
        if(Municipio[18].selected == true){//Zamora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Villa de Cura");
            Parroquia[2] = new Option("Magdaleno");
            Parroquia[3] = new Option("San Francisco de Asís");
            Parroquia[4] = new Option("Valles de Tucutunemo");
            Parroquia[5] = new Option("Augusto Mijares");    
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[5].selected == true){//Barinas
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Alberto Arvelo Torrealba
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Sabaneta");
            Parroquia[2] = new Option("Juan Antonio Rodríguez Domínguez");    
        }
        if(Municipio[2].selected == true){//Andrés Eloy Blanco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Cantón");
            Parroquia[2] = new Option("Santa Cruz de Guaca");
            Parroquia[3] = new Option("Puerto Vivas");
            Parroquia[4] = new Option("Primero de Diciembre");     
        }
        if(Municipio[3].selected == true){//Antonio Jose de Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Ticoporo");
            Parroquia[2] = new Option("Nicolás Pulido");
            Parroquia[3] = new Option("Andrés Bello");    
        }
        if(Municipio[4].selected == true){//Arismendi
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Arismendi");
            Parroquia[2] = new Option("Guadarrama");
            Parroquia[3] = new Option("La Unión");
            Parroquia[4] = new Option("San Antonio");    
        }
        if(Municipio[5].selected == true){//Barinas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Barinas");
            Parroquia[2] = new Option("Alberto Arvelo Larriva");
            Parroquia[3] = new Option("San Silvestre");
            Parroquia[4] = new Option("Santa Inés");
            Parroquia[5] = new Option("Santa Lucía");
            Parroquia[6] = new Option("Torunos");
            Parroquia[7] = new Option("El Carmen");
            Parroquia[8] = new Option("Rómulo Betancourt");
            Parroquia[9] = new Option("Corazón de Jesús");
            Parroquia[10] = new Option("Ramón Ignacio Méndez");   
            Parroquia[11] = new Option("Alto Barinas"); 
            Parroquia[12] = new Option("Manuel Palacio Fajardo"); 
            Parroquia[13] = new Option("Juan Antonio Rodríguez Domínguez"); 
            Parroquia[14] = new Option("Dominga Ortiz de Páez");   
        }
        if(Municipio[6].selected == true){//Bolívar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Barinitas");
            Parroquia[2] = new Option("Altamira de Cáceres");
            Parroquia[3] = new Option("Calderas");    
        }
        if(Municipio[7].selected == true){//Cruz Paredes
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Barrancas");
            Parroquia[2] = new Option("El Socorro");
            Parroquia[3] = new Option("Mazparrito");    
        }
        if(Municipio[8].selected == true){//Ezequiel Zamora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Bárbara");
            Parroquia[2] = new Option("Pedro Briceño Méndez");
            Parroquia[3] = new Option("Ramón Ignacio Méndez");
            Parroquia[4] = new Option("José Ignacio del Pumar");    
        }
        if(Municipio[9].selected == true){//Obispos
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Obispos");
            Parroquia[2] = new Option("Los Guasimitos");
            Parroquia[3] = new Option("El Real");
            Parroquia[4] = new Option("La Luz");    
        }
        if(Municipio[10].selected == true){//Pedraza
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Ciudad Bolívia");
            Parroquia[2] = new Option("José Ignacio Briceño");
            Parroquia[3] = new Option("José Félix Rivas");
            Parroquia[4] = new Option("Páez");    
        }
        if(Municipio[11].selected == true){//Rojas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Libertad");
            Parroquia[2] = new Option("Dolores");
            Parroquia[3] = new Option("Santa Rosa");
            Parroquia[4] = new Option("Palacio Fajardo");
            Parroquia[5] = new Option("Simón Rodríguez");    
        }
        if(Municipio[12].selected == true){//Sosa
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Ciudad de Nutrias");
            Parroquia[2] = new Option("El Regalo");
            Parroquia[3] = new Option("Puerto Nutrias");
            Parroquia[4] = new Option("Santa Catalina");
            Parroquia[5] = new Option("Simón Bolívar");     
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[6].selected == true){//Bolivar
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Angostura
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Raúl Leoni");
            Parroquia[2] = new Option("Barceloneta");
            Parroquia[3] = new Option("Santa Bárbara");
            Parroquia[4] = new Option("San Francisco");     
        }
        if(Municipio[2].selected == true){//Caroní
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cachamay");
            Parroquia[2] = new Option("Chirica");
            Parroquia[3] = new Option("Dalla Costa");
            Parroquia[4] = new Option("Once de Abril");
            Parroquia[5] = new Option("Simón Bolívar");
            Parroquia[6] = new Option("Unare");
            Parroquia[7] = new Option("Universidad");
            Parroquia[8] = new Option("Vista al sol");
            Parroquia[9] = new Option("Pozo verde");
            Parroquia[10] = new Option("Yocoima");
            Parroquia[10] = new Option("5 de Julio");   
        }
        if(Municipio[3].selected == true){//Cedeño
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cedeño");
            Parroquia[2] = new Option("Altagracia");
            Parroquia[3] = new Option("Ascención Farreras");
            Parroquia[4] = new Option("Guaniamo");
            Parroquia[5] = new Option("La Urbana");
            Parroquia[6] = new Option("Pijiguaos");    
        }
        if(Municipio[4].selected == true){//El Callao
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Callao");    
        }
        if(Municipio[5].selected == true){//Gran Sabana
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Gran Sabana");
            Parroquia[2] = new Option("Ikabarú");     
        }
        if(Municipio[6].selected == true){//Heres
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Catedral");
            Parroquia[2] = new Option("Zea");
            Parroquia[3] = new Option("Orinoco");
            Parroquia[4] = new Option("José Antonio Páez");
            Parroquia[5] = new Option("Marhuanta");
            Parroquia[6] = new Option("Agua Salada");
            Parroquia[7] = new Option("Vista Hermosa");
            Parroquia[8] = new Option("La Sanita");
            Parroquia[9] = new Option("Panapana");    
        }
        if(Municipio[7].selected == true){//Padre Pedro Chien
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Padre Pedro Chien");     
        }
        if(Municipio[8].selected == true){//Piar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Andrés Eloy Blanco");
            Parroquia[2] = new Option("Pedro Cova");
            Parroquia[3] = new Option("Upata");    
        }
        if(Municipio[9].selected == true){//Roscio
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Roscio");
            Parroquia[2] = new Option("Salóm");    
        }
        if(Municipio[10].selected == true){//Sifones
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tumeremo");
            Parroquia[2] = new Option("Dalla Costa");
            Parroquia[3] = new Option("San Isidro");     
        }
        if(Municipio[11].selected == true){//Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Sucre");
            Parroquia[2] = new Option("Aripao");
            Parroquia[3] = new Option("Guarataro");
            Parroquia[4] = new Option("Las Majadas");
            Parroquia[5] = new Option("Moitaco");     
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[7].selected == true){//Carabobo
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Bejuma
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bejuma"); 
            Parroquia[2] = new Option("Canoabo");
            Parroquia[3] = new Option("Simón Bolívar");     
        }
        if(Municipio[2].selected == true){//Carlos Arvelo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Güigüe");
            Parroquia[2] = new Option("Belén");
            Parroquia[3] = new Option("Tacarigua"); 
        }
        if(Municipio[3].selected == true){//Diego Ibarra
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Mariara");
            Parroquia[2] = new Option("Aguas Calientes");
        }
        if(Municipio[4].selected == true){//Guacara
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guacara");
            Parroquia[2] = new Option("Ciudad Alianza");
            Parroquia[3] = new Option("Yagua");
        }
        if(Municipio[5].selected == true){//Juan José Mora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Morón");
            Parroquia[2] = new Option("Urama");
        }
        if(Municipio[6].selected == true){//Libertador
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Independencia");
            Parroquia[2] = new Option("Tocuyito");
        }
        if(Municipio[7].selected == true){//Los Guayos
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Los Guayos");
        }
        if(Municipio[8].selected == true){//Miranda
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Miranda");
        }
        if(Municipio[9].selected == true){//Montalbán
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Montalbán");
        }
        if(Municipio[10].selected == true){//NAguanagua
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Naguanagua");
        }
        if(Municipio[11].selected == true){//Puerto Cabello
            Parroquia[0] = new Option(""); 
            Parroquia[1] = new Option("Bartolomé Salóm");
            Parroquia[2] = new Option("Democracia");
            Parroquia[3] = new Option("Fraternidad");
            Parroquia[4] = new Option("Goaigoaza");
            Parroquia[5] = new Option("Juan José Flores");
            Parroquia[6] = new Option("Unión");
            Parroquia[7] = new Option("Borburata");
            Parroquia[8] = new Option("Patanemo");      
        }
        if(Municipio[12].selected == true){//San Diego
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Diego");
        }
        if(Municipio[13].selected == true){//San Joaquín
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Joaquín");
        }
        if(Municipio[14].selected == true){//Valencia
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Candelaria");
            Parroquia[2] = new Option("Catedral");
            Parroquia[3] = new Option("El Socorro");
            Parroquia[4] = new Option("Miguel Peña");
            Parroquia[5] = new Option("Rafael Urdaneta");
            Parroquia[6] = new Option("San Blas");
            Parroquia[7] = new Option("San José");
            Parroquia[8] = new Option("Santa Rosa");
            Parroquia[9] = new Option("Negro Primero");
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[8].selected == true){//Cojedes
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Anzoátegui
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cojedes");
            Parroquia[2] = new Option("Juan de Mata Suárez");     
        }
        if(Municipio[2].selected == true){//Ezequiel Zamora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Carlos");
            Parroquia[2] = new Option("Juan Ángel Bravo");
            Parroquia[3] = new Option("Manuel Manrique");    
        }
        if(Municipio[3].selected == true){//Girardot
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("EL Baúl");
            Parroquia[2] = new Option("Sucre");    
        }
        if(Municipio[4].selected == true){//Lima Blanco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("La Aguadita");
            Parroquia[2] = new Option("Macapo");     
        }
        if(Municipio[5].selected == true){//Pao de San Juan Bautista
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Pao");     
        }
        if(Municipio[6].selected == true){//Ricaurte
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Amparo");
            Parroquia[2] = new Option("Libertad");     
        }
        if(Municipio[7].selected == true){//Rómulo Gallegos
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Rómulo Gallegos");     
        }
        if(Municipio[8].selected == true){//Tinaco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("José Laurencio Silva");     
        }
        if(Municipio[9].selected == true){//Tinaquillo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tinaquillo");    
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[9].selected == true){//Delta Amacuro
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Antonio Diaz
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Curiapo");
            Parroquia[2] = new Option("Luis Brión");
            Parroquia[3] = new Option("Francisco Aniceto Lugo");
            Parroquia[4] = new Option("Manuel Renaud");
            Parroquia[5] = new Option("Padre Barral");
            Parroquia[6] = new Option("Santos de Abelgas");2    
        }
        if(Municipio[2].selected == true){//Casacoima
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Imataca");
            Parroquia[2] = new Option("Juan Bautista Arismendi");
            Parroquia[3] = new Option("Manuel Piar");
            Parroquia[4] = new Option("Rómulo Gallegos");    
        }
        if(Municipio[3].selected == true){//Pedernales
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Pedernales");
            Parroquia[2] = new Option("Luis Beltrán Prieto Figueroa");    
        }
        if(Municipio[4].selected == true){//Tucupita
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San José");
            Parroquia[2] = new Option("José Vidal Marcano");
            Parroquia[3] = new Option("Leonardo Ruíz Pineda");
            Parroquia[4] = new Option("Antonio José de Sucre");
            Parroquia[5] = new Option("Monseñor Argimiro García");
            Parroquia[6] = new Option("Virgen del Valle");
            Parroquia[7] = new Option("San Rafael");
            Parroquia[8] = new Option("Juan Millan");     
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[10].selected == true){//Distrito Capital
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Libertador
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Altagracia");
            Parroquia[2] = new Option("Antímano");
            Parroquia[3] = new Option("Candelaria");
            Parroquia[4] = new Option("Caricuao");
            Parroquia[5] = new Option("Catedral");
            Parroquia[6] = new Option("Coche");
            Parroquia[7] = new Option("El Junquito");
            Parroquia[8] = new Option("El Paraíso");
            Parroquia[9] = new Option("El Recreo");
            Parroquia[10] = new Option("El Valle");
            Parroquia[11] = new Option("La Pastora"); 
            Parroquia[12] = new Option("La Vega");
            Parroquia[13] = new Option("Macarao");
            Parroquia[14] = new Option("San Agustín");
            Parroquia[15] = new Option("San Bernardino");
            Parroquia[16] = new Option("San José"); 
            Parroquia[17] = new Option("San Juan");
            Parroquia[18] = new Option("San Pedro");
            Parroquia[19] = new Option("Santa Rosalía");
            Parroquia[20] = new Option("Santa Teresa");
            Parroquia[21] = new Option("Sucre");
            Parroquia[22] = new Option("23 de enero");   
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[11].selected == true){//Falcon
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Acosta
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Capadare");
            Parroquia[2] = new Option("La Pastora");
            Parroquia[3] = new Option("Libertador");
            Parroquia[4] = new Option("San Juan de los Cayos");    
        }
        if(Municipio[2].selected == true){//Bolívar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Aracua");
            Parroquia[2] = new Option("La Peña");
            Parroquia[3] = new Option("San Luis");     
        }
        if(Municipio[3].selected == true){//Buchivacoa
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bariro");
            Parroquia[2] = new Option("Borojó");
            Parroquia[3] = new Option("Capatárida");
            Parroquia[4] = new Option("Guajiro");
            Parroquia[5] = new Option("Seque");
            Parroquia[6] = new Option("Valle de Eroa");
            Parroquia[7] = new Option("Zazárida");    
        }
        if(Municipio[4].selected == true){//Cacique Manaure
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cacique Manaure");    
        }
        if(Municipio[5].selected == true){//Carirubana
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Norte");
            Parroquia[2] = new Option("Carirubana");
            Parroquia[3] = new Option("Santa Ana");
            Parroquia[4] = new Option("Punta Cardón");    
        }
        if(Municipio[6].selected == true){//Colina
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("La Vela de Coro");
            Parroquia[2] = new Option("Acurigua");
            Parroquia[3] = new Option("Guaibacoa");
            Parroquia[4] = new Option("Las Calderas");
            Parroquia[5] = new Option("Macoruca");   
        }
        if(Municipio[7].selected == true){//Dabajuro
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Dabajuro");    
        }
        if(Municipio[8].selected == true){//Democracia
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Agua Clara");
            Parroquia[2] = new Option("Avaria");
            Parroquia[3] = new Option("Pedregal");
            Parroquia[4] = new Option("Piedra Grande");
            Parroquia[5] = new Option("Purureche");    
        }
        if(Municipio[9].selected == true){//Falcón
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Adaure");
            Parroquia[2] = new Option("Adícora");
            Parroquia[3] = new Option("Baraived");
            Parroquia[4] = new Option("Buena Vista");
            Parroquia[5] = new Option("Jadacaquiva");
            Parroquia[6] = new Option("El Vínculo");
            Parroquia[7] = new Option("El Hato");
            Parroquia[8] = new Option("Moruy");
            Parroquia[9] = new Option("Pueblo Nuevo");
        }
        if(Municipio[10].selected == true){//Federación
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Agua Larga");
            Parroquia[2] = new Option("Churuguara");
            Parroquia[3] = new Option("El Paují");
            Parroquia[4] = new Option("Independencia");
            Parroquia[5] = new Option("Mapararí");    
        }
        if(Municipio[11].selected == true){//Jacura
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Agua Linda");
            Parroquia[2] = new Option("Araurima");
            Parroquia[3] = new Option("Jacura");    
        }
        if(Municipio[12].selected == true){//Los Taques
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Los Taques");
            Parroquia[2] = new Option("Judibana");    
        }
        if(Municipio[13].selected == true){//Miranda
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guzmán Guillermo");
            Parroquia[2] = new Option("Mitare");
            Parroquia[3] = new Option("Río Seco");
            Parroquia[4] = new Option("Sabaneta");
            Parroquia[5] = new Option("San Antonio");
            Parroquia[6] = new Option("San Gabriel");
            Parroquia[7] = new Option("Santa Ana");     
        }
        if(Municipio[14].selected == true){//Mauroa
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Mene de Mauroa");
            Parroquia[2] = new Option("San Félix");
            Parroquia[3] = new Option("Casigua");    
        }
        if(Municipio[15].selected == true){//Monseñor Iturriza
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Boca del Tocuyo");
            Parroquia[2] = new Option("Chichiriviche");
            Parroquia[3] = new Option("Tocuyo de la Costa");    
        }
        if(Municipio[16].selected == true){//Palma Sola
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Palma Sola");    
        }
        if(Municipio[17].selected == true){//Petit
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cabure");
            Parroquia[2] = new Option("Colina");
            Parroquia[3] = new Option("Curimagua");    
        }
        if(Municipio[18].selected == true){//Píritu
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San José de la Costa");
            Parroquia[2] = new Option("Píritu");    
        }
        if(Municipio[19].selected == true){//San Francisco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Francisco Mirimire");    
        }
        if(Municipio[20].selected == true){//Silva
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tucacas");
            Parroquia[2] = new Option("Boca de Aroa");    
        }
        if(Municipio[21].selected == true){//Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Sucre");
            Parroquia[2] = new Option("Pecaya");    
        }
        if(Municipio[22].selected == true){//Tocópero
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tocópero");     
        }
        if(Municipio[23].selected == true){//Unión
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Charal");
            Parroquia[2] = new Option("Las Vegas del Tuy");
            Parroquia[3] = new Option("Santa Cruz de Bucaral");    
        }
        if(Municipio[24].selected == true){//Urumaco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bruzual");
            Parroquia[2] = new Option("Urumaco");     
        }
        if(Municipio[25].selected == true){//Zamora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Puerto Cumarebo");
            Parroquia[2] = new Option("La Ciénaga");
            Parroquia[3] = new Option("La Soledad");
            Parroquia[4] = new Option("Pueblo Cumarebo");
            Parroquia[5] = new Option("Zazárida");    
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[12].selected == true){//Guárico
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Camaguán
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Camaguán");
            Parroquia[2] = new Option("Miranda");
            Parroquia[3] = new Option("Puerto Uverito");   
        }
        if(Municipio[2].selected == true){//Chaguaramas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Chaguaramas");     
        }
        if(Municipio[3].selected == true){//El Socorro
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Socorro");    
        }
        if(Municipio[4].selected == true){//Infante
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Valle de la Pascua");
            Parroquia[2] = new Option("Espino");   
        }
        if(Municipio[5].selected == true){//Juan Germán Roscio
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cantagallo");
            Parroquia[2] = new Option("San Juan de Los Morros");
            Parroquia[3] = new Option("Parapara");    
        }
        if(Municipio[6].selected == true){//Las Mercedes
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Las Mercedes");
            Parroquia[2] = new Option("Cabruta");
            Parroquia[3] = new Option("Santa Rita de Manapire");    
        }
        if(Municipio[7].selected == true){//Mellado
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Sombrero");
            Parroquia[2] = new Option("Sosa");     
        }
        if(Municipio[8].selected == true){//Miranda
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Calvario");
            Parroquia[2] = new Option("El Rastro");
            Parroquia[3] = new Option("Guardatinajas");
            Parroquia[4] = new Option("Urbana Calabozo");    
        }
        if(Municipio[9].selected == true){//Monagas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Altagracia de Orituco");
            Parroquia[2] = new Option("San Rafael de Orituco");
            Parroquia[3] = new Option("San Francisco Javier de Lezama");
            Parroquia[4] = new Option("Paso Real de Macaira");
            Parroquia[5] = new Option("Carlos Soublette");
            Parroquia[6] = new Option("San Francisco de Macaira");
            Parroquia[7] = new Option("Libertad de Orituco");    
        }
        if(Municipio[10].selected == true){//Ortiz
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San José de Tiznados");
            Parroquia[2] = new Option("San Francisco de Tiznados");
            Parroquia[3] = new Option("San Lorenzo de Tiznados");
            Parroquia[4] = new Option("Ortiz");  
        }
        if(Municipio[11].selected == true){//Ribas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tucupido");
            Parroquia[2] = new Option("San Rafael de Laya");     
        }
        if(Municipio[12].selected == true){//San Geronimo de Guayabal
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guayabal");
            Parroquia[2] = new Option("Cazorla");    
        }
        if(Municipio[13].selected == true){//San José de Guaribe
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San José de Guaribe");     
        }
        if(Municipio[14].selected == true){//Santa María de Ipire
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa María de Ipire");
            Parroquia[2] = new Option("Altamira");    
        }
        if(Municipio[15].selected == true){//Zaraza
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San José de Unare");
            Parroquia[2] = new Option("Zaraza");    
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[13].selected == true){//Lara
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Andrés Eloy Blanco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Quebrada honda");
            Parroquia[2] = new Option("Pio Tamayo");
            Parroquia[3] = new Option("Yacambú");   
        }
        if(Municipio[2].selected == true){//Crespo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Freitez");
            Parroquia[2] = new Option("José María Blanco");
        }
        if(Municipio[3].selected == true){ //Morán
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Anzoátegui");
            Parroquia[2] = new Option("Bolivar");
            Parroquia[3] = new Option("Guarico");
            Parroquia[4] = new Option("Hilario Luna y Luna");
            Parroquia[5] = new Option("Humocaro Alto");
            Parroquia[6] = new Option("Humocaro Bajo");
            Parroquia[7] = new Option("La Candelaria");
            Parroquia[8] = new Option("Morán");
        }
        if(Municipio[4].selected == true){//Palavecino
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cabudare");
            Parroquia[2] = new Option("José Gregorio Bastidas");
            Parroquia[3] = new Option("Agua VIva");
        }
        if(Municipio[5].selected == true){//Simón Planas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Buría");
            Parroquia[2] = new Option("Gustavo Vega");
            Parroquia[3] = new Option("Sarare");
        }
        if(Municipio[6].selected == true){//Torres
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Altagracia");
            Parroquia[2] = new Option("Antonio Diaz");
            Parroquia[3] = new Option("Camacaro");
            Parroquia[4] = new Option("Castañeda");
            Parroquia[5] = new Option("Cecilio Subillaga");
            Parroquia[6] = new Option("Chiquinquira");
            Parroquia[7] = new Option("El Blanco");
            Parroquia[8] = new Option("Espinoza de los Monteros");
            Parroquia[9] = new Option("Heriberto Arrollo");
            Parroquia[10] = new Option("Lara");
            Parroquia[11] = new Option("Las Meredes");
            Parroquia[12] = new Option("Manuel Morillo");
            Parroquia[13] = new Option("Montaña Verde");
            Parroquia[14] = new Option("Montes de Oca");
            Parroquia[15] = new Option("Reyes de Vargas");
            Parroquia[16] = new Option("Torres");
            Parroquia[17] = new Option("Trinidad Samuel");
        }
        if(Municipio[7].selected == true){//Urdaneta
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Xaguas");
            Parroquia[2] = new Option("Siquisique");
            Parroquia[3] = new Option("San Miguel");
            Parroquia[4] = new Option("Moroturo");
        }
        if(Municipio[8].selected == true){//Iribarren
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Aguedo Felipe Alvarado");
            Parroquia[2] = new Option("Buena Vista");
            Parroquia[3] = new Option("Catedral");
            Parroquia[4] = new Option("Concepción");
            Parroquia[5] = new Option("El Cují");
            Parroquia[6] = new Option("Juárez");
            Parroquia[7] = new Option("Juan de Villegas");
            Parroquia[8] = new Option("Santa Rosa");
            Parroquia[9] = new Option("Tamaca");
            Parroquia[10] = new Option("Unión");
        }
        if(Municipio[9].selected == true){//Jiménez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Juan Bautista Rodriguez");
            Parroquia[2] = new Option("Cuara");
            Parroquia[3] = new Option("Diego de Lozada");
            Parroquia[4] = new Option("Paraíso de San José");
            Parroquia[5] = new Option("San Miguel");
            Parroquia[6] = new Option("Tintorero");
            Parroquia[7] = new Option("José Bernardo Dorante");
            Parroquia[8] = new Option("Coronel Mariano Peraza");
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[14].selected == true){//Mérida
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Alberto Adriani
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Presidente Betancourt");
            Parroquia[2] = new Option("Presidente Páez");
            Parroquia[3] = new Option("Presidente Rómulo Gallegos");
            Parroquia[4] = new Option("Gabriel Picón González");
            Parroquia[5] = new Option("Héctor Amable Mora");
            Parroquia[6] = new Option("José Nucete Sardi");
            Parroquia[7] = new Option("Pulido Méndez");   
        }
        if(Municipio[2].selected == true){//Andrés Bello
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("La Azulita");    
        }
        if(Municipio[3].selected == true){//Antonio Pinto Salinas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Cruz de Mora");
            Parroquia[2] = new Option("Mesa Bolívar");
            Parroquia[3] = new Option("Mesa de Las Palmas"); 
        }
        if(Municipio[4].selected == true){//Aricagua
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Aricagua");
            Parroquia[2] = new Option("San Antonio");
        }
        if(Municipio[5].selected == true){//Arzobispo Chacón
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Capurí");
            Parroquia[2] = new Option("Chacantá");
            Parroquia[3] = new Option("El Molino");
            Parroquia[4] = new Option("Guaimaral");
            Parroquia[5] = new Option("Mucutuy");
            Parroquia[6] = new Option("Mucuchachí");   
        }
        if(Municipio[6].selected == true){//Campo Elías
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Fernández Peña");
            Parroquia[2] = new Option("Matriz");
            Parroquia[3] = new Option("Montalbán");
            Parroquia[4] = new Option("Acequias");
            Parroquia[5] = new Option("Jají");
            Parroquia[6] = new Option("La Mesa");
            Parroquia[7] = new Option("San José del Sur");     
        }
        if(Municipio[7].selected == true){//Caracciolo Parra Olmedo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tucaní");
            Parroquia[2] = new Option("Florencio Ramírez");    
        }
        if(Municipio[8].selected == true){//Cardenal Quintero
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santo Domingo");
            Parroquia[2] = new Option("Las Piedras");    
        }
        if(Municipio[9].selected == true){//Guaraque
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guaraque");
            Parroquia[2] = new Option("Mesa de Quintero");
            Parroquia[3] = new Option("Río Negro");   
        }
        if(Municipio[10].selected == true){//Julio César Salas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Arapuey");
            Parroquia[2] = new Option("Palmira");     
        }
        if(Municipio[11].selected == true){//Justo Briceño
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Cristóbal de Torondoy");
            Parroquia[2] = new Option("Torondoy");     
        }
        if(Municipio[12].selected == true){//Libertador
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Antonio Spinetti Dini");
            Parroquia[2] = new Option("Arias");
            Parroquia[3] = new Option("Caracciolo Parra Pérez");
            Parroquia[4] = new Option("Domingo Peña");
            Parroquia[5] = new Option("El Llano");
            Parroquia[6] = new Option("Gonzalo Picón Febres");
            Parroquia[7] = new Option("Jacinto Plaza");
            Parroquia[8] = new Option("Juan Rodríguez Suárez");
            Parroquia[9] = new Option("Lasso de la Vega");
            Parroquia[10] = new Option("Mariano Picón Salas");   
            Parroquia[11] = new Option("Milla");  
            Parroquia[12] = new Option("Osuna Rodríguez");  
            Parroquia[13] = new Option("Sagrario");  
            Parroquia[14] = new Option("El Morro");  
            Parroquia[15] = new Option("Los Nevados");  
        }
        if(Municipio[13].selected == true){//Miranda
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Andrés Eloy Blanco");
            Parroquia[2] = new Option("La Venta");
            Parroquia[3] = new Option("Piñango");
            Parroquia[4] = new Option("Timotes");
        }
        if(Municipio[14].selected == true){//Obispo Ramos de Lora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Eloy Paredes");
            Parroquia[2] = new Option("San Rafael de Alcázar");
            Parroquia[3] = new Option("Santa Elena de Arenales");   
        }
        if(Municipio[15].selected == true){//Padre Noguera
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa María de Caparo");     
        }
        if(Municipio[16].selected == true){//Pueblo Llano
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Pueblo Llano");     
        }
        if(Municipio[17].selected == true){//Rangel
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cacute");
            Parroquia[2] = new Option("La Toma");
            Parroquia[3] = new Option("Mucuchíes");
            Parroquia[4] = new Option("Mucurubá");
            Parroquia[5] = new Option("San Rafaelvucrddef");     
        }
        if(Municipio[18].selected == true){//Rivas Dávila
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Gerónimo Maldonado");
            Parroquia[2] = new Option("Bailadores");    
        }
        if(Municipio[19].selected == true){//Santos Marquina
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tabay");    
        }
        if(Municipio[20].selected == true){//Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Chiguará");
            Parroquia[2] = new Option("Estánques");
            Parroquia[3] = new Option("Lagunillas");
            Parroquia[4] = new Option("La Trampa");
            Parroquia[5] = new Option("Pueblo Nuevo del Sur");
            Parroquia[6] = new Option("San Juan");    
        }
        if(Municipio[21].selected == true){//Tovar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Amparo");
            Parroquia[2] = new Option("El Llano");
            Parroquia[3] = new Option("San Francisco");
            Parroquia[4] = new Option("Tovar");    
        }
        if(Municipio[22].selected == true){//Tulio Febres Cordero
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Independencia");
            Parroquia[2] = new Option("María de la Concepción Palacios Blanco");
            Parroquia[3] = new Option("Nueva Bolivia");
            Parroquia[4] = new Option("Santa Apolonia");     
        }
        if(Municipio[23].selected == true){//Zea
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Caño El Tigre");
            Parroquia[2] = new Option("Zea");    
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[15].selected == true){//Miranda
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Acevedo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Aragüita");
            Parroquia[2] = new Option("Arévalo González");
            Parroquia[3] = new Option("Capaya");
            Parroquia[4] = new Option("Caucagua");
            Parroquia[5] = new Option("Panaquire");
            Parroquia[6] = new Option("Ribas");
            Parroquia[7] = new Option("El Café");
            Parroquia[8] = new Option("Marizapa");    
        }
        if(Municipio[2].selected == true){//Andrés Bello
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cumbo");
            Parroquia[2] = new Option("San José de Barlovento");    
        }
        if(Municipio[3].selected == true){//Baruta
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Cafetal");
            Parroquia[2] = new Option("Las Minas");
            Parroquia[3] = new Option("Nuestra Señora del Rosario");     
        }
        if(Municipio[4].selected == true){//Bríon
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Higuerote");
            Parroquia[2] = new Option("Curiepe");
            Parroquia[3] = new Option("Tacarigua de Brión");    
        }
        if(Municipio[5].selected == true){//Buroz
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Mamporal");     
        }
        if(Municipio[6].selected == true){//Carrizal
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Carrizal");    
        }
        if(Municipio[7].selected == true){//Chacao
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Chacao");     
        }
        if(Municipio[8].selected == true){//Cristóbal Rojas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Charallave");
            Parroquia[2] = new Option("Las Brisas");     
        }
        if(Municipio[9].selected == true){//El Hatillo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Hatillo");     
        }
        if(Municipio[10].selected == true){//Guaicaipuro
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Altagracia de la Montaña");
            Parroquia[2] = new Option("Cecilio Acosta");
            Parroquia[3] = new Option("Los Teques");
            Parroquia[4] = new Option("Jarilllo");
            Parroquia[5] = new Option("San Pedro");
            Parroquia[6] = new Option("Tácata");
            Parroquia[7] = new Option("Paracotos");     
        }
        if(Municipio[11].selected == true){//Independencia
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cartanal");
            Parroquia[2] = new Option("Santa Tereza del Tuy");    
        }
        if(Municipio[12].selected == true){//Los Salias
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Antonio de los Altos");    
        }
        if(Municipio[13].selected == true){//Páez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Rio Chico");
            Parroquia[2] = new Option("El Guapo");
            Parroquia[3] = new Option("Tacarigua de la Laguna");
            Parroquia[4] = new Option("Paparo");
            Parroquia[5] = new Option("San Fernado del Guapo");   
        }
        if(Municipio[14].selected == true){//Paz Castillo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Lucía del Tuy");    
        }
        if(Municipio[15].selected == true){//Pedro Gual
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cúpira");
            Parroquia[2] = new Option("Machurucuto");     
        }
        if(Municipio[16].selected == true){//Plaza
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guarenas");     
        }
        if(Municipio[17].selected == true){//Simón Bolívar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Antonio de Yare");
            Parroquia[2] = new Option("San Francisco de Yare");    
        }
        if(Municipio[18].selected == true){//Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Leoncio Martinez");
            Parroquia[2] = new Option("Caucagüita");
            Parroquia[3] = new Option("Filas de Mariche");
            Parroquia[4] = new Option("La Dolorita");
            Parroquia[5] = new Option("Petare");    
        }
        if(Municipio[19].selected == true){//Tomas Lander
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("La Democracia");
            Parroquia[2] = new Option("Ocumare del Tuy");
            Parroquia[3] = new Option("Santa Bárbara");    
        }
        if(Municipio[20].selected == true){//Urdaneta
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cúa");
            Parroquia[2] = new Option("Nueva Cúa");     
        }
        if(Municipio[21].selected == true){//Zamora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guatire");
            Parroquia[2] = new Option("Bolivar");     
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[16].selected == true){//Monagas
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Acosta
            Parroquia[0] = new Option("");
            Parroquia[0] = new Option("San Antonio de Maturín");
            Parroquia[1] = new Option("San Francisco de Maturín");     
        }
        if(Municipio[2].selected == true){//Aguasay
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Aguasay");    
        }
        if(Municipio[3].selected == true){//Bolívar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Caripito");    
        }
        if(Municipio[4].selected == true){//Caripe
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Guácharo");
            Parroquia[2] = new Option("La Guanota");
            Parroquia[3] = new Option("Sabana de Piedra");
            Parroquia[4] = new Option("San Agustín");
            Parroquia[5] = new Option("Teresen");
            Parroquia[6] = new Option("Caripe");    
        }
        if(Municipio[5].selected == true){//Cedeño
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Areo");
            Parroquia[2] = new Option("Capital Cedeño");
            Parroquia[3] = new Option("San Félix de Cantalicio");
            Parroquia[4] = new Option("Viento Fresco");   
        }
        if(Municipio[6].selected == true){//Ezequiel Zamora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Tejero");
            Parroquia[2] = new Option("Punta de Mata");    
        }
        if(Municipio[7].selected == true){//Libertador
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Chaguaramas");
            Parroquia[2] = new Option("Las Alhuacas");
            Parroquia[3] = new Option("Tabasca");
            Parroquia[4] = new Option("Temblador");    
        }
        if(Municipio[8].selected == true){//Maturín
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Alto de los Godos");
            Parroquia[2] = new Option("Boquerón");
            Parroquia[3] = new Option("Las Cocuizas");
            Parroquia[4] = new Option("La Cruz");
            Parroquia[5] = new Option("San Simón");
            Parroquia[6] = new Option("El Corozo");
            Parroquia[7] = new Option("El Furrial");
            Parroquia[8] = new Option("Jusepín");
            Parroquia[9] = new Option("La Pica");
            Parroquia[10] = new Option("San Vicente");     
        }
        if(Municipio[9].selected == true){//Piar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Aparicio");
            Parroquia[2] = new Option("Aragua de Maturín");
            Parroquia[3] = new Option("Chaguamal");
            Parroquia[4] = new Option("El Pinto");
            Parroquia[5] = new Option("Guanaguana");
            Parroquia[6] = new Option("La Toscana");
            Parroquia[7] = new Option("Taguaya");    
        }
        if(Municipio[10].selected == true){//Punceres
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cachipo");
            Parroquia[2] = new Option("Quiriquire");   
        }
        if(Municipio[11].selected == true){//Santa Bárbara
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Bárbara");
            Parroquia[2] = new Option("Morón");    
        }
        if(Municipio[12].selected == true){//Sotillo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Barrancas");
            Parroquia[2] = new Option("Los Barrancos de Fajardo");
        }
        if(Municipio[13].selected == true){//Uracoa
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Uracoa");   
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[17].selected == true){//Nueva Esparta
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Antolín del Campo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Antolín del Campo");    
        }
        if(Municipio[2].selected == true){//Arismendi
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Arismendi");  
        }
        if(Municipio[3].selected == true){//Díaz
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Juan Bautista");
            Parroquia[2] = new Option("Zabala");   
        }
        if(Municipio[4].selected == true){//García
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("García");
            Parroquia[2] = new Option("Francisco Fajardo");    
        }
        if(Municipio[5].selected == true){//Gómez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bolívar");
            Parroquia[2] = new Option("Guevara");
            Parroquia[3] = new Option("Cerro de Matasiete");
            Parroquia[4] = new Option("Santa Ana");
            Parroquia[5] = new Option("Sucre");    
        }
        if(Municipio[6].selected == true){//Maneiro
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Aguirre");
            Parroquia[2] = new Option("Maneiro");    
        }
        if(Municipio[7].selected == true){//Marcano
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Adrián");
            Parroquia[2] = new Option("Juan Griego");    
        }
        if(Municipio[8].selected == true){//Mariño
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Mariño");   
        }
        if(Municipio[9].selected == true){//Península de Macanao
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Francisco de Macanao");
            Parroquia[2] = new Option("Boca de Río");    
        }
        if(Municipio[10].selected == true){//Tubores
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tubores");
            Parroquia[2] = new Option("Los Barales");    
        }
        if(Municipio[11].selected == true){//Villalbal
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Vicente Fuentes");
            Parroquia[2] = new Option("Villalba");   
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[18].selected == true){//Portuguesa
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Agua Blanca
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Agua Blanca");     
        }
        if(Municipio[2].selected == true){//Araure
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Araure");
            Parroquia[2] = new Option("Río Acarigua");
        }
        if(Municipio[3].selected == true){//Esteller
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Píritu");
            Parroquia[2] = new Option("Uveral");     
        }
        if(Municipio[4].selected == true){//Guanare
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cordova");
            Parroquia[2] = new Option("Guanare");
            Parroquia[3] = new Option("San José de la Montaña");
            Parroquia[4] = new Option("San Juan de Guanaguanare");
            Parroquia[5] = new Option("Virgen de Coromoto");   
        }
        if(Municipio[5].selected == true){//Guanarito
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guanarito");
            Parroquia[2] = new Option("Trinidad de la Capilla");
            Parroquia[3] = new Option("Divina Pastora"); 
        }
        if(Municipio[6].selected == true){//Monseñor Jose Vicente de Unda
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Peña Blanca");    
        }
        if(Municipio[7].selected == true){//Ospino
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Aparición");
            Parroquia[2] = new Option("La Estación");
            Parroquia[3] = new Option("Ospino");     
        }
        if(Municipio[8].selected == true){//Páez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Acarigua");
            Parroquia[2] = new Option("Payara");
            Parroquia[3] = new Option("Pimpinela");
            Parroquia[4] = new Option("Ramón Peraza");   
        }
        if(Municipio[9].selected == true){//Papelón
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Caño Delgadito");
            Parroquia[2] = new Option("Papelón");    
        }
        if(Municipio[10].selected == true){//San Genaro de Boconoito
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Antolín Tovar Anquino");
            Parroquia[2] = new Option("Boconoíto");
        }
        if(Municipio[11].selected == true){//San Rafael de Onoto
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Fé");
            Parroquia[2] = new Option("San Rafael de Onoto");
            Parroquia[3] = new Option("Thermo Morales");    
        }
        if(Municipio[12].selected == true){//Santa Rosalía
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Florida");
            Parroquia[2] = new Option("El Playón");   
        }
        if(Municipio[13].selected == true){//Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Biscucuy");
            Parroquia[2] = new Option("Concepción");
            Parroquia[3] = new Option("San José de Saguaz");
            Parroquia[4] = new Option("San Rafael de Palo Alzado");
            Parroquia[5] = new Option("Uvencio Antonio Velásquez");
            Parroquia[6] = new Option("Villa Rosa");    
        }
        if(Municipio[14].selected == true){//Turén
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Villa Bruzual");
            Parroquia[2] = new Option("Canelones");
            Parroquia[3] = new Option("Santa Cruz");
            Parroquia[4] = new Option("San Isidro Labrador");  
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[19].selected == true){//Sucre
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Andrés Eloy Blanco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Mariño");
            Parroquia[2] = new Option("Rómulo Gallegos");     
        }
        if(Municipio[2].selected == true){//Andrés Mata
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San José de Areocuar");
            Parroquia[2] = new Option("Tavera Acosta");   
        }
        if(Municipio[3].selected == true){//Arismendi
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Río Caribe");
            Parroquia[2] = new Option("Antonio José de Sucre");
            Parroquia[3] = new Option("El Morro de Puerto Santo");
            Parroquia[4] = new Option("Puerto Santo");
            Parroquia[5] = new Option("San Juan de las Galdonas");  
        }
        if(Municipio[4].selected == true){//Benítez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Pilar");
            Parroquia[2] = new Option("El Rincón");
            Parroquia[3] = new Option("Francisco Antonio Váquez");
            Parroquia[4] = new Option("Guaraúnos");
            Parroquia[5] = new Option("Tunapuicito");
            Parroquia[6] = new Option("Unión");    
        }
        if(Municipio[5].selected == true){//Bermúdez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Catalina");
            Parroquia[2] = new Option("Santa Rosa");
            Parroquia[3] = new Option("Santa Teresa");
            Parroquia[4] = new Option("Bolívar");
            Parroquia[5] = new Option("Maracapana");    
        }
        if(Municipio[6].selected == true){//Bolívar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Marigüitar");    
        }
        if(Municipio[7].selected == true){//Cajigal
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Libertad");
            Parroquia[2] = new Option("El Paujil");
            Parroquia[3] = new Option("Yaguaraparo");    
        }
        if(Municipio[8].selected == true){//Cruz Salmerón Acosta
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Araya");
            Parroquia[2] = new Option("Chacopata");
            Parroquia[3] = new Option("Manicuare");    
        }
        if(Municipio[9].selected == true){//Libertador
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tunapuy");
            Parroquia[2] = new Option("Campo Elías");   
        }
        if(Municipio[10].selected == true){//Mariño
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Irapa");
            Parroquia[2] = new Option("Campo Claro");
            Parroquia[3] = new Option("Marabal");
            Parroquia[4] = new Option("San Antonio de Irapa");
            Parroquia[5] = new Option("Soro");  
        }
        if(Municipio[11].selected == true){//Mejía
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Antonio del Golfo");    
        }
        if(Municipio[12].selected == true){//Montes
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cumanacoa");
            Parroquia[2] = new Option("Arenas");
            Parroquia[3] = new Option("Aricagua");
            Parroquia[4] = new Option("Cocollar");
            Parroquia[5] = new Option("San Fernando");
            Parroquia[6] = new Option("San Lorenzo");    
        }
        if(Municipio[13].selected == true){//Ribero
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cariaco");
            Parroquia[2] = new Option("Catuaro");
            Parroquia[3] = new Option("Rendón");
            Parroquia[4] = new Option("Santa Cruz");
            Parroquia[5] = new Option("Santa María");    
        }
        if(Municipio[14].selected == true){//Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Altagracia");
            Parroquia[2] = new Option("Santa Inés");
            Parroquia[3] = new Option("Valentín Valiente");
            Parroquia[4] = new Option("Ayacucho");
            Parroquia[5] = new Option("San Juan");
            Parroquia[6] = new Option("Raúl Leoni");
            Parroquia[7] = new Option("Gran Mariscal");    
        }
        if(Municipio[15].selected == true){//Valdez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cristóbal Colón");
            Parroquia[2] = new Option("Bideau");
            Parroquia[3] = new Option("Punta de Piedras");
            Parroquia[4] = new Option("Güiria");     
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[20].selected == true){//Táchira
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Andrés Bello
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cordero");    
        }
        if(Municipio[2].selected == true){//Antonio Rómulo Costa
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Las Mesas");    
        }
        if(Municipio[3].selected == true){//Ayacucho
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[4].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[5].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[6].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[7].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[8].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[9].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[10].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[11].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[12].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[13].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[14].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[15].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[16].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[17].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[18].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[19].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[20].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[21].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[22].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[23].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[24].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[25].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[26].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[27].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[28].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
        if(Municipio[29].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[21].selected == true){//Trujillo
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[22].selected == true){//Vargas
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Caraballeda");
            Parroquia[2] = new Option("Carayaca");
            Parroquia[3] = new Option("Carlos Soublette");
            Parroquia[4] = new Option("Caruao");
            Parroquia[5] = new Option("Catia La Mar");
            Parroquia[6] = new Option("El Junko");
            Parroquia[7] = new Option("La Guaira");
            Parroquia[8] = new Option("Macuto");
            Parroquia[9] = new Option("Maiquetía");
            Parroquia[10] = new Option("Naiguatá");
            Parroquia[11] = new Option("Urimare");     
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[23].selected == true){//Yaracuy
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Aristides Bastidas");     
        }
        if(Municipio[2].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bolivar");
        }
        if(Municipio[3].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Campo Elias");
            Parroquia[2] = new Option("Chivacoa"); 
        }
        if(Municipio[4].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cocorote");
        }
        if(Municipio[5].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Independencia");
        }
        if(Municipio[6].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Jose Antonio Paez");
        }
        if(Municipio[7].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("La Trinidad");
        }
        if(Municipio[8].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Manuel Monge");
        }
        if(Municipio[9].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Nirgua");
            Parroquia[2] = new Option("Salom");
            Parroquia[3] = new Option("Temerla");
        }
        if(Municipio[10].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Andres");
            Parroquia[2] = new Option("Yaritagua");
        }
        if(Municipio[11].selected == true){//San Felipe tiene la posicion 11 en el array del select Municipio en cargarPaciente.php
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Albarico");
            Parroquia[2] = new Option("San Felipe");
            Parroquia[3] = new Option("San Javier");       
        }
        if(Municipio[12].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Sucre");
        }
        if(Municipio[13].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Urachiche");
        }
        if(Municipio[14].selected == true){
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Guayabo");
            Parroquia[2] = new Option("Farriar");
        }
    }

// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------

    if(Estado[24].selected == true){//Zulia
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Almirante Padilla
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Islas de Toas");
            Parroquia[2] = new Option("Monagas");
            Parroquia[3] = new Option("San Fernando");    
        }
        if(Municipio[2].selected == true){//Baralt
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Timoteo");
            Parroquia[2] = new Option("General Urdaneta");
            Parroquia[3] = new Option("Libertador");
            Parroquia[4] = new Option("Marcelino Briceño");
            Parroquia[5] = new Option("Nuevo");
            Parroquia[6] = new Option("Manuel Guanipa Matos");    
        }
        if(Municipio[3].selected == true){//Cabimas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Ambrosio");
            Parroquia[2] = new Option("Carmen Herrera");
            Parroquia[3] = new Option("La Rosa");
            Parroquia[4] = new Option("Germá Ríos Linares");
            Parroquia[5] = new Option("San Benito");
            Parroquia[6] = new Option("Rómulo Betancourt");
            Parroquia[7] = new Option("Jorge Hernández");
            Parroquia[8] = new Option("Punta Gorda");
            Parroquia[9] = new Option("Arístides Calvani");   
        }
        if(Municipio[4].selected == true){//Catatumbo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Encontrados");
            Parroquia[2] = new Option("Udón Pérez");    
        }
        if(Municipio[5].selected == true){//Colón
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Moralito");
            Parroquia[2] = new Option("San Carlos del Zulia");
            Parroquia[3] = new Option("Santa Cruz del Zulia");
            Parroquia[4] = new Option("Santa Barbara");
            Parroquia[5] = new Option("Urribarrí");   
        }
        if(Municipio[6].selected == true){//Francisco Javier Pulgar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Carlos Quevedo");
            Parroquia[2] = new Option("Francsico Javier Pulgar");
            Parroquia[3] = new Option("Simón Rodríguez");
            Parroquia[4] = new Option("Guamo-Gavilanez");    
        }
        if(Municipio[7].selected == true){//Guajira
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Sinamica");
            Parroquia[2] = new Option("Alta Guajira");
            Parroquia[3] = new Option("Elías Sánchez Rubio");
            Parroquia[4] = new Option("Guajira");     
        }
        if(Municipio[8].selected == true){//Jesús María Seprún
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Jesús María Seprún");
            Parroquia[2] = new Option("Barí");     
        }
        if(Municipio[9].selected == true){//La Cañada de Urdanea
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Concepción");
            Parroquia[2] = new Option("Andrés Bello");
            Parroquia[3] = new Option("Chiquinquirá");
            Parroquia[4] = new Option("El Carmelo");
            Parroquia[5] = new Option("Potreritos");    
        }
        if(Municipio[10].selected == true){//Lagunillas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Libertad");
            Parroquia[2] = new Option("Alonso de Ojeda");
            Parroquia[3] = new Option("Venezuela");
            Parroquia[4] = new Option("Eleazar López Contreras");
            Parroquia[5] = new Option("Campo Lara");    
        }
        if(Municipio[11].selected == true){//Lossada
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("La Concepción");
            Parroquia[2] = new Option("San José");
            Parroquia[3] = new Option("Mariano Parra León");
            Parroquia[4] = new Option("José Ramón Yépez");    
        }
        if(Municipio[12].selected == true){//Machiques de Perijá
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bartolomé de las Casas");
            Parroquia[2] = new Option("Libertad");
            Parroquia[3] = new Option("Río Negro");
            Parroquia[4] = new Option("San José de Perijá");     
        }
        if(Municipio[13].selected == true){//Mara
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Rafael");
            Parroquia[2] = new Option("La Sierrita");
            Parroquia[3] = new Option("Las Parcelas");
            Parroquia[4] = new Option("Luis de Vicente");
            Parroquia[5] = new Option("Monseñor Marcos Sergio Godoy");
            Parroquia[6] = new Option("Ricaurte");
            Parroquia[7] = new Option("Tamare");     
        }
        if(Municipio[14].selected == true){//Maracaibo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Antonio Borjas Romero");
            Parroquia[2] = new Option("Bolívar");
            Parroquia[3] = new Option("Cacique Mara");
            Parroquia[4] = new Option("Carracciolo Parra Pérez");
            Parroquia[5] = new Option("Cecilio Acosta");
            Parroquia[6] = new Option("Cristo de Aranza");
            Parroquia[7] = new Option("Coquivacoa");
            Parroquia[8] = new Option("Chiquinquirá");
            Parroquia[9] = new Option("Francisco Eugenio Bustamante");
            Parroquia[10] = new Option("Idelfonzo Vásquez");  
            Parroquia[11] = new Option("Juana de Ávila");
            Parroquia[12] = new Option("Luis Hurtado Higuera");
            Parroquia[13] = new Option("Manuel Dagnino");
            Parroquia[14] = new Option("Olegario Villalobos");
            Parroquia[15] = new Option("Raúl Leoni");
            Parroquia[16] = new Option("Santa Lucía");
            Parroquia[17] = new Option("Venancio Pulgar");
            Parroquia[18] = new Option("San Isidro");  
        }
        if(Municipio[15].selected == true){//Miranda
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Altagracia");
            Parroquia[2] = new Option("Faría");
            Parroquia[3] = new Option("Ana María Campos");
            Parroquia[4] = new Option("San Antonio");
            Parroquia[5] = new Option("San José");    
        }
        if(Municipio[16].selected == true){//Rosario de Perijá
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Donaldo García");
            Parroquia[2] = new Option("El Rosario");
            Parroquia[3] = new Option("Sixto Labrador");   
        }
        if(Municipio[17].selected == true){//San Francisco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Francisco");
            Parroquia[2] = new Option("El Bajo");
            Parroquia[3] = new Option("Domitila Flores");
            Parroquia[4] = new Option("Francisco Ochoa");
            Parroquia[5] = new Option("Los Cortijos");
            Parroquia[6] = new Option("Marcial Hernandez");
            Parroquia[7] = new Option("José Domingo Rus");     
        }
        if(Municipio[18].selected == true){//Santa Rita
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Rita");
            Parroquia[2] = new Option("El Mene");
            Parroquia[3] = new Option("Pedro Lucas Urribarrí");
            Parroquia[4] = new Option("José Cenobio Urribarrí");    
        }
        if(Municipio[19].selected == true){//Simón Bolívar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Rafael María Baralt");
            Parroquia[2] = new Option("Manuel Manrique");
            Parroquia[3] = new Option("Rafael Urdaneta");     
        }
        if(Municipio[20].selected == true){//Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bobures");
            Parroquia[2] = new Option("Gibraltar");
            Parroquia[3] = new Option("Heras");
            Parroquia[4] = new Option("Monseñor Arturo Álvarez");
            Parroquia[5] = new Option("Rómulo Gallegos");
            Parroquia[6] = new Option("El Batey");     
        }
        if(Municipio[21].selected == true){//Valmore Rodríguez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Rafael Urdaneta");
            Parroquia[2] = new Option("La Victoria");
            Parroquia[3] = new Option("Raúl Cuenca");    
        }
    }
}
    
/*


        if(Municipio[].selected == true){//
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("");
            Parroquia[2] = new Option("");
            Parroquia[3] = new Option("");
            Parroquia[4] = new Option("");
            Parroquia[5] = new Option("");
            Parroquia[6] = new Option("");
            Parroquia[7] = new Option("");
            Parroquia[8] = new Option("");
            Parroquia[9] = new Option("");
            Parroquia[10] = new Option("");     
        }

        */