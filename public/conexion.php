<?php
$mysqli = new mysqli('localhost','root','*B5A1E6E7DAB8BA2B841D049B40A36DA214040FEC','ipm_ale');
if($mysqli->connect_errno):
  echo "Error al conectarse con MySQL debido al error".$mysqli->connect_errno;
endif;
 ?>
