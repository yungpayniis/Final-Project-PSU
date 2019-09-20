<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGISTER</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">
<form name="formregis" method="post" action="check_register.php">
  <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">REGISTER</div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <div class="form-label-group">
                <input name="txtUsername" type="text" id="txtUsername" class="form-control"  >
                <label for="txtUsername">Student ID</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input name="txtPassword" type="password" id="txtPassword" class="form-control"  >
                <label for="txtPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input name="name_lastname" type="text" id="name_lastname" class="form-control"  >
                <label for="txtPassword">Name - lasname</label>
              </div>
            </div>
            
           
            <input class="btn btn-primary btn-block" type="submit" name="Submit" value="Register">
          </form>
          <div class="text-center">
           <!-- <a class="d-block small mt-3" href="register.html">Register an Account</a>
           <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
          </div>
        </div>
      </div>
    </div>

</form>



</body>
</html>