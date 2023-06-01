<?php 
include 'connectDB.php';
$id = 0;

if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( !empty($_POST)) {
        // keep track post values
	$id = $_POST['id'];
        // tao cau truy van
	$sql = "delete from users where id ='".$id."'";
	$conn->query($sql);
	$conn->close();
	header("Location: userData.php");
}

?>

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
				<br>
				<h3 align="center">Xóa nhân viên</h3>
				<br>
				<form action="userDataDelete.php" method="post"
				class="form-control">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<p class="alert alert-danger">Đồng ý xóa?</p>
				<button type="submit" class="btn btn-danger" style="margin-left: 40%;">Yes</button>
				<a class="btn btn-success" href="userData.php">No</a>
			</form>
		</div>
	</div>
</div>
</body>
</html>