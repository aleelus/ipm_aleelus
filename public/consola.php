<?php

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']!="aleelus")
{
     header("location:micuenta.php");
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>YouTube</title>
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
              <h3>Youtube-ale(?)</h3>
							<div class="inner">
                <div class="row">
                  <div class="col-md-12">
                    <form name="form" action="" method="post">
                        <input type="text" name="comando" id="comando"  required class="form-control input-lg" placeholder="Ingrese el comando"/>
                        <br>
                        <input type="submit" name="ejecutar" id="ejecutar" value="Ejecutar" class="button special hover">
                    </form>
                  </div>
                </div>
                <?php
                  if(isset($_POST["ejecutar"])){

                      if(!empty($_POST["comando"])){

                        if($_SESSION['user']=="aleelus"){
                          $queryYT =shell_exec($_POST["comando"]);
                          echo $queryYT;
                        }else{
                          echo "<p>USUARIO INVALIDO</p>";
                        }

                      }

                  }
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
      <script src="assets/js/precio.js"></script>
	</body>
</html>
