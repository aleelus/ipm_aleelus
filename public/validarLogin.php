<?php

$mysqli = new mysqli('localhost:8080','root','','ipm_ale');
if($mysqli->connect_errno):
  echo "Erro al conectarse con MySQL debido al error".$mysqli->connect_errno;
endif;


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])== 'xmlhttprequest'){

  $mysqli->set_charset('utf8');

  $usuario = $mysqli->mysqli_real_escape_string($_POST['user']);
  $password  = $mysqli->mysqli_real_escape_string(PASSWORD($_POST['password']));

  if($nueva_consulta = $mysqli->prepare("SELECT Username FROM usuario WHERE Username=? AND Password=?")){
      $nueva_consulta->bind_param('ss',$usuario,$password);
      $nueva_consulta->execute();

      $resultado = $nueva_consulta->get_result();

      if($resultado->num_rows==1){
        $datos = $resultado->fetch_assoc();
        echo json_encode(array('error'-> false));
      }else{
        echo json_encode(array('error'->true));
      }

      $nueva_consulta->close();
  }

}

?>
