//se fija el header en directorio.php
if (screen.width>800){
	var menu_1=document.getElementById("Menu");
	var menu_2=document.getElementById("Directorio_00");

	//alert(menu_1.offsetTop);//con esta linea se conoce cuantos pixeles esta separado el elemento de la parte superior de la pantalla,
							//187 px
	var altura_1= menu_1.offsetTop;//la distancia en pixeles desde el elemento hasta la parte superior de la pantalla
	window.addEventListener("scroll",function(){
		if(window.pageYOffset > altura_1){//187 es la distancia que tiene el borde superior del elemento hasta donde comienza la ventana.
			menu_1.classList.add("fixed");//agrega la clase fixed al elemento guardado en la variable menu
		}
		else{
			menu_1.classList.remove("fixed");//sino, se quita la clase fixed al elemento guardado en la variable men
		}
	//alert(window.pageYOffset);//Indica cuanta distancia en px se a hecho scrroll en el eje Y
	});

	//----------------------------------------------------------------------------------------------------------------------
	//----------------------------------------------------------------------------------------------------------------------

	//alert(menu_2.offsetTop);//con esta linea se conoce cuantos pixeles esta separado el elemento de la parte superior de la pantalla,
							//393 px
	var altura_2= menu_2.offsetTop;//se obtiene la distancia en pixeles desde el elemento hasta la parte superior de la pantalla
	window.addEventListener("scroll",function(){
		if(window.pageYOffset > altura_1){// es la distancia que tiene el borde superior de <nav> .
			menu_2.classList.add("reposicion");//agrega la clase fixed al elemento guardado en la variable menu
		}
		else{
			menu_2.classList.remove("reposicion");//sino, se quita la clase fixed al elemento guardado en la variable men
		}
	//alert(window.pageYOffset);//Indica cuanta distancia en px se a hecho scrroll en el eje Y
	});
}
else{
	//document.getElementById("Menu").classList.add("fixed_3");
}

