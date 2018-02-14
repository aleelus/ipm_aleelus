<?php

session_start();
if(!isset($_SESSION['user']))
{
     header("location:micuenta.php");
}
?>

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
      echo '<input type="label" name="hashAnterior" id="hashAnterior'.$numero.'" class="form-control input-lg" disabled/>';
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
