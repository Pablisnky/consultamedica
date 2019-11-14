<?php

$email_to = "pc@consultamedica.com.ve";
 
$email_subject = $Asunto;  

$email_message = $Contenido;


$headers = 'From: '.$correo."\r\n".
 
'Reply-To: '.$correo."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 

//header("location:viajes_3.html"); //me lleva a la pagina deseada 



//} 
?>