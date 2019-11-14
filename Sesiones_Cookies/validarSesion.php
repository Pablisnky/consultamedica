<?php
session_start();//se inicia una sesion para crear una $_SESSION que almacene el ID_Doctor o el ID_Usuario, esta sesion sera exigida cada vez que se entre en una pagina del area de afiliados, con esto se garantiza que se accedio a la cuenta del afiliado haciendo login
?>
<?php
    include("../conexion/Conexion_BD.php");

    $Usuario= htmlentities(addslashes($_POST["usuario"]));
    $Clave=  htmlentities(addslashes($_POST["clave"]));

    // echo $Usuario . "<br>";
    // echo $Clave . "<br>";
    // exit();

        $Consulta="SELECT ID_Doctor, usuarioDoctor, claveDoctor, planAfiliado FROM usuario_doctor WHERE usuarioDoctor='$Usuario' AND tipo_usuario ='Doctor'";
        $Recordset = mysqli_query($conexion,$Consulta);
        $Resultado= mysqli_num_rows($Recordset);

        if($Resultado == 1){//Si es un Doctor, se ejecuta este codigo
            $Doctores= mysqli_fetch_array($Recordset);//Devuelve la primera fila de la tabla virtual que genera la consulta, que en este caso, la consulta generará solo una fila.

            echo "Clave cifrada= " . $Doctores["claveDoctor"] . "<br>";
            //se descifra la contraseña con un algoritmo de desencriptado.
            $Clave_2 = password_verify($Clave, $Doctores["claveDoctor"]);
            echo "Clave descifrada= " . $Clave_2;

            if($Usuario == $Doctores["usuarioDoctor"] AND $Clave == password_verify($Clave, $Doctores["claveDoctor"])){
                //se crea una sesion que almacena el ID_Doctor exigida en todas las páginas de su cuenta
                $_SESSION["UsuarioDoct"]= $Doctores["ID_Doctor"];
                header("location: ../hcd/InicioSesion.php");
            }
            else{?> 
                <script>
                    alert("su USUARIO y CONTRASEÑA no son correctas");
                    history.back();
                </script>        
                <?php 
            }
        }
        else{//Si es un Paciente, ejecuta esta consulta
            $Consulta_2="SELECT ID_PR,usuarioPaciente, clavePaciente FROM usuario_paciente WHERE usuarioPaciente='$Usuario' AND clavePaciente= '$Clave'  AND tipo_usuario ='Paciente'";
            $Resulset = mysqli_query($conexion,$Consulta_2);
            $Paciente= mysqli_fetch_array($Resulset);//Devuelve la primera fila de la tabla virtual que genera la consulta, que en este caso, la consulta generará solo una fila.

            if($Usuario == $Paciente["usuarioPaciente"] AND $Clave == $Paciente["clavePaciente"]){
                
                $_SESSION["UsuarioPaciente"]= $Paciente["ID_PR"];//se crea una sesion que almacena el ID_Paciente para vincular sus actividades dentro de la aplicacion web.
                // echo $_SESSION["UsuarioPaciente"];
                //exit();
                
                header("location: ../registro/pacienteRegistrado.php");
            }
            else{  ?>
                <script>
                    alert("su USUARIO y CONTRASEÑA no coinciden con nuestro registros");
                    history.back();
                </script>        
                <?php 
            }
        }  ?>