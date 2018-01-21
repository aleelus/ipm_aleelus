<?php

include('conexion.php');

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])== 'xmlhttprequest'){

  $mysqli->set_charset('utf8');

  $usuario = mysqli_real_escape_string($mysqli,$_POST['user']);
  $password  = mysqli_real_escape_string($mysqli,md5($_POST['password']));


  if($nueva_consulta = $mysqli->prepare("SELECT Username FROM usuario WHERE Username=? AND Password=?")){
      $nueva_consulta->bind_param('ss',$usuario,$password);
      $nueva_consulta->execute();

      $resultado = $nueva_consulta->get_result();

      if($resultado->num_rows==1){
        $datos = $resultado->fetch_assoc();
        echo "WELCOME ".$datos["Username"];
        echo json_encode(array('error'=> false));
      }else{
        echo "CREDENCIALES INCORRECTAS\n";
        echo json_encode(array('error'=> true));
      }

      $nueva_consulta->close();
  }

}

?>
