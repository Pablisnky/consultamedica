<?php
    session_start();
//se inicia una sesion para crear una $_SESSION que almacene el ID_Doctor, esta sesion sera exigida cada vez que se entre en una pagina del area de afiliados, con esto se garantiza que se accedio a la cuenta del afiliado haciendo login
?>
<?php
    include("../conexion/Conexion_BD.php");

    $Usuario= $_POST["usuario_Proveedor"];
    $Clave=  $_POST["codigo_Proveedor"];

    // echo "Usuario: " . $Usuario . "<br>";
    // echo "Código: " . $Clave . "<br>";

        $Consulta="SELECT * FROM usuario_proveedor WHERE usuarioProveedor ='$Usuario' AND tipo_usuario = 'Proveedor' ";
        $Recordset = mysqli_query($conexion,$Consulta);
        $Resultado= mysqli_num_rows($Recordset);

        if($Resultado != 0){//Si es un Proveedor, se ejecuta este codigo
            $Proveedores= mysqli_fetch_array($Recordset);//Devuelve la primera fila de la tabla virtual que genera la consulta, que en este caso, la consulta generará solo una fila.

            if($Usuario == $Proveedores["usuarioProveedor"] AND $Clave == $Proveedores["codigoProveedor"]){
                $_SESSION["ID_Proveedor"] = $Proveedores["ID_Proveedor"];//se crea una sesion que almacena el ID_Proveedor para vincular sus actividades dentro de la aplicacion web.

                if($Proveedores["planAfiliado"] == "Bas"){
                   header("location:Basico/InicioProveedores_Basico.php");
                }
                else if($Proveedores["planAfiliado"] == "Esp"){
                   header("location:Especial/InicioProveedores_Especial.php");
                }
            }
            else{ 
                ?>
                    <script>
                        alert("su USUARIO y CÓDIGO no son correctos");
                        history.back();
                    </script>        
                <?php 
            }
        }
            ?>
 




