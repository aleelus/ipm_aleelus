 <?php
 session_start();
 if(!isset($_SESSION["user"]))
 {
      header("location:index.php");
 }
 ?>
 <!DOCTYPE HTML>
<html>
	<head>
		<title>Mi cuenta</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
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
											<li><a href="logout.php">Salir</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>


					<section id="banner">
						<div class="inner">
							<h2>Ale- Exchange(?)</h2>
							<p>Larga la guita guach@</p>
						</div>
						<a href="#uno" class="more scrolly">¯\_(ツ)_/¯</a>
					</section>


					<section id="uno" class="wrapper style1 special">
						<div class="inner">
							<header class="major">
								<h2>Aca va a ir algo pero no se que</h2>
								<p>Sarasasarasarasrsasraras</p>
							</header>
						</div>
					</section>
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
