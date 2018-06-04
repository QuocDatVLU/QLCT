<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		.container {
			max-width: 30%;
			margin-top: 10%;
		}
	</style>
</head>
<body>
	<div class="container">
	  <form id="form-login" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
	    <div class="form-group">
	      <label for="username">Username:</label>
	      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
	    </div>
	    <div class="form-group">
	      <label for="password">Password:</label>
	      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
	    </div>
	    <button type="submit" class="btn btn-success btn-block" id="login-btn">Login</button>
	  </form>
	</div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script type="text/javascript">
    	$("#form-login").submit(function (event) {
    		event.preventDefault();
    		var logindata = $("#form-login").serialize();
    		$.ajax({
    			method: 'POST',
    			url: 'adminInfo.php',
    			data: logindata,
    		}).done(function (data) {
    			if (data.result) {
    				window.location.href = "index.php";
    				console.log(data.message);
    			}else {
    				alert("Tài khoản hoặc mật khẩu không chính xác")
    				console.log(data.message);
    			}
    		})
    	})
    </script>
</body>
</html>