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
                        <input type="text" name="busqueda" id="busqueda"  required class="form-control input-lg" placeholder="Ingrese nombre del video"/>
                        <br>
                        <input type="submit" name="buscar" id="buscar" value="Buscar" class="button special hover">
                    </form>
                  </div>
                </div>
                <?php
                  if(isset($_POST["buscar"])){

                      if(!empty($_POST["busqueda"])){

			                  $queryYT =shell_exec('youtube-dl -s --dump-single-json --no-warnings ytsearch5:"'.$_POST["busqueda"].'"');

			                  $resultados = json_decode($queryYT,true);
                        echo "<div class='table'>";
                        echo "<tbody>";

                        foreach($resultados["entries"] as $res){
                          echo "<tr>";

                          echo '<div class="row">';
                          echo '<div class="col-md-3">';
                          echo "<td><a href='verVideo.php?link=".$res["webpage_url_basename"]."'><img src='".$res['thumbnail']."' height='138' width='248'></a></td>";
                          echo "</div>";
                          echo '<div class="col-md-9">';
                          echo "<td>".$res["title"]." - [".gmdate("H:i:s", $res["duration"])."]</td>";
                          echo "</div>";
                          echo "</div><br>";

                          echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</div>";




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
