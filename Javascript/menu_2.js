
var historia=document.getElementById("historia_4");

//alert(menu.offsetTop);//con esta linea se conoce cuantos pixeles esta separado el elemento de la parte superior de la pantalla

var alturaSuperior= historia.offsetTop;//se obtiene la distancia en pixeles desde el elemento hasta la parte superior de la pantalla
var alturaInferior= historia.offsetBotoom
window.addEventListener("scroll",function(){
	if(window.pageYOffset > alturaSuperior){//108 es la distancia que tiene el borde inferior del header.
		historia.classList.add("fixed_2");//agrega la clase fixed al elemento guardado en la variable menu
	}
	else{
		historia.classList.remove("fixed_2");//sino, se quita la clase fixed al elemento guardado en la variable men
	}
//alert(window.pageYOffset);//Indica cuanta distancia en px se a hecho scrroll en el eje Y
});

