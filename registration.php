<?php
session_start();
if (!isset($_SESSION['username'])) {
	 header('Location: index.php');
}
?>
<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap5/css/bootstrap.css">
	<script type="text/javascript" src="bootstrap5/js/bootstrap.js"></script>
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
	href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
	rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#getUID").load("UIDContainer.php");
			setInterval(function() {
				$("#getUID").load("UIDContainer.php");
			}, 500);
		});
	</script>
	<style>
		@media (max-width: 400px) {
			.offset-3 {
				margin-left: 0%;
			}
		}
	</style>
</head>

<body>
	<h1 class="display-4" align="center">QUẢN LÝ NHÂN VIÊN</h1>
	<?php include 'menubar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-3">
				<br>
				<h3 align="center">Đăng ký</h3>
				<br>
				<form class="form-control" action="insertDB.php" method="post" >
					<div class="form-group">
						<label class="form-label">ID</label>
						<div class="control">
							<textarea name="id" id="getUID" placeholder="Quét thẻ để hiển thị UID" rows="1" cols="1" required class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label">Họ tên</label>
						<div class="controls">
							<input id="div_refresh" name="name" type="text"  placeholder="" required class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="form-label">Mã nhân viên</label>
						<div class="controls">
							<input name="manv" type="text" placeholder="" required class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">Chức vụ</label>
						<div class="controls">
							<input name="chucvu" type="text" placeholder="" required class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">Giới tính</label>
						<div class="controls">
							<select name="gt" class="form-control">
								<option value="0">Nam</option>
								<option value="1">Nữ</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">SĐT</label>
						<div class="controls">
							<input name="sdt" type="text"  placeholder="" required class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">Email</label>
						<div class="controls">
							<input name="email" type="text"  placeholder="" required class="form-control">
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-success">Đăng ký</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>