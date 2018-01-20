<!-- All the files that are required -->
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="dsg.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="app.css">
<link rel="stylesheet" type="text/css" href="custom.css">

<script src="/socket.io/socket.io.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="/component/peer.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js" /></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


<?php

session_start();

if(isset($_SESSION["user"])){
    header("location:index.php");
}

?>


<body>
	<div class="container">
		<div class="row">
      <div class="center">
      <br>
			<div class="col-md-12">
  				<div class="col-md-5 col-md-offset-3">
            <div class="form-login">
                <h4>Bienvenido</h4>
                <input type="text" name="user" id="user" class="form-control input-sm" placeholder="Usuario"/>
                </br>
                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password"/>
                </br>
                <div class="wrapper">
                    <input type="button" name="login" id="login" value="Login" class="btn btn-primary btn-sm">
                </div>
            </div>
            <span id="result"></span>
  				</div>
        </div>
			</div>
		</div>
	</div>

</body>

<script>
    $(document).ready(function(){
        $('#login').click(function(){
           var user = ('#user').val();
           var password = ('#password').val();

           if($.trim(user).length>0 && $.trim(password).length>0){
               $.ajax({
                   url:"/validarLogin.php",
                   method:"POST",
                   data:{user:user, password:password},
                   cache:"false",
                   beforeSend:function(){
                       $('#login').val("Conectando..");

                   },
                   success:function(data){
                       $('#login').val("Login");
                       if(data=="1"){
                           $(location).attr('href','todavianosoymillonario.php');
                       }else{
                           $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> las credenciales son incorrectas.</div>");
                       }

                   }

               })
           }
        });

    });
</script>
