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
		<title>Tangle Note</title>
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
              <h3>Tangle Note</h3>
							<div class="inner">

                <form name="form" action="" method="post">
                  <div class="row">
                      <div class="col-md-6">
                          <input type="button" onclick="mostrarOpciones('crearChannel')"  id="crearChannel" value="Crear channel" class="button special hover">
                      </div>
                      <div class="col-md-6">
                          <input type="button" onclick="mostrarOpciones('usarChannel')"  id="usarChannel" value="Usar channel" class="button special hover">
                      </div>
                  </div>
                  <br>
                  <div id="crearChannelContainer" style="display:none">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="claveChannel" placeholder="Ingrese una clave para el channel" type="text">
                        </div>
                        <div class="col-md-6">
                          <div id="divGenRoot">
                              <input onclick="generarRoot()" type="button" id="btnGenerarRoot" value="Generar root" class="button special hover">
                          </div>
                          <div id="loader" style="display:none">
                             <img src="/img/loader.gif" height="70" width="300"  >
                          </div>
                        </div>
                    </div>
                    <div id="divRoot" style="display:none">
                      <br>
                      <div class="row">
                          <div class="col-md-12">
                              <input id="root" type="text">
                          </div>
                      </div>
                    </div>
                  </div>

                  <div id="usarChannelContainer" style="display:none">

                    <div id="divIngresarRoot">
                      <div class="row">
                          <div class="col-md-5">
                              <input id="rootIngresado" placeholder="Ingrese un root" type="text">
                          </div>
                          <div class="col-md-5">
                              <input id="claveChannelIngresado" placeholder="Ingrese la clave del channel" type="password">
                          </div>
                          <div class="col-md-2">
                            <div id="divIniciar">
                                <input onclick="iniciarChannel('usarChannel')" type="button" id="btnUsarChannel" value="Iniciar" class="button special hover">
                            </div>
                            <div id="loaderIniciar" style="display:none">
                               <img src="/img/loader.gif" height="70" width="300"  >
                            </div>
                          </div>
                      </div>
                    </div>


                    <div id="divChat" style="display:none">
                      <br>
                      <div class="row">
                        <div class="col-md-12">
                            <textarea style="resize:none;" type="form-control" rows="5" disabled name="data" id="txtAreaMensajes"></textarea>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-9">
                            <input id="msg" type="text">
                        </div>
                        <div class="col-md-3">
                          <div id="divEnviar">
                              <input type="button" onclick="enviarATangle()" id="btnEnviar" value="Enviar" class="button special hover">
                          </div>
                          <div id="loaderEnviar" style="display:none">
                             <img src="/img/loader.gif" height="70" width="300"  >
                          </div>


                        </div>
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
      <script src="assets/js/tanglenote.js"></script>
	</body>
</html>
