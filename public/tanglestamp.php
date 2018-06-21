<?php
/*
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']=="invitado")
{
     header("location:micuenta.php");
}
*/
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Tangle Stamp</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing">

		<div id="page-wrapper">

        <?php /*include("menu.php")*/ ?>
				<!-- Main -->
					<article id="main">
						<header>
							<h2><?php /*echo $_SESSION['user']*/ echo "IOTA-ARGENTINA"?></h2>
						</header>
						<section class="wrapper style1 special">
              <h3>Tangle Stamp</h3>
							<div class="inner">
								<div class="row">
										<div class="col-md-12">
											<form id="myform">
												<p align="center">
													<input id="myfile" name="files[]" multiple="" type="file" />
												</p>
											</form>
										</div>
								</div>

                <form name="form" action="" method="post">
                  <div class="row">
                      <div class="col-md-6">
                          <input type="button" onclick="verificarDoc()"  id="verificarDocumento" value="Verificar Documento" class="button special hover">
                      </div>
                      <div class="col-md-6">
                          <input type="button" onclick="ingresarDoc()"  id="ingresarDocumento" value="Ingresar Documento" class="button special hover">
                      </div>
                  </div>
                  <br>
                    <div id="divRoot" style="display:none">
                      <br>
                      <div class="row">
                          <div class="col-md-12">
                              <h2>EL ARCHIVO ES 100% LEGÍTIMO</h2>
															<h3><p id="datoNombreArchivo"></p></h3>
															<h3><p id="datoTipoArchivo"></p></h3>
															<h3><p id="datoFecha"></p></h3>
                          </div>
                      </div>
                    </div>
										<div id="divNoEncontrado" style="display:none">
                      <br>
                      <div class="row">
                          <div class="col-md-12">
                              <h2>NO SE ENCONTRO EL ARCHIVO</h2>
                          </div>
                      </div>
                    </div>
										<div id="divArchivoIngresado" style="display:none">
											<br>
											<div class="row">
													<div class="col-md-12">
															<h2>SE HA INGRESADO EL ARCHIVO!</h2>
													</div>
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
      <script src="assets/js/iota.min.js"></script>
			<script src="assets/js/mam.web.js"></script>
      <script src="assets/js/tanglestamp.js"></script>

	</body>
</html>
