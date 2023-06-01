<?php 
include 'connectDB.php';
$id = null;
if (!empty($_GET['id'])){
	$id = $_REQUEST['id'];
}
	// Tao cau truy van
$sql = "SELECT * FROM users where id = '".$id."'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
	// Dong ket noi
$conn->close();
	// Check
$msg = null;
// if ($data['name']==null)
if ($data['id']!=$id){
	$msg = "Thẻ chưa đăng ký!";
	$data['id']=$id;
	$data['name']="----------";
	$data['manv']="----------";
	$data['chucvu']="----------";
	$data['gt']="----------";
	$data['sdt']="----------";
	$data['email']="----------";
} else {
	$msg = null;
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
	<style>
	td.lf{
		padding-left: 15px;
		padding-top: 12px;
		padding-bottom: 12px;
	}
</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<table  class="table table-bordered" align="center">
				<tr>
					<td align="center" colspan="2"><strong>User Data</strong></td>
				</tr>

				<tr>
					<td class="lf">ID:</td>
					<td align="left"><?php echo $data['id']; ?></td>
				</tr>

				<tr>
					<td class="lf">Họ tên:</td>
					<td align="left"><?php echo $data['name']; ?></td>
				</tr>

				<tr>
					<td class="lf">Mã NV:</td>
					<td align="left"><?php echo $data['manv']; ?></td>
				</tr>

				<tr>
					<td class="lf">Chức vụ:</td>
					<td align="left"><?php echo $data['chucvu']; ?></td>
				</tr>

				<tr>
					<td class="lf">Giới tính:</td>
					<td align="left"><?php echo $data['gt']; ?></td>
				</tr>

				<tr>
					<td class="lf">SĐT:</td>
					<td align="left"><?php echo $data['sdt']; ?></td>
				</tr>

				<tr>
					<td class="lf">Email:</td>
					<td align="left"><?php echo $data['email']; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<p style="color: red" align="center" class="alert-danger"><?php echo $msg; ?></p>
</body>
</html>