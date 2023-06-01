
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="bootstrap5/css/bootstrap.css">
	<script type="text/javascript" src="bootstrap5/js/bootstrap.js"></script>
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">
</head>
<body>
	<h1 class="display-4" align="center">QUẢN LÝ NHÂN VIÊN</h1>
	<?php include 'menubar.php'; ?>

	<div class="container">
    <div class="row">
      <div class="col-sm-6 offset-3">
       <h3 class="display-4" align="center">Đăng Nhập</h3>
       <div class="div" >

        <form style="width: 100%; margin: 20px 0px; border-radius: 40px; border: 5px solid #fff" method="POST" action="xulilogin.php">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input name="user" type="email" id="form2Example1" class="form-control" required />
            <label class="form-label" for="form2Example1">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input name="pass" type="password" id="form2Example2" class="form-control" required />
            <label class="form-label" for="form2Example2">Password</label>
          </div>
          <!-- Submit button -->
          <button style="margin: 0 40%" type="submit" class="btn btn-primary btn-block mb-4">Đăng nhập</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</body>
</html>