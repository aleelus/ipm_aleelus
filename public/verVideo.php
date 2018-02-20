<?php
include('conexion.php');
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']=="invitado")
{
     header("location:micuenta.php");
}else{
  $mysqli->set_charset('utf-8');

  $idUsuario = $_SESSION['idUsuario'];

  if($nueva_consulta = $mysqli->prepare("SELECT CantidadTokens FROM iota_tokens WHERE IdUsuario=?")){
      $nueva_consulta->bind_param('s',$idUsuario);
      $nueva_consulta->execute();

      $resultado = $nueva_consulta->get_result();

      if($resultado->num_rows==1){
        $datos = $resultado->fetch_assoc();
        $_SESSION['cantidadTokens'] =  $datos["CantidadTokens"];

      }
      $nueva_consulta->close();
  }
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Ver Video</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css" />


	</head>
	<body class="landing">

		<div id="page-wrapper">

        <?php include("menu.php") ?>

				<!-- Main -->
					<article id="main">
						<header>

              <h3>

							<?php
              echo '<div class="row">';

              $url = "https://www.youtube.com/watch?v=".$_GET['link'];
              $comando = 'youtube-dl -f mp4 "'.$url.'" -o "videos/'.$_GET['link'].'"';

              $queryYT = shell_exec($comando);
              /*
              echo '<video class="center" width="640" height="480" controls>';
              echo '<source src="'.$_GET['link'].'.webm" type="video/webm">';
              echo '</video>';
              echo "</div>";
              */
              echo '<iframe width="960" height="540" src="videos/'.$_GET['link'].'"></iframe> ';

              ?>
            </h3>

						</header>

					</article>



			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
