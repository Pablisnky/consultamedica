
var usuario=document.getElementById("usuarioDoctor");
									
//alert(menu.offsetTop);//con esta linea se conoce cuantos pixeles esta eparado el elemento de la parte superior de la pantalla

var altura= usuario.offsetTop;//se obtiene la distancia en pixeles desde el elemento hasta la parte superior de la pantalla
window.addEventListener("scroll",function(){
	if(window.pageYOffset > altura){//si la distancia de scrool es mayor que la variable altura
		usuario.classList.add("fixed_1");//agrega la clase fixed al elemento guardado en la variable menu
	}
	else{
		usuario.classList.remove("fixed_1");//sino, se quita la clase fixed al elemento guardado en la variable men
	}

});

//alert(window.pageYOffset);INdica cuanta distancia en px se a hecho scrroll en el eje Y