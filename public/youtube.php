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
		<title>YouTube</title>
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
                    <li><a href="youtube.php">YouTube</a></li>
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
                        $queryYT =shell_exec('youtube-dl.exe -s --dump-single-json --no-warnings ytsearch5:"'.$_POST["busqueda"].'"');
                        $resultados = json_decode($queryYT,true);
                        echo "<div class='table'>";
                        echo "<tbody>";

                        foreach($resultados["entries"] as $res){
                          echo "<tr>";

                          echo '<div class="row">';
                          echo '<div class="col-md-3">';
                          echo "<td><img src='".$res['thumbnail']."' height='138' width='248'></td>";
                          echo "</div>";
                          echo '<div class="col-md-9">';
                          echo "<td>".$res["title"]."</td>";
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
