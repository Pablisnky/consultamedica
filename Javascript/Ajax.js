        var http_request = false;
        var peticion= conexionAJAX();

         function conexionAJAX(){
            http_request = false;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                http_request = new XMLHttpRequest();
                if (http_request.overrideMimeType){
                    http_request.overrideMimeType('text/xml');
                }
            } else if (window.ActiveXObject){ // IE
                try {
                    http_request = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e){
                    try{
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {}
                }
            }
            if (!http_request){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          	/*else{
                alert("Instancia creada exitosamente ok");
            }*/
           return http_request;
        } 
//--------------------------------------------------------------------------------------------------------------------
        function llamar_Ciudades(){
            var aleatorio = parseInt(Math.random()*999999999);
            E=document.getElementById("Especialidad").value;//se inserta el ID_Especialidad desde Citas.php
            var url="Seleccion_Ciudad.php?val_5=" + E  + "&r=" + aleatorio;
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_Ciudades;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_Ciudades(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('MostrarCiudad').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }
//------------------------------------------------------------------------------------------------------------------------ 
        function llamar_especialista(){ 
            var aleatorio = parseInt(Math.random()*999999999);
            A=document.getElementById("Especialidad").value;//se inserta el ID_Especialidad que se encuentra en Citas_2.php
            F=document.getElementById("Captura_2").value; //se inserta el ID_Ciudad que se encuentra en Seleccion_Ciudad.php
            var url="Especialistas_AJAX.php?val_1=" + A + "&val_6=" + F + "&r=" + aleatorio;
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_especialista;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }		
        function respuesta_especialista(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                    document.getElementById('MostrarDoctor').innerHTML=peticion.responseText;//se recoje el nombre y apellido del doctor.
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        } 
//---------------------------------------------------------------------------------------------------------------------- 
        function llamar_PrecioConsulta(){
            var aleatorio = parseInt(Math.random()*999999999);
            H=document.getElementById("Captura").value;//se inserta el ID_Doctor desde Especialistas_AJAX.php
            var url="Precio_Consulta.php?val_8=" + H  + "&r=" + aleatorio;
            http_request.open('GET',url,false);     
            peticion.onreadystatechange = respuesta_PrecioConsulta;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_PrecioConsulta(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('MostrarSalario').innerHTML=peticion.responseText;
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }
//------------------------------------------------------------------------------------------------------------------------ 
        function llamar_mostrarHorarios(){
            var aleatorio = parseInt(Math.random()*999999999);
            B=document.getElementById("Captura").value;//se inserta el ID_Doctor desde Especialistas_AJAX.php
            var url="Horario_Consulta_AJAX.php?val_2=" + B + "&r=" + aleatorio;
            http_request.open('GET',url,false);//False, porque esta funcion se llama junto a "llamar_PrecioConsulta"   
            peticion.onreadystatechange = respuesta_mostrarHorarios;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }															
        function respuesta_mostrarHorarios(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                    document.getElementById('MostrarHorarios').innerHTML=peticion.responseText;//se recoje el horario del doctor
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        } 
//------------------------------------------------------------------------------------------------------------------------ 
        function llamar_mostrarDireccion(){
            var aleatorio = parseInt(Math.random()*999999999);
            J=document.getElementById("Captura").value;//se inserta el ID_Doctor desde Especialistas_AJAX.php
            var url="Direccion_Consulta_AJAX.php?val_10=" + J + "&r=" + aleatorio;
            http_request.open('GET',url,false);//False, porque esta funcion se llama junto a "llamar_PrecioConsulta" desde Especialistas_AJAX.php  
            peticion.onreadystatechange = respuesta_mostrarDireccion;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_mostrarDireccion(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                    document.getElementById('MostrarDireccion').innerHTML=peticion.responseText;//se recoje el horario del doctor
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        } 
//------------------------------------------------------------------------------------------------------------------------ 
        function llamar_Turno(){//se llama desde Especialistas_AJAX.php
            var aleatorio = parseInt(Math.random()*999999999);
            I=document.getElementById("Captura").value;//se inserta el ID_Doctor desde Especialistas_AJAX.php
            var url="Seleccion_Turno.php?val_9=" + I + "&r=" + aleatorio;
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_Turno;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_Turno(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('MostrarTurno').innerHTML=peticion.responseText;//se recoje el 
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  
//------------------------------------------------------------------------------------------------------------------------  
        function llamar_NumPacientes(){//aplica para Citas_2.php
            var aleatorio = parseInt(Math.random()*999999999);
            C=document.getElementById("Captura").value;//se inserta el ID_Doctor desde Especialistas_AJAX.php
            D=document.getElementById("Calendario_CM").value;//se inserta la fecha desde Citas_2.php
            G=document.getElementById('tur').value;//se inserta el ID_Horario desde Seleccion_Turno.php
            var url="NumPacientes.php?val_3=" + C + "&val_4=" + D  + "&val_7=" + G + "&r=" + aleatorio;
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_NumPacientes;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_NumPacientes(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('MostrarPacientes').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }       

//------------------------------------------------------------------------------------------------------------------------  
        function llamar_guardarCampo1(){
            var aleatorio = parseInt(Math.random()*999999999);
            A=document.getElementById("Motivo").value;//se inserta el motivo de la consulta desde diagnostico_Basico_2.php
            B=document.getElementById("ID_Doctor").value;//se inserta ID_Doctor desde diagnostico_Basico_2.php
            C=document.getElementById('Cedula_Paciente').value;//se inserta la cedula desde diagnostico_Basico_2.php
            var url="GuardarCampo_Motivo.php?val_1=" + A + "&val_2=" + B  + "&val_3=" + C + "&r=" + aleatorio;
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_guardarCampo1;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_guardarCampo1(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('recibeMotivo').innerHTML=peticion.responseText;//se recoje el
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  