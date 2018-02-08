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
            <?php
              if($_SESSION['user']=="aleelus"){
                echo '<li><a href="consola.php">Consola</a></li>';
              }
             ?>
            <li><a href="yt.php">YouTube</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
</header>
