<?php

include('conexion.php');

session_start();
if(isset($_SESSION['user']))
{
     header("location:micuenta.php");
}

if(isset($_POST["login"]))
{
     if(empty($_POST["user"]) && empty($_POST["password"]))
     {
          echo '<script>alert("Complete ambos campos")</script>';
     }
     else
     {
       $mysqli->set_charset('utf8');

       $usuario = mysqli_real_escape_string($mysqli,$_POST['user']);
       $password  = mysqli_real_escape_string($mysqli,md5($_POST['password']));


       if($nueva_consulta = $mysqli->prepare("SELECT IdUsuario,Username FROM usuario WHERE Username=? AND Password=?")){
           $nueva_consulta->bind_param('ss',$usuario,$password);
           $nueva_consulta->execute();

           $resultado = $nueva_consulta->get_result();

           if($resultado->num_rows==1){
             $datos = $resultado->fetch_assoc();
             echo "\nWELCOME ".$datos["Username"];
             $_SESSION['user'] = $usuario;
             $_SESSION['idUsuario'] = $datos["IdUsuario"];
             header("location:micuenta.php");
             //echo json_encode(array('error'=> false));
           }
           $nueva_consulta->close();
       }

     }
}




?>
