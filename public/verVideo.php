<?php
include('conexion.php');
session_start();
if(!isset($_SESSION['user']))
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

        <header id="header" class="alt">
          <nav id="nav">
            <ul>
              <li class="special">
                <a href="#menu" class="menuToggle"><span>Menu</span></a>
                <div id="menu">
                  <ul>
                    <li><a href="micuenta.php">Home</a></li>
                    <li><a href="mismonedas.php">Mis monedas</a></li>
                    <li><a href="calculadora.php">Calculadora</a></li>
                    <li><a href="yt.php">YouTube</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </nav>
        </header>

				<!-- Main -->
					<article id="main">
						<header>

              <h3>

							<?php
              echo '<div class="row">';

              $url = "https://www.youtube.com/watch?v=".$_GET['link'];
              $comando = 'youtube-dl -f webm "'.$url.'" -o "'.$_GET['link'].'.webm"';
              $queryYT = shell_exec($comando);

              echo '<video class="center" width="640" height="480" controls>';
              echo '<source src="'.$_GET['link'].'.mp4" type="video/mp4">';
              echo '</video>';
              echo "</div>";

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
