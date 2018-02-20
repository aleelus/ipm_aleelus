<?php
include('conexion.php');
session_start();
if(!isset($_SESSION['user'])|| $_SESSION['user']=="invitado")
{
     header("location:micuenta.php");
}else{
  $mysqli->set_charset('utf8');

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
		<title>Mis monedas</title>
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
							<h2><?php echo $_SESSION['user']?></h2>
						</header>
						<section class="wrapper style5">
							<div class="inner">
                <div class="row">
                  <?php
                  if(isset($_SESSION['cantidadTokens'])){
                    echo '<div class="col-md-12 col-md-offset-4">';
                    echo '<h1>Tenes '.$_SESSION['cantidadTokens'].' Miotas</h1>';
                    //extrae el precio de iota
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, 'https://widgets.coinmarketcap.com/v1/ticker/iota/?convert=USD');
                    $result = curl_exec($ch);
                    curl_close($ch);
                    $obj = json_decode($result);
                    echo $obj[0]->price_usd*$_SESSION['cantidadTokens'];
                    ///////////////////////////////////////////////////////////

                    echo '</div>';
                  }else{
                    echo '<div class="col-md-12">';
                    echo "<p>NO TENES NIGUN TOKEN</p>";
                    echo '</div>';
                  }
                  ?>


                </div>

							</div>
						</section>
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
