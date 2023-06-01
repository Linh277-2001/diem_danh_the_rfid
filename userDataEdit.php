<?php 
include 'connectDB.php';
$id = null;
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}
// Tao cau truy van
$sql = "SELECT * FROM users where id = '".$id."'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
// Dong ket noi
$conn->close();
?>

<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);
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
</head>
<body>
	<h1 class="display-4" align="center">QUẢN LÝ NHÂN VIÊN</h1>
	<?php include 'menubar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-3">
				<br>
				<h3 align="center">Cập nhật thông tin</h3>
				<br>
				<form class="form-control" action="userDataDB.php" method="post" >
					<div class="form-group">
						<label class="form-label">ID hiện tại</label>
						<div class="control">
							<input class="form-control" type="text" value="<?= $data['id'] ?>" aria-label="Disabled input example" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">ID mới:</label>
						<div class="control">
							<textarea name="id1" id="getUID" placeholder="<?= $data['id'] ?>" rows="1" cols="1" class="form-control"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">Họ tên</label>
						<div class="controls">
							<input id="div_refresh" name="name" type="text"  value="<?= $data['name'] ?>" required class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">Mã nhân viên</label>
						<div class="controls">
							<input name="manv" type="text" value="<?= $data['manv'] ?>" required class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">Chức vụ</label>
						<div class="controls">
							<input name="chucvu" type="text" value="<?= $data['chucvu'] ?>" required class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">Giới tính</label>
						<div class="controls">
							<select name="gt" class="form-control">
								<?php 
								if($data['gt']==0){
									?>
									<option value="1">Nữ</option>
									<option value="0" selected="">Nam</option>
									<?php 
								}else if ($data['gt']==1){
									?>
									<option value="1" selected="">Nữ</option>
									<option value="0">Nam</option>
									<?php 
								}?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">SĐT</label>
						<div class="controls">
							<input name="sdt" type="number" value="<?= $data['sdt'] ?>" required class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="form-label">Email</label>
						<div class="controls">
							<input name="email" type="text" value="<?= $data['email'] ?>" required class="form-control">
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-success">Sửa</button>
						<input type="hidden" name="id" value="<?= $data['id'] ?>">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>