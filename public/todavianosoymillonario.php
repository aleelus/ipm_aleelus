<!doctype html>
<html>
  <head>
  <title>aleelus IPM</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="app.css">
  <link rel="stylesheet" type="text/css" href="custom.css">
  </head>

  <script src="/socket.io/socket.io.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="/component/peer.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js" /></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
  <script src="app.js"></script>

 <body>

<div id="aside" class="app-aside modal fade nav-expand">
<div class="left navside black dk" layout="column">
  <div class="navbar no-radius">
    <!-- brand -->
    <a class="navbar-brand">
      <a href="http://iota.org/" target="_blank" ><span class="m-t-lg"><img src="/img/logo.png" alt="..." class="w-60 r"></span> </a>
      <h5 class="text-center">Peer Manager</h5>
    </a>
    <!-- / brand -->
  </div>
  <div flex-no-shrink="">
  </div>
  <div flex="" class="hide-scroll mt-20">
    <nav class="scroll nav-stacked nav-active-primary text-center">
    </nav>
  </div>
</div>
</div>
    <div class="app-content p-l">
	  <div class="row">
	      <div id="systeminfo">
	      </div>
	  </div>
	  <div class="row">
	      <div id="peers">
	      </div>
	  </div>
</body>

</html>
