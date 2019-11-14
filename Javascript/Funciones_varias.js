//coloca e foco en un input de registroDeCarga.php
	function autofocusRegistroGratis(){
		document.getElementById("NombreMed").focus();
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function autofocusCargarPaciente(){//coloca e foco en un input de cargarPaciente_Gratis.php
		document.getElementById('NombrePaciente').focus();
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function autofocusCancelar(){//coloca e foco en un input de Cancelar.php
		document.getElementById('Usuario').focus();
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
	function autofocus(){//coloca e foco en un input de Citas_2.php
		document.getElementById('Especialidad').focus();
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function autofocusMotivo(){//coloca el foco en un input de motivo de consulta en diagnostico_Basico_2.php
        document.getElementById("Motivo").focus();
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function autofocusHCD(){//coloca el foco en un input de HistoriasClinicas_2.php
        document.getElementById("CedulaPaciente").focus();
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function autofocusContacto(){//coloca el foco en un input de contactenos.php
	        document.getElementById("Nombre").focus();
	}
	
// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function autofocusMiembro(){//La función autofocusMiembro se encuentra en DoctorAfiliado.php
	        document.getElementById("Usuario").focus();
	}	

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
	function advertencia(){//ventana modal en citas_2.php 
		alert("Complete los pasos 1 y 3 antes de insertar sus datos personales");
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function advertencia_2(){//ventana modal en citas_2Autofill.php
		alert("Inserte la fecha y hora de la cita antes de introducir sus datos personales");
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function Confirmacion(){
	 	if(confirm('¿Esta seguro de eliminar el registro?')==true){
			//alert('El registro ha sido eliminado correctamente!!!');
		    return true;
		}
		else{
		    //alert('Cancelo la eliminacion');
		    return false;
		}
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function habilitarEspecialidad(){//es llamada desde Afiliacion.php
		var A= document.getElementById("Especialidad");
		var B= document.getElementById("Especialidad_2");
		if(A.value == ""){
			//B.style.background="green";
			B.disabled=false;
		}
		else{
			//B.style.background="red";
			B.disabled=true;
		}
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function EvitarEspecialidad(){//es llamada desde Afiliacion.php
		var A= document.getElementById("Especialidad");
		var B= document.getElementById("Especialidad_2");
		if(B.value == ""){
			//B.style.background="green";
			B.disabled=true;
			A.disabled=false;
		}
		else{
			//A.style.background="red";
			A.disabled=true;
		}
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function habilitarCiudad(){
		var A= document.getElementById("Ciudad");
		var B= document.getElementById("Ciudad_2");
		if(A.value == ""){
			B.disabled = false;
		}
		else{
			B.disabled = true;
		}
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

	function EvitarCiudad(){//es llamada desde Afiliacion.php
		var A= document.getElementById("Ciudad");
		var B= document.getElementById("Ciudad_2");
		if(B.value == ""){
			//B.style.background="green";
			B.disabled=true;
			A.disabled=false;
		}
		else{
			//A.style.background="red";
			A.disabled=true;
		}
	}

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

    function mostrarMenu(){//menu responsive principal, llamado desde todos los archivos headerXxxxxxx.php
        var A= document.getElementById("MenuResponsive");//nav
        if(A.style.marginLeft < "0%"){
            A.style.marginLeft = "0%";
        }
        else if(A.style.marginLeft == "0%"){
            A.style.marginLeft = "-52%";
        }
    }

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

    function ocultarMenu(){//menu responsive, llamado desde todas las paginas. 
        if(window.screen.availWidth <= 800){//solo funciona si la pantalla es menor a 800px   
	        var A= document.getElementById("MenuResponsive");//nav
	        if(A.style.marginLeft == "0%"){
	            A.style.marginLeft = "-52%";
            }
        }
    }

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

    function mostrarAntecedentesPaciente(){//Es llamada desde HistoriasClinicas_Basico.php solo en modo responsive
        var A= document.getElementById("MenuResponsive_2");
        if(A.style.marginLeft = "-70%"){
            A.style.marginLeft = "0%";
        }
    }

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------

    function ocultarAntecedentesPaciente(){//Es llamada desde HistoriasClinicas_Basico.php solo en modo responsive
        var A= document.getElementById("MenuResponsive_2");
        if(A.style.marginLeft= "0%"){
            A.style.marginLeft= "-70%";
        }
    }
        
// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
	
	function cerrar(){
    	window.close();
    }

    function contador(){
    	alert("Hola");
    	//var A= document.getElementById("Contenido").value.length;
    	//var B= document.getElementById("contador").value= A;
    }
        
// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
//va dando en pantalla la cantidad de caracteres que quedan mientra se escribe un total de 800, llamada desde contactenos.php

	function contar(){
         var max = 800; 
         var cadena = document.getElementById("Contenido").value; 
         var longitud = cadena.length; 

             if(longitud <= max) { 
                  document.getElementById("Contador").value = max-longitud; 
             } else { 
                  document.getElementById("Contenido").value = cadena.subtring(0, max);
             } 
    } 
        
// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde contactenos.php 
	var contenido_textarea = ""; 
	
	function valida_Longitud(){  
		var num_caracteres_permitidos = 800;

		//se averigua la cantidad de caracteres escritos
	   	num_caracteres = document.forms[0].contenido.value.length; 

	   	if(num_caracteres > num_caracteres_permitidos){ 
	      	document.forms[0].contenido.value = contenido_textarea; 
	   	}
	   	else{ 
	      	contenido_textarea = document.forms[0].contenido.value;	
	   	} 
	} 
       
// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
//va dando en pantalla la cantidad de caracteres que quedan mientra se escribe un total de 800, llamada desde MiPerfil.php
	function contar_1(){
         var max = 800; 
         var cadena = document.getElementById("PerfilProf").value; 
         var longitud = cadena.length; 

             if(longitud <= max) { 
                  document.getElementById("Contador_2").value = max-longitud; 
             } else { 
                  document.getElementById("PerfilProf").value = cadena.subtring(0, max);
             } 
    } 

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde MiPerfil.php 
	var contenido_textarea_2 = ""; 
    function valida_Longitud_2(){  
		var num_caracteres_permitidos = 800;

		//se averigua la cantidad de caracteres escritos
	   	num_caracteres = document.forms[0].PerfilProf.value.length; 

	   	if(num_caracteres > num_caracteres_permitidos){ 
	      	document.forms[0].PerfilProf.value = contenido_textarea_2; 
	   	}
	   	else{ 
	      	contenido_textarea_2 = document.forms[0].PerfilProf.value;	
	   	} 
	} 
        
// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
    //ajusta el texarea con respecto al contenido que trae de la BD es llamado desde MiPerfil_Basico.php
    function resize_6(){
        var text = document.getElementById("PerfilProf");
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }

// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------

    //ajusta el texarea con respecto al contenido que trae de la BD es llamado desde MiPerfil_Basico.php
    function resize_7(){
        var text = document.getElementById("Direccion");
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------

    //ajusta el texarea con respecto al contenido que trae de la BD es llamado desde MiPerfil_Basico.php
    function resize_8(){
        var text = document.getElementById("CentroSalud");
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------

    //Borrar los campos del formmulario donde se cargar los medicamentos en cargarMedicam.php
    function limpiarFormulario(){
        document.getElementById("Nombre").value = "";
        document.getElementById("Principio").value = "";
        document.getElementById("Presentacion").value = "";
        document.getElementById("Especificacion").value = "";
    }
// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------

//Impide que se siga introduciendo caracteres al alcanzar el limite maximo en el telefono, llamado desde registroEspecialista.php
    var contenidoTelefono = ""; 
    var num_caracteres_permitidos = 14; 

    function valida_LongitudTelefono(){ 
       num_caracteres = document.forms[0].telefono.value.length; 

       if(num_caracteres > num_caracteres_permitidos){ 
          document.forms[0].telefono.value = contenidoTelefono; 
       }
       else{ 
          contenidoTelefono = document.forms[0].telefono.value;   
       } 
    } 

// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
//Muestra el textarea donde se escribe la observación en Anamnesis.php
        function Si_Obser_Antecedentes(id){ 
           var A= document.getElementById(id);
           A.style.display = "block";               

        }
        function No_Obser_Antecedentes(id){ 
           var A= document.getElementById(id);
           A.style.display = "none";               

        }
