
	var A= document.getElementById("OcultarMenu");
    A.addEventListener('click',ocultarMenu, false);

    function ocultarMenu(){//menu responsive, llamado desde todas las paginas. 
        if(window.screen.availWidth <= 800){//solo funciona si la pantalla es menor a 800px   
	        var A= document.getElementById("MenuResponsive");//nav
	        if(A.style.marginLeft = "0%"){
	            A.style.marginLeft = "-45%";
            }
        }
    }

// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
