//Buscar por nombre, pacientes registrados con un doctor desde RegistroPacientes_Basico.php
    function llamar_Nombre(nombre){

        var divContenedor= document.getElementById("carga_2");//se recibe desde RegistroPacientes_Basico.php
           var xmlhttp;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                xmlhttp = new XMLHttpRequest();
            } else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            
            if (!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
           /* else{
                alert("Instancia creada exitosamente ok");
            }*/     
        
        AA=document.getElementById("Especialista").value;//se recibe desde ReistroPacientes_Basico.php
        if(nombre.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML="";
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status ===200){
                    divContenedor.innerHTML = xmlhttp.responseText;
                }                   
            }
            xmlhttp.open("GET","../buscador/buscarNombre.php?nombre=" + nombre + "&val_21=" + AA,true);//se envia la informacion cargada en el input al servidor, true significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send();
        }
    }

//----------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------

//Buscador por apellido, pacientes registrados con un doctor desde RegistroPacientes_Basico.php
function llamar_Apellido(apellido){
    var divContenedor= document.getElementById("carga_2");
           var xmlhttp;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                xmlhttp = new XMLHttpRequest();
            } else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            
            if (!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
            /*else{
                alert("Instancia creada exitosamente ok");
            } */ 

        BB=document.getElementById("Especialista").value;
          if(apellido.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML="";
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status ===200){
                    divContenedor.innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","../buscador/buscarApellido.php?apellido=" + apellido + "&val_22=" + BB,true);//se envia la informacion cargada en el input al servidor, true significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send();
        }
}

//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------

//Valida que no exista un numero de cedula repatido en la BD, desde registroPaciente.php
function llamar_validarCedula(cedula){
    var divConten= document.getElementById("CedulaPaciente");
           var xmlhttp;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                xmlhttp = new XMLHttpRequest();
            } else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            
            if (!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
            /*else{
                alert("Instancia creada exitosamente ok");
            } */ 

          if(cedula.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divConten.value="";
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status ===200 && xmlhttp.responseText=="Ya existe"){
                    divConten.value = xmlhttp.responseText;
                    divConten.style.backgroundColor = "red";
                }
            }
            xmlhttp.open("GET","../buscador/buscarCedulaRep.php?cedula=" + cedula,true);//se envia la informacion cargada en el input al servidor, true significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send();
        }
}

//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------

//Valida que no exista un numero de cedula repatido en la BD, desde registroPaciente.php
function llamar_validarCorreo(correo){
    var divContenedor= document.getElementById("Correo");
           var xmlhttp;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                xmlhttp = new XMLHttpRequest();
            } else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            
            if (!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
            /*else{
                alert("Instancia creada exitosamente ok");
            } */ 

          if(correo.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.value="";
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status ===200 && xmlhttp.responseText=="Ya existe"){
                    divContenedor.value = xmlhttp.responseText;
                    divContenedor.style.backgroundColor = "red";
                }
            }
            xmlhttp.open("GET","../buscador/buscarCorreo.php?correo=" + correo,true);//se envia la informacion cargada en el input al servidor, true significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send();
        }
}

//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------

//Busca por cedula pacientes registrados con un doctor desde RegistroPacientes_Xxxxxxx.php
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
           /* else{
                alert("Instancia creada exitosamente ok");
            }*/
           return http_request;
        } 

        function llamar_Cedula(){//se insertan los valores desde RegistroPacientes_Basico.php
            var aleatorio = parseInt(Math.random()*999999999);
            AA=document.getElementById("Cedula").value;
            BB=document.getElementById("Especialista").value;

            var url="../buscador/buscarCedula.php?val_20=" + AA +  "&val_21=" + BB + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_Cedula;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
        function respuesta_Cedula(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('carga_2').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  

//----------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------

//Buscar por nombre, pacientes que han solicitado cita desde InicioSesion_basico.php
         function llamar_CitaNombre(nombre){

        var divContenedor= document.getElementById("carga_3");
           var xmlhttp;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                xmlhttp = new XMLHttpRequest();
            } else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            
            if (!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          /*  else{
                alert("Instancia creada exitosamente");
            }     */
        
        AA=document.getElementById("Especialista").value;//se recibe desde ReistroPacientes.php
        if(nombre.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML="";
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status ===200){
                    divContenedor.innerHTML = xmlhttp.responseText;
                }                   
            }
            xmlhttp.open("GET","../buscador/buscarCitaNombre.php?nombre=" + nombre + "&val_21=" + AA,true);//se envia la informacion cargada en el input al servidor, true significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send();
        }
}

//----------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------
//Buscador por apellido, pacientes con citas en InicioSesion_Basico.php
function llamar_CitaApellido(apellido){
    var divContenedor= document.getElementById("carga_3");
           var xmlhttp;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                xmlhttp = new XMLHttpRequest();
            } else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            
            if (!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          /*  else{
                alert("Instancia creada exitosamente ok");
            } */

        BB=document.getElementById("Especialista").value;
          if(apellido.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML="";
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status ===200){
                    divContenedor.innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","../buscador/buscarCitaApellido.php?apellido=" + apellido + "&val_22=" + BB,true);//se envia la informacion cargada en el input al servidor, true significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send();
        }
}

//----------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------
//Buscador por cedula, pacientes con citas en InicioSesion_Xxxxxx.php
function llamar_CitaCedula(){//se insertan los valores desde RegistroPacientes.php
            var aleatorio = parseInt(Math.random()*999999999);
            AA=document.getElementById("Cedula").value;
            BB=document.getElementById("Especialista").value;

            var url="../buscador/buscarCitaCedula.php?val_20=" + AA +  "&val_21=" + BB + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_CitaCedula;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
function respuesta_CitaCedula(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('carga_3').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  

//----------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------
//Buscador de material medico quirurgico, pacientes con citas en InicioSesion_Basico.php
function llamar_Quirurgico(){//se insertan los valores desde pacient_quirurgico.php
            var aleatorio = parseInt(Math.random()*999999999);
            AA=document.getElementById("Quirurgico").value;

            var url="../buscador/buscarQuirurgico.php?val_1=" + AA + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = respuesta_Quirurgico;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
function respuesta_Quirurgico(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('carga_4').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  

//----------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------

//Buscar por nombre, medicamentos cargados en pacient_medicam.php
         function llamar_SolicitadosNombre(nombre){

        var divContenedor= document.getElementById("carga_4");//se recibe desde pacient_medicament.php
           var xmlhttp;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                xmlhttp = new XMLHttpRequest();
            } else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            
            if (!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          /*  else{
                alert("Instancia creada exitosamente");
            }     */
        
        AA=document.getElementById("MarcaParaAjax").value;//se recibe desde pacient_medicament.php
        if(nombre.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML="";
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status ===200){
                    divContenedor.innerHTML = xmlhttp.responseText;
                }                   
            }
            xmlhttp.open("GET","../buscador/buscarSolicitadosNombre.php?nombre=" + nombre + "&val_21=" + AA,true);//se envia la informacion cargada en el input al servidor, true significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send();
        }
}

//----------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------
//Buscar por principio activo, medicamentos cargados en pacient_medicam.php
         function llamar_SolicitadosPrincipio(principio){

        var divContenedor= document.getElementById("carga_4");//se recibe desde pacient_medicament.php
           var xmlhttp;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                xmlhttp = new XMLHttpRequest();
            } else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            
            if (!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          /*  else{
                alert("Instancia creada exitosamente");
            }     */
        
        AA=document.getElementById("MarcaParaAjax").value;//se recibe desde pacient_medicament.php
        if(principio.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML="";
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status ===200){
                    divContenedor.innerHTML = xmlhttp.responseText;
                }                   
            }
            xmlhttp.open("GET","../buscador/buscarSolicitadosPrincipio.php?principio=" + principio + "&val_21=" + AA,true);//se envia la informacion cargada en el input al servidor, true significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send();
        }
}

//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//Buscar por nombre, medicamentos ofertados 
         function llamar_OfertadosNombre(nombre){

        var divContenedor= document.getElementById("carga_4");//se recibe desde pacient_medicament.php
           var xmlhttp;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                xmlhttp = new XMLHttpRequest();
            } else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            
            if (!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          /*  else{
                alert("Instancia creada exitosamente");
            }     */
        
        AA=document.getElementById("MarcaParaAjax").value;//se recibe desde pacient_medicament.php
        if(nombre.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML="";
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status ===200){
                    divContenedor.innerHTML = xmlhttp.responseText;
                }                   
            }
            xmlhttp.open("GET","../buscador/buscarOfertadosNombre.php?nombre=" + nombre + "&val_21=" + AA,true);//se envia la informacion cargada en el input al servidor, true significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send();
        }
}

//-----------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------
//Buscar por principio activo, medicamentos ofertados
         function llamar_OfertadosPrincipio(principio){

        var divContenedor= document.getElementById("carga_4");//se recibe desde pacient_medicament.php
           var xmlhttp;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                xmlhttp = new XMLHttpRequest();
            } else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            
            if (!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          /*  else{
                alert("Instancia creada exitosamente");
            }     */
        
        AA=document.getElementById("MarcaParaAjax").value;//se recibe desde pacient_medicament.php
        if(principio.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML="";
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status ===200){
                    divContenedor.innerHTML = xmlhttp.responseText;
                }                   
            }
            xmlhttp.open("GET","../buscador/buscarOfertadosPrincipio.php?principio=" + principio + "&val_21=" + AA,true);//se envia la informacion cargada en el input al servidor, true significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send();
        }
}

//----------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------

//Buscador todos los medicamentos solicitados
function llamar_todosMedicamentoSolicitado(){
            var aleatorio = parseInt(Math.random()*999999999);
            AA= "MarcaParaAjax";

            var url="../buscador/buscarTodosMedicamSolicitados.php?val_20=" + AA + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = llamar_respuesta_todosMedicamentoSolicitado;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
function llamar_respuesta_todosMedicamentoSolicitado(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('carga_4').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  

//----------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------
//Buscador todos los medicamentos, pacientes con citas en pacient_medicam.php   medicamentosBuscar.php
function llamar_todosMedicamentoOfertado(){
            var aleatorio = parseInt(Math.random()*999999999);
            AA=document.getElementById("MarcaParaAjax").value;

            var url="../buscador/buscarTodosMedicamOfertados.php?val_20=" + AA + "&r=" + aleatorio;    
            http_request.open('GET',url,true);     
            peticion.onreadystatechange = llamar_respuesta_todosMedicamentoOfertado;
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
            peticion.send("null");
        }                                                           
function llamar_respuesta_todosMedicamentoOfertado(){
            if (peticion.readyState == 4){
                if (peticion.status == 200){
                   document.getElementById('carga_4').innerHTML=peticion.responseText;//se recoje el numero de pacientes
                } 
                else{
                    alert('Hubo problemas con la petición.');
                }
            }
        }  

//----------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------