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
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" name="user" id="user" pattern="[0-9]{1,15}"  required class="form-control input-lg" placeholder="Cantidad a invertir (AR$)"/>
                  </div>
                  <div class="col-md-8">
                    <p>(☞ﾟヮﾟ)☞ Aca va la cantidad de miotas equivalentes ☜(ﾟヮﾟ☜)</p>
                  </div>
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
      <script src="assets/js/precio.js"></script>
	</body>
</html>
