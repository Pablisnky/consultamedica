
function autofocusCancelar(){//La función autofocusCancelar Se encuentra en Cancelar.html
        document.getElementById("CedulaUsuario").focus();
}

//---------------------------------------------------------------------------------------------------------------------
/*Validar formulario contactenos en contactenos.php*/
function validar_01(){
    var nombre = document.Contacto.nombre;
    var apellido = document.Contacto.apellido;
    var correo= document.Contacto.correo;
    var asunto= document.Contacto.asunto;
    var contenido = document.Contacto.contenido;

    if(nombre.value =="" || nombre.value.indexOf(" ") == 0 || (isNaN(nombre.value)==false)  || nombre.value.length>13){
        alert ("Indique su nombre");
        document.getElementById("Nombre").value = "";
        document.getElementById("Nombre").focus();
       return false;
    }
    else if(apellido.value =="" || apellido.value.indexOf(" ") == 0 || (isNaN(apellido.value)==false) || apellido.value.length>13){
       alert ("Indique su apellido");
       document.getElementById("Apellido").value = "";
       document.getElementById("Apellido").focus();
       return false;
    }
    else if(correo.value =="" || correo.value.indexOf(" ") == 0 || (isNaN(correo.value)==false) || correo.value.length>40){
        alert ("Indique su correo");
        document.getElementById("Correo").value = "";
        document.getElementById("Correo").focus();
       return false;
    }
    else if(asunto.value =="" || asunto.value.indexOf(" ") == 0 || (isNaN(asunto.value)==false) || asunto.value.length>20){
       alert ("Indique el asunto");
       document.getElementById("Asunto").value = "";
       document.getElementById("Asunto").focus();
       return false;
    }
    else if(contenido.value =="" || contenido.value.indexOf(" ") == 0 || (isNaN(contenido.value)==false) || contenido.value.length>1000){
       alert ("El contenido esta vacio o demasiado largo");
       document.getElementById("Contenido").value = "";
       document.getElementById("Contenido").focus();
       return false;
    }
}


//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar formulario solicitud cita en  citas_2Autofill.php    citas_2Autofill_2.php
function validar_02(){
    var nombre = document.getElementById("Nombre");
    var apellido = document.getElementById("Apellido"); 
    var cedula= document.getElementById("Cedula");
    var edad= document.getElementById("Edad");
    var telefono = document.getElementById("Telefono");
    var NumeroCedula = /^([7-8])*$/;

    if(nombre.value =="" || nombre.value.indexOf(" ") == 0 || (isNaN(nombre.value)==false)  || nombre.value.length>13){
        alert ("Indique su nombre");
        document.getElementById("Nombre").value = "";
        document.getElementById("Nombre").focus();
       return false;
    }
    else if(apellido.value =="" || apellido.value.indexOf(" ") == 0 || (isNaN(apellido.value)==false) || apellido.value.length>13){
       alert ("Indique su apellido");
       document.getElementById("Apellido").value = "";
       document.getElementById("Apellido").focus();
       return false;
    }
    else if(cedula.value =="" || cedula.value.indexOf(" ") == 0 || (isNaN(cedula.value)) || NumeroCedula.exec(cedula) || cedula.value<2000000 || cedula.value>99999999){
        alert ("Indique su cedula");
        document.getElementById("Cedula").value = "";
        document.getElementById("Cedula").focus();
       return false;
    }
    else if(edad.value =="" || edad.value.indexOf(" ") == 0 || (isNaN(edad.value)) || edad.value.length!=2){
       alert ("Indique su edad");
       document.getElementById("Edad").value = "";
       document.getElementById('Edad').focus();
       return false;
    }
    else if(telefono.value =="" || telefono.value.indexOf(" ") == 0){
       alert ("Indique su telefono");
       document.getElementById("Telefono").value = "";
       //document.getElementById("Telefono").focus();
       return false;
    }
}


//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//validar formulario cancelar cita en Cancelar.html
function validarCancelar_03(){
    var nombre = document.Cancelar.nombre;
    var apellido = document.Cancelar.apellido;
    var cedula= document.Cancelar.cedula;
    var correo= document.Cancelar.correo;
    var passwword = document.Cancelar.password;

    if(nombre.value =="" || nombre.value.indexOf(" ") == 0 || (isNaN(nombre.value)==false)  || nombre.value.length>15){
        alert ("Indique su nombre");
        document.getElementById("Nombre").value = "";
        document.getElementById("Nombre").focus();
       return false;
    }
    else if(apellido.value =="" || apellido.value.indexOf(" ") == 0 || (isNaN(apellido.value)==false) || apellido.value.length>15){
       alert ("Indique su apellido");
       document.getElementById("Apellido").value = "";
       document.getElementById("Apellido").focus();
       return false;
    }
    else if(cedula.value =="" || cedula.value.indexOf(" ") == 0 || (isNaN(cedula.value)) || cedula.value.length!=8){
        alert ("Indique su cedula");
        document.getElementById("Cedula").value = "";
        document.getElementById("Cedula").focus();
       return false;
    }
    else if(correo.value =="" || correo.value.indexOf(" ") == 0 || correo.value.length>20){
       alert ("Indique su correo");
       document.getElementById("Correo").value = "";
       document.getElementById("Correo").focus();
       return false;
    }
    else if(password.value =="" || password.value.indexOf(" ") == 0 || password.value.length>10){
        alert ("Indique su password");
        document.getElementById("Cedula").value = "";
        document.getElementById("Cedula").focus();
       return false;
    }
}


//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar formulario registroEspecialista.php 
function validar_04(){
    var nombre = document.getElementById("Nombre");
    var apellido = document.getElementById("Apellido"); 
    var cedula= document.getElementById("Cedula");
    var correo= document.getElementById("Correo");
    var licencia= document.getElementById("Registro");
    var afiliacion= document.getElementById("Afiliacion_3");
    var especialidad= document.getElementById("Especialidad");
    var especialidad_2= document.getElementById("Especialidad_2");
    var estado= document.getElementById("Estado");
    var ciudad= document.getElementById("Ciudad");

    if(nombre.value =="" || nombre.value.indexOf(" ") == 0 || (isNaN(nombre.value)==false)  || nombre.value.length>20){
        alert ("Indique su nombre");
        document.getElementById("Nombre").value = "";
        document.getElementById("Nombre").focus();
       return false;
    }
    else if(apellido.value =="" || apellido.value.indexOf(" ") == 0 || (isNaN(apellido.value)==false) || apellido.value.length>20){
       alert ("Indique su apellido");
       document.getElementById("Apellido").value = "";
       document.getElementById("Apellido").focus();
       return false;
    }
    else if(cedula.value =="" || cedula.value.indexOf(" ") == 0 || (isNaN(cedula.value)) || cedula.value<2000000 || cedula.value>99999999){
        alert ("Indique su cedula");
        document.getElementById("Cedula").value = "";
        document.getElementById("Cedula").focus();
       return false;
    }
    else if(correo.value =="" || correo.value.indexOf(" ") == 0 || correo.value.length>40){
       alert ("Correo no validossss");
       document.getElementById("Correo").value = "";
       document.getElementById("Correo").style.backgroundColor="red";
       return false;
    }
    else if(licencia.value =="" || licencia.value.indexOf(" ") == 0 || licencia.value.length>15){
       alert ("Indique su licencia");
       document.getElementById("Registro").value = "";
       document.getElementById("Registro").focus();
       return false;
    }
    else if(afiliacion.value =="" || afiliacion.value == null || afiliacion == 0){
       alert ("Indique su plan de afiliacion");
       document.getElementById("Afiliacion_3").value = "";
       document.getElementById("Afiliacion_3").focus();
       return false;
    }  
    else if(especialidad.value == null || especialidad == 0){
       alert ("Indique su especialidad");
       document.getElementById("Especialidad").value = "";
       document.getElementById("Especialidad").focus();
       return false;
    }    
    else if(especialidad.value =="" && especialidad_2.value ==""){
       alert ("Indique su especialidad");
       document.getElementById("Especialidad").value = "";
       document.getElementById("Especialidad").focus();
       return false;
    }
    else if(estado.value =="" || estado.value == null || estado == 0){
       alert ("Indique su estado");
       document.getElementById("Estado").value = "";
       document.getElementById("Estado").focus();
       return false;
    }
    else if(ciudad.value =="" || ciudad.value.indexOf(" ") == 0 || (isNaN(ciudad.value)==false) || ciudad.value.length>20){
       alert ("Indique su ciudad");
       document.getElementById("Ciudad").value = "";
       document.getElementById("Ciudad").focus();
       return false;
    }
}
  function validarFormatocorreo(){ 
        campo = event.target;
        var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if (emailRegex.test(campo.value)) {      
            return true;
        } 
        else{
            alert("Correo con formato no valido");      
            document.getElementById("Correo").style.backgroundColor="red"; 
            document.getElementById("Correo").value = "";
        }
    }

 function limpiarColor(){    
    document.getElementById("Correo").style.backgroundColor="white";
 }


 
//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar formulario que registra datos de usuarios pidiendo medicamentos en pedidosProveedores_Basico.php
function validar_05(){
    var nombreCliente = document.getElementById("Nombre_Cliente");
    var apellidoCliente = document.getElementById("Apellido_Cliente"); 
    var telefonoCliente= document.getElementById("Telefono_Cliente");
    var correoCliente= document.getElementById("Correo_Cliente");
    var estadoCliente = document.getElementById("Estado_Cliente");

    if(nombreCliente.value =="" || nombreCliente.value.indexOf(" ") == 0 || (isNaN(nombreCliente.value)==false)  || nombreCliente.value.length>20){
        alert ("Indique su nombre");
        document.getElementById("Nombre_Cliente").value = "";
        document.getElementById("Nombre_Cliente").focus();
       return false;
    }
    else if(apellidoCliente.value =="" || apellidoCliente.value.indexOf(" ") == 0 || (isNaN(apellidoCliente.value)==false) || apellidoCliente.value.length>20){
       alert ("Indique su apellido");
       document.getElementById("Apellido_Cliente").value = "";
       document.getElementById("Apellido_Cliente").focus();
       return false;
    }
    else if(telefonoCliente.value =="" || telefonoCliente.value.indexOf(" ") == 0 || (isNaN(telefonoCliente.value))){
        alert ("Indique su telefono");
        document.getElementById("Telefono_Cliente").value = "";
        document.getElementById("Telefono_Cliente").focus();
       return false;
    }
    else if(correoCliente.value =="" || correoCliente.value.indexOf(" ") == 0){
       alert ("Indique el correo");
       document.getElementById("Correo_Cliente").value = "";
       document.getElementById("Correo_Cliente").focus();
       return false;
    }
    else if(estadoCliente.value =="" || estadoCliente.value == null || estadoCliente == 0){
       alert ("Indique su estado");
       document.getElementById("Estado_Cliente").value = "";
       document.getElementById("Estado_Cliente").focus();
       return false;
    }
}

//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar formulario solicitud cita en HistoriasClinicas.php
function validar_06(){
  var fecha= document.getElementById("Calendario_CM");
  var turno= document.getElementById("Tur_1");
  
  if(fecha.value =="" || fecha.value.indexOf(" ") == 0 ){
        alert ("Indique la fecha");
        document.getElementById("Calendario_CM").value = "";
        document.getElementById("Calendario_CM").focus();
       return false;
    }

  if(turno.value =="" || turno.value.indexOf(" ") == 0 || turno.value == 0 || turno.value =="Seleccion Turno" ){//no funciona
        alert ("Indique el turno");
        document.getElementById("turno").value = "";
        document.getElementById("turno").focus();
       return false;
    }
}


//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar formulario solicitud cita en citas_2Autofill_2.php
function validar_07(){
    var calendario = document.getElementById("Calendario_CM");
    var turno = document.getElementById("Tur_1"); 

    if(calendario.value ==""){
        alert ("Indique una fecha");
        document.getElementById("Calendario_CM").value = "";
        document.getElementById("Calendario_CM").focus();
       return false;
    }
    else if(turno.value ==""){
       alert ("Seleccione un turno");
       document.getElementById("Tur_1").value = "";
       document.getElementById("Tur_1").focus();
       return false;
    }
}


//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar formulario de nuevo paciente en cargarPaciente_Xxxxxxxx.php
function validar_08(){
    var nombre = document.getElementById("NombrePaciente");
    var apellido = document.getElementById("ApellidoPaciente"); 
    var cedula= document.getElementById("CedulaPaciente");
    var telefono= document.getElementById("TelefonoPaciente");
    var fechaNac = document.getElementById("FechaNacimientoPaciente"); 
    var nacionalidad= document.getElementById("NacionalidadPaciente");
    var estadoCivil = document.getElementById("EstadoCivilPaciente");   
    var grupoSanguineo = document.getElementById("Sangre");
    var sexo= document.getElementById("SexoPaciente");
    var instruccion= document.getElementById("GradoInstruccion");
    var ocupacion = document.getElementById("Ocupacion");
    var religion = document.getElementById("Religion");
    var correo = document.getElementById("Correo");
    var estado_Res = document.getElementById("Estado_Res");
    var municipio_Res = document.getElementById("Municipio_Res");
    var parroquia_Res = document.getElementById("Parroquia_Res");
    var estado_Nac = document.getElementById("Estado_Nac");
    var municipo_Nac = document.getElementById("Municipio_Nac");
    var parroquia_Nac = document.getElementById("parroquia_Nac");
    var Direccion_Act = document.getElementById("Direccion");
    var emergencia = document.getElementById("Emergencia");


      if(nombre.value =="" || nombre.value.indexOf(" ") == 0 || (isNaN(nombre.value)==false)  || nombre.value.length>13){
          alert ("Indique nombre");
          document.getElementById("NombrePaciente").value = "";
          document.getElementById("NombrePaciente").focus();
         return false;
      }
      else if(apellido.value =="" || apellido.value.indexOf(" ") == 0 || (isNaN(apellido.value)==false) || apellido.value.length>13){
         alert ("Indique apellido");
         document.getElementById("ApellidoPaciente").value = "";
         document.getElementById("ApellidoPaciente").focus();
         return false;
      }
      else if(cedula.value =="" || cedula.value.indexOf(" ") == 0 || (isNaN(cedula.value)) || cedula.value<2000000 || cedula.value>99999999){
          alert ("Indique cedula");
          document.getElementById("CedulaPaciente").value = "";
          document.getElementById("CedulaPaciente").focus();
         return false;
      }
      else if(telefono.value =="" || telefono.value.indexOf(" ") == 0){
         alert ("Indique telefono");
         document.getElementById("TelefonoPaciente").value = "";
         //document.getElementById("TelefonoPaciente").focus();
         return false;
      }
      else if(nacionalidad.value =="" || nacionalidad.value.indexOf(" ") == 0 || (isNaN(nacionalidad.value)==false) || nacionalidad.value.length>20){
         alert ("Indique nacionalidad");
         document.getElementById("NacionalidadPaciente").value = "";
         document.getElementById("NacionalidadPaciente").focus();
         return false;
      }
      else if(fechaNac.value =="" || fechaNac.value.indexOf(" ") == 0){
         alert ("Indique fecha de nacimiento");
         document.getElementById("FechaNacimientoPaciente").value = "";
         //document.getElementById("FechaNacimientoPaciente").focus();
         return false;
      }
      else if(correo.value =="" || correo.value.indexOf(" ") == 0){
         alert ("Indique correo");
         document.getElementById("Correo").value = "";
         //document.getElementById("TelefonoPaciente").focus();
         return false;
      }
      else if(estado_Res.value =="" || estado_Res.value == null || estado_Res == 0){
         alert ("Indique su estado");
         document.getElementById("Estado_Res").value = "";
         document.getElementById("Estado_Res").focus();
         return false;
      }
      else if(municipio_Res.value =="" || municipio_Res == null || municipio_Res == 0){
         alert ("Indique su municipio");
         document.getElementById("Municipio_Res").value = "";
         document.getElementById("Municipio_Res").focus();
         return false;
      }
      else if(parroquia_Res.value =="" || parroquia_Res == null || parroquia_Res == 0){
         alert ("Indique su parroquia");
         document.getElementById("Parroquia_Res").value = "";
         document.getElementById("Parroquia_Res").focus();
         return false;
      }
    }

//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar que introdujo una nueva clave, llamado desde CambiarClave.php
function validar_09(){
  var Clave_8 = document.cambio.nuevaCLave;
  if(Clave_8.value =="" || Clave_8.value.indexOf(" ") == 0 ){
        alert ("Es necesario introducir una clave");
        document.getElementById("NuevaCLave").value = "";
        document.getElementById("NuevaCLave").focus();
        return false;
    } 
}

//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar formulario de perfil de doctor en MiPerfil_Xxxxxxxx.php
function validar_10(){
    var valorA = document.getElementById("ValorA");
    var valorB = document.getElementById("ValorB"); 


      if(valorA.value =="" || valorA.value.indexOf(" ") == 0){
          alert ("Indique Valor alfanumerico A");
          document.getElementById("ValorA").value = "";
          //document.getElementById("CambioValor").style.backgroundColor= "red";
         return false;
      }
      else if(valorB.value =="" || valorB.value.indexOf(" ") == 0){
         alert ("Indique Valor alfanumerico B");
         document.getElementById("ValorB").value = "";
         return false;
      }
    }

//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar formulario de oferta de medicamentos en registroDeCarga.php
function validar_11(){
    var nombrePac = document.getElementById("NombrePaciente");
    var apellidoPaciente = document.getElementById("ApellidoPaciente");
    var cedulaPac = document.getElementById("CedulaPaciente");
    var telefonoPac = document.getElementById("TelefonoPaciente");
    var correoPac = document.getElementById("Correo_Solicitante");
    var estadoPac = document.getElementById("Estado_Res");
    var nombreMed = document.getElementById("NombreMed");
    var principioMed  = document.getElementById("PrincipioMed");
    var presentacionMed = document.getElementById("PresentacionMed");
    var especificacionesMed = document.getElementById("EspecificacionMed");

    if(nombrePac.value =="" || nombrePac.value.indexOf(" ") == 0 || (isNaN(nombrePac.value)==false)  || nombrePac.value.length>13){
      alert ("Indique su nombre");
      document.getElementById("NombrePaciente").value = "";
      document.getElementById("NombrePaciente").focus();
      return false;
    }
    else if(apellidoPaciente.value =="" || apellidoPaciente.value.indexOf(" ") == 0 || (isNaN(apellidoPaciente.value)==false)  || apellidoPaciente.value.length>13){
      alert ("Indique su apellido");
      document.getElementById("ApellidoPaciente").value = "";
      document.getElementById("ApellidoPaciente").focus();
      return false;
    }
    else if(cedulaPac.value =="" || cedulaPac.value.indexOf(" ") == 0 || (isNaN(cedulaPac.value)) || cedulaPac.value<2000000 || cedulaPac.value>99999999){
      alert ("Indique su cedula");
      document.getElementById("CedulaPaciente").value = "";
      document.getElementById("CedulaPaciente").focus();
     return false;
    }
    else if(telefonoPac.value =="" || telefonoPac.value.indexOf(" ") == 0 || (isNaN(telefonoPac.value)) || telefonoPac.value.length>13){
      alert ("Indique su telefono");
      document.getElementById("TelefonoPaciente").value = "";
      return false;
    }
    else if(correoPac.value =="" || correoPac.value.indexOf(" ") == 0 || (isNaN(correoPac.value)==false)){
      alert ("Indique su correo");
      document.getElementById("Correo_Solicitante").value = "";
      document.getElementById("Correo_Solicitante").focus();
      return false;
    }
    else if(estadoPac.value =="" || estadoPac.value == null || estadoPac == 0){
      alert ("Indique su estado");
      document.getElementById("Estado_Res").value = "";
      document.getElementById("Estado_Res").focus();
      return false;
    }
    else if(nombreMed.value =="" || nombreMed.value.indexOf(" ") == 0 || (isNaN(nombreMed.value)==false)  || nombreMed.value.length>13){
      alert ("Indique el nombre del medicamento");
      document.getElementById("NombreMed").value = "";
      document.getElementById("NombreMed").focus();
      return false;
    }
    else if(principioMed.value =="" || principioMed.value.indexOf(" ") == 0 || (isNaN(principioMed.value)==false)  || principioMed.value.length>50){
      alert ("Indique el principio activo del medicamento");
      document.getElementById("PrincipioMed").value = "";
      document.getElementById("PrincipioMed").focus();
      return false;
    }
    else if(presentacionMed.value =="" || presentacionMed.value == null || presentacionMed == 0){
      alert ("Indique la presentación del medicamento");
      document.getElementById("PresentacionMed").value = "";
      document.getElementById("PresentacionMed").focus();
      return false;
    }
    else if(especificacionesMed.value =="" || especificacionesMed.value.indexOf(" ") == 0 || (isNaN(especificacionesMed.value)==false)  || especificacionesMed.value.length>13){
      alert ("Indique las especificaciones del medicamento");
      document.getElementById("EspecificacionMed").value = "";
      document.getElementById("EspecificacionMed").focus();
      return false;
    }
}

//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar checkbox de medicamentos pedidos en buscarTodosMedicamOfertados.php
  function validar_12(){
    const accesorios = document.querySelectorAll('input[type=checkbox]:checked'); 
    if(accesorios.length <= 0){
      alert("no selecciono ningún medicamento");
      return false;
    }
  }

//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar formulario de solicitud de medicamentos en cagar_Solicitud.php
function validar_13(){
    var nombre_Med = document.getElementById("NombreMedSol");
    var principio_Med = document.getElementById("PrincipioMedSol");
    var presentacion_Med = document.getElementById("PresentacionMedSol");
    var laboratorio_Med  = document.getElementById("Laboratorio_MedSol");
    var especificaciones_Med = document.getElementById("Especificacion_MedSol");
    var unidades_Med = document.getElementById("Cantidad_MedSol");
    var nombre_Sol= document.getElementById("Nombre_Solicitante");
    var apellido_Sol  = document.getElementById("Apellido_Solicitante");
    var telefono_Sol= document.getElementById("Telefono_Solicitante");
    var estado_Sol = document.getElementById("Estado_Solicitante");

    if(nombre_Med.value =="" || nombre_Med.value.indexOf(" ") == 0 || (isNaN(nombre_Med.value)==false)  || nombre_Med.value.length>20){
      alert ("Indique nombre del medicamento");
      document.getElementById("NombreMedSol").value = "";
      document.getElementById("NombreMedSol").focus();
      return false;
    }
    else if(principio_Med.value =="" || principio_Med.value.indexOf(" ") == 0 || (isNaN(principio_Med.value)==false)  || principio_Med.value.length>20){
      alert ("Indique principio activo del medicamento");
      document.getElementById("PrincipioMedSol").value = "";
      document.getElementById("PrincipioMedSol").focus();
      return false;
    }
    else if(presentacion_Med.value =="" || presentacion_Med.value.indexOf(" ") == 0 || (isNaN(presentacion_Med.value)==false)  || presentacion_Med.value.length>20){
      alert ("Indique la presentación del medicamento");
      document.getElementById("PresentacionMedSol").value = "";
      document.getElementById("PresentacionMedSol").focus();
      return false;
    }
    else if(laboratorio_Med.value =="" || laboratorio_Med.value.indexOf(" ") == 0 || (isNaN(laboratorio_Med.value)==false)  || laboratorio_Med.value.length>20){
      alert ("Indique el laboratorio del medicamento");
      document.getElementById("Laboratorio_MedSol").value = "";
      document.getElementById("Laboratorio_MedSol").focus();
      return false;
    }
    else if(especificaciones_Med.value =="" || especificaciones_Med.value == null || especificaciones_Med == 0){
      alert ("Indique las especificaciones del medicamento");
      document.getElementById("Especificacion_MedSol").value = "";
      document.getElementById("Especificacion_MedSol").focus();
      return false;
    }
    else if(unidades_Med.value =="" || unidades_Med.value.indexOf(" ") == 0 || (isNaN(unidades_Med.value)==false)  || unidades_Med.value.length>20){
      alert ("Indique la cantidad necesitada");
      document.getElementById("Cantidad_MedSol").value = "";
      document.getElementById("Cantidad_MedSol").focus();
      return false;
    }
    else if(nombre_Sol.value =="" || nombre_Sol.value.indexOf(" ") == 0 || (isNaN(nombre_Sol.value)==false)  || nombre_Sol.value.length>20){
      alert ("Indique su nombre");
      document.getElementById("Nombre_Solicitante").value = "";
      document.getElementById("Nombre_Solicitante").focus();
      return false;
    }
    else if(apellido_Sol.value =="" || apellido_Sol.value.indexOf(" ") == 0 || (isNaN(apellido_Sol.value)==false)  || apellido_Sol.value.length>20){
      alert ("Indique su apellido");
      document.getElementById("Apellido_Solicitante").value = "";
      document.getElementById("Apellido_Solicitante").focus();
      return false;
    }
    else if(telefono_Sol.value =="" || telefono_Sol.value.indexOf(" ") == 0 ){
      alert ("Indique su telefono");
      document.getElementById("Telefono_Solicitante").value = "";
      return false;
    }
    else if(estado_Sol.value =="" || estado_Sol.value == null || estado_Sol == 0){
      alert ("Indique su estado");
      document.getElementById("Estado_Solicitante").value = "";
      document.getElementById("Estado_Solicitante").focus();
      return false;
    }
}

//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar inicio sesion llamado desde DoctorAfiliado.php
function validarDoctor(){
    if (document.getElementById("Usuario").value ==""){
            alert ("Es necesario su usuario");
            document.AbrirSesion.usuario.focus();
        return false;
    }
    if (document.getElementById("Clave").value ==""){
            alert ("Es necesario su clave");
            document.AbrirSesion.clave.focus();
        return false;
    }
}


//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
//Validar que introdujo un numero de cedula, llamado desde HistoriaClinica_2.php
function validarCedula(){
  var cedula = document.formDoc.CedulaPaciente;
  if(cedula.value =="" || cedula.value.indexOf(" ") == 0 || (isNaN(cedula.value))){
        alert ("Es necesario introducir un número de cedula");
        document.getElementById("CedulaPaciente").value = "";
        document.getElementById("CedulaPaciente").focus();
       return false;
    } 
}


//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------


       
        



      