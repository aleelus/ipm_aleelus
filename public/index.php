<!DOCTYPE html>
<html>
<head>
  <title>aleelus</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="dsg.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<div class="row">
      <div class="center">
      <br>
			<div class="col-md-12">
  				<div class="col-md-5 col-md-offset-3">
            <div class="form-login">
              <h4>Bienvenido</h4>
              <form action="submit" id="formlg" >
                  <input type="text" name="user" id="user" pattern="[A-Za-z0-9_-]{1,15}"  required class="form-control input-sm" placeholder="Usuario"/>
                  </br>
                  <input type="password" name="password" pattern="[A-Za-z0-9_-]{1,15}" required id="password" class="form-control input-sm" placeholder="Password"/>
                  </br>
                  <div class="wrapper">
                      <input type="button" name="login" id="login" value="Login" class="btn btn-primary btn-sm">
                  </div>
              </form>
            </div>
            <span id="result"></span>
  				</div>
        </div>
			</div>
		</div>
	</div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="main.js"></script>
</body>
</html>
