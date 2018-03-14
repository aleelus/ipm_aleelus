<?php

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']=="invitado")
{
     header("location:micuenta.php");
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Calculadora</title>
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
						<section class="wrapper style1 special">
              <h3>Calculadora</h3>
							<div class="inner">
                <form name="form" action="" method="post">
                  <div class="row">
                    <div class="col-md-4">
                      <input type="text" name="cantInvertir" id="cantInvertir" pattern="[0-9]{1,15}"  required class="form-control input-lg" placeholder="Cantidad a invertir (AR$)"/>
                    </div>
                    <div class="col-md-8">
                      <?php
                      //extrae el precio de iota y dolar
                      $comision_ripio_rapipago = 1 - 0.025;
                      $comision_ripio_transferencia_bancaria= 0.99;
                      $comision_ripio_compra_bitcoin = 1-0.005;
                      $comision_transaccion_bitcoin = 60;//pesos argentinos

                      $ch = curl_init();
                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                      curl_setopt($ch, CURLOPT_URL, 'https://widgets.coinmarketcap.com/v1/ticker/iota/?convert=USD');
                      $result = curl_exec($ch);
                      curl_close($ch);
                      $obj = json_decode($result);

                      $data_in = "http://ws.geeklab.com.ar/dolar/get-dolar-json.php";
                      $data_json = @file_get_contents($data_in);
                      if(strlen($data_json)>0)
                      {
                        $data_out = json_decode($data_json,true);

                        if(isset($_POST["cantInvertir"])){
                          $total_pesos = ($_POST["cantInvertir"]*$comision_ripio_rapipago*$comision_ripio_compra_bitcoin)-$comision_transaccion_bitcoin;
                          $total_dolares = $total_pesos/$data_out['libre'];
                          echo 'Obtengo '.round($obj[0]->price_usd*$total_dolares,2).' Miotas valuados en USD $'.round($total_dolares,2);
                        }
                      }




                      ///////////////////////////////////////////////////////////
                       ?>
                    </div>
                  </div>
                </form>
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
      <script src="assets/js/precio.js"></script>
	</body>
</html>
