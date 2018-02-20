<?php
$mysqli = new mysqli('localhost','root','','ipm_ale');
if($mysqli->connect_errno):
  echo "Error al conectarse con MySQL debido al error".$mysqli->connect_errno;
endif;
 ?>
