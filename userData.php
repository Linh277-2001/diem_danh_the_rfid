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
			<div class="col-sm-12">
				<table class="table table-bordered table-inverse table-hover">
					<thead>
						<tr>
							<th>Họ Tên</th>
							<th>ID</th>
							<th>Mã NV</th>
							<th>Chức vụ</th>
							<th>Giới tính</th>
							<th>SĐT</th>
							<th>Email</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include 'connectDB.php';
							$sql = 'SELECT * FROM users ORDER BY name ASC';
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
							    	echo '<tr>';
							    	echo '<th>'.$row['name'].'</th>';
							    	echo '<th>'.$row['id'].'</th>';
							    	echo '<th>'.$row['manv'].'</th>';
							    	echo '<th>'.$row['chucvu'].'</th>';
							    	echo '<th>'.(($row['gt'] == 0)?'Nam':'Nữ').'</th>';
							    	echo '<th>'.$row['sdt'].'</th>';
							    	echo '<th>'.$row['email'].'</th>';
							    	echo '<th>
							    	<a href="userDataEdit.php?id='.$row['id'].'" class="btn btn-success">Sửa</a>
							    	<a href="userDataDelete.php?id='.$row['id'].'" class="btn btn-danger">Xóa</a></th>';
							    	echo '</tr>';
								}
							} else {
								echo 'Không có dữ liệu!';
							}
							$conn->close();
						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>