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
//----------------------------------------------------------------------------------------------------------------------------
        function llamar_fechas(){//llamada desde InicioSesion.php
            var aleatorio = parseInt(Math.random()*999999999);
            P=document.getElementById("Calendario_CM2").value;//se inserta la fecha desde InicioSesion.php
            var url="../Fechas_Consultas.php?val_21=" + P + "&r=" + aleatorio;
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_fechas;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_fechas(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById("MostrarFechas").innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }
//---------------------------------------------------------------------------------------------------------------------------       
       function llamar_NumPacientesAutofill(){//lamada desde Citas_2Autofill.php
            var aleatorio = parseInt(Math.random()*999999999);
            M=document.getElementById("Doctor").value;//se inserta el ID_Doctor desde HistoriasClinicas.php y desde
            N=document.getElementById("Calendario").value;//se inserta la fecha desde HistoriasClinicas.php y desde 
            O=document.getElementById('Tur_1').value;//se inserta el ID_Horario desde HistoriasClinicas.php y desde
            var url="../NumPacientes_2.php?val_12=" + M + "&val_13=" + N  + "&val_14=" + O + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_NumPacientesAutofill;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_NumPacientesAutofill(){
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
       function llamar_NumPacientesAutofill_2(){//lamada desde Citas_2Autofill_2.php
            var aleatorio = parseInt(Math.random()*999999999);
            M=document.getElementById("Doctor").value;//se inserta el ID_Doctor desde HistoriasClinicas.php y desde
            N=document.getElementById("Calendario_CM").value;//se inserta la fecha desde HistoriasClinicas.php y desde 
            O=document.getElementById('Tur_1').value;//se inserta el ID_Horario desde HistoriasClinicas.php y desde
            var url="../NumPacientes_2.php?val_12=" + M + "&val_13=" + N  + "&val_14=" + O + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_NumPacientesAutofill_2;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_NumPacientesAutofill_2(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('MostrarPacientes_2').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }     
//------------------------------------------------------------------------------------------------------------------------ 
        function llamar_Cancelar(){//llamada desde Cancelar.html 
            var aleatorio = parseInt(Math.random()*999999999);
            K=document.getElementById("Usuario").value;//se recibe el Nº de cedula desde Cancelar.html
            L=document.getElementById("Password").value;//se recibe la contraseña desde Cancelar.html
            M=document.getElementById("Recordar").checked;//se recibe si se quiere recordar los datos de login desde Cancelar.html
            var url= "Cancelar_AJAX.php?val_11=" + K + "&val_22=" + L + "&val_23=" + M + "&r=" + aleatorio;
            http_request.open('GET',url,true);     
            peticion.onreadystatechange=respuesta_Cancelar;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_Cancelar(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById("Cancelar_5").innerHTML=peticion.responseText;
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        } 
//------------------------------------------------------------------------------------------------------------------------------
        function llamar_Pacientes(){//llamada desde Cancelar.html
            var aleatorio = parseInt(Math.random()*999999999);
            K=document.getElementById("CedulaUsuario").value;//se recibe el Nº de cedula desde Cancelar.html
            L=document.getElementById("Password").value;//se recibe la contraseña desde Cancelar.html
            var url= "Cancelar_AJAX.php?val_11=" + K + "&val_22=" + L + "&r=" + aleatorio;
            http_request.open('GET',url,true);     
            peticion.onreadystatechange=respuesta_Pacientes;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_Pacientes(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById("Cancelar_6").innerHTML=peticion.responseText;
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        } 
//------------------------------------------------------------------------------------------------------------------------------
function llamar_DoctorReserva(){//lamada desde Citas_2Autofill.php, desde HistoriasClinicas.php y desde agendarCita.php
            var aleatorio = parseInt(Math.random()*999999999);
            M=document.getElementById("Doctor").value;//se inserta el ID_Doctor desde HistoriasClinicas.php y desde
            N=document.getElementById("Calendario_CM").value;//se inserta la fecha desde HistoriasClinicas.php y desde 
            O=document.getElementById('Tur_1').value;//se inserta el ID_Horario desde HistoriasClinicas.php y desde
            var url="doctorReservacion.php?val_12=" + M + "&val_13=" + N  + "&val_14=" + O + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_DoctorReserva;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_DoctorReserva(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('MostrarPacientes').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  

//------------------------------------------------------------------------------------------------------------------------------
function llamar_buscador(){//se insertan los valores desde RegistroPacientes.php
            var aleatorio = parseInt(Math.random()*999999999);
            BB=document.getElementById("Diagnostico").value;
            CC=document.getElementById("Estado").value;
            DD=document.getElementById("Municipio").value;
            EE=document.getElementById("Parroquia").value;
            FF=document.getElementById("Edad").value;
            GG=document.getElementById("Sexo").value;
            HH=document.getElementById("Mes").value;
            II=document.getElementById("Especialista").value;

            var url="../buscador/buscadorMorbilidad.php?val_31=" + BB + "&val_32=" + CC  + "&val_33=" + DD + "&val_34=" + EE + "&val_35=" + FF + "&val_36=" + GG + "&val_37=" + HH + "&val_38=" + II +  "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_buscador;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_buscador(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('carga').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  

//------------------------------------------------------------------------------------------------------------------------------
function llamar_calculaEdad(){//lamada desde cargarPaciente.php      
            var aleatorio = parseInt(Math.random()*999999999);
            M=document.getElementById("FechaNacimientoPaciente").value;//se inserta 
            var url="calculoEdad.php?val_12=" + M +  "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_calculaEdad;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_calculaEdad(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('Edad').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  
//---------------------------------------------------------------------------------------------------------------------------
function llamar_calculaEdad_2(){//llamada desde actualizarDatos.php
            var aleatorio = parseInt(Math.random()*999999999);
            M=document.getElementById("FechaNacimientoPaciente").value; 
            var url="calculoEdad.php?val_12=" + M  + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_calculaEdad_2;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_calculaEdad_2(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('Edad').innerHTML=peticion.responseText;
                } 
                else{
                    alert('Hubo problemas con la función llamar_calculaEdad_2()');
                }
            }
        }  
//---------------------------------------------------------------------------------------------------------------------------
function llamar_cargarMedicamento(){//lamada desde  cargarMedicam.php
            var aleatorio = parseInt(Math.random()*999999999);
            A=document.getElementById("Nombre").value;
            B=document.getElementById("Principio").value;
            C=document.getElementById("Presentacion").value; 
            D=document.getElementById("Especificacion").value;  
            var url="recibeCargaMedicamento.php?val_1=" + A + "&val_2=" + B + "&val_3=" + C + "&val_4=" + D + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_cargarMedicamento;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_cargarMedicamento(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('reemplaza_tabla').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  
//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------
function llamar_Valor_AB(){//lamada desde  CambiarClave.php
            var aleatorio = parseInt(Math.random()*999999999);
            A=document.getElementById("Valor_A").value;
            B=document.getElementById("Valor_B").value;  
            var url="verificaValor_AB.php?val_1=" + A + "&val_2=" + B + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_Valor_AB;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_Valor_AB(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('RespuestaAjax').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  
//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------
        function llamar_calendario_1(){//Función llamada desde Citas_2Autofill.php
            var aleatorio = parseInt(Math.random()*999999999);
            A="Enero";  
            var url="../Calendarios.php?val_1=" + A  +  "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_calendario_1;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_calendario_1(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('RespuestaCalendario_1').innerHTML=peticion.responseText;
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }
//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------
        function llamar_calendario_2(){//Función llamada desde Citas_2Autofill.php
            var aleatorio = parseInt(Math.random()*999999999);
            A="Febrero";  
            var url="../Calendarios.php?val_1=" + A  +  "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_calendario_2;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_calendario_2(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('RespuestaCalendario_2').innerHTML=peticion.responseText;
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  