<?php

session_start();
if(!isset($_SESSION['user']))
{
     header("location:micuenta.php");
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Blockchain</title>
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
              <h3>Blockchain</h3>
							<div class="inner">
                <?php
                $numero=1;
                include('block.php');
                $numero=2;
                include('block.php');
                $numero=3;
                include('block.php');
               ?>
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
      <script src="jsBlockchainDemo/sha256.js"></script>
      <script src="jsBlockchainDemo/blockchain.js"></script>



	</body>
</html>
