<style>

.ball {
    background-color: rgba(0,0,0,0);
    border: 5px solid rgba(0,183,229,0.9);
    opacity: .9;
    border-top: 5px solid rgba(0,0,0,0);
    border-left: 5px solid rgba(0,0,0,0);
    border-radius: 50px;
    box-shadow: 0 0 35px #2187e7;
    width: 50px;
    height: 50px;
    margin: 0 auto;
    -moz-animation: spin .5s infinite linear;
    -webkit-animation: spin .5s infinite linear;
}

.ball1 {
    background-color: rgba(0,0,0,0);
    border: 5px solid rgba(0,183,229,0.9);
    opacity: .9;
    border-top: 5px solid rgba(0,0,0,0);
    border-left: 5px solid rgba(0,0,0,0);
    border-radius: 50px;
    box-shadow: 0 0 15px #2187e7;
    width: 30px;
    height: 30px;
    margin: 0 auto;
    position: relative;
    top: -50px;
    -moz-animation: spinoff .5s infinite linear;
    -webkit-animation: spinoff .5s infinite linear;
}

@-moz-keyframes spin {
    0% {
        -moz-transform: rotate(0deg);
    }

    100% {
        -moz-transform: rotate(360deg);
    };
}

@-moz-keyframes spinoff {
    0% {
        -moz-transform: rotate(0deg);
    }

    100% {
        -moz-transform: rotate(-360deg);
    };
}

@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
    };
}

@-webkit-keyframes spinoff {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(-360deg);
    };
}

</style>




<div class="wrapper style5" id="marco">
  <div class="row">
    <div class="col-md-2">
      <p>Bloque:</p>
    </div>
    <div class="col-md-10">
      <?php
      echo '<input type="text" name="bloque" id="bloque'.$numero.'" value="'.$numero.'" class="form-control input-lg" placeholder="N° de bloque" disabled/>';
      ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      <p>Datos</p>
    </div>
    <div class="col-md-10">
      <?php
      echo '<textarea style="resize:none;" type="form-control" rows="4" name="data" id="data'.$numero.'" placeholder="Ingrese lo que quiera :)"></textarea>';
      ?>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-2">
      <p>Nonce</p>
    </div>
    <div class="col-md-10">
      <?php
      echo '<input type="text" name="nonce" id="nonce'.$numero.'" class="form-control input-lg" placeholder="N° de nonce"/>';
      ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      <p>Hash anterior</p>
    </div>
    <div class="col-md-10">
      <?php
      echo '<input type="label" name="hashAnterior" id="hashAnterior'.$numero.'" class="form-control input-lg"/>';
      ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      <p>Hash actual</p>
    </div>
    <div class="col-md-10">
      <?php
      echo '<input type="label" name="hash" id="hash'.$numero.'" class="form-control input-lg"/>';
      ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <?php
      echo '<input type="submit" name="minar" id="minar'.$numero.'" value="Minar bloque" class="button special hover btn-block">';      
      ?>
    </div>
  </div>

</div>
