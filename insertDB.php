<?php 
	include 'connectDB.php';
	if (!empty($_POST)){
		// theo doi cac gia tri post
		$name = $_POST['name'];
		$id = $_POST['id'];
		$manv = $_POST['manv'];
		$chucvu = $_POST['chucvu'];
		$gt = $_POST['gt'];
		$sdt = $_POST['sdt'];
		$email = $_POST['email'];
		// insert vao DB
		$sql = "INSERT INTO users (id, name, manv, chucvu, gt, sdt, email) VALUES ('".$id."', '".$name."', '".$manv."', '".$chucvu."', '".$gt."', '".$sdt."', '".$email."')";

		if ($conn->query($sql)===TRUE){
			echo "OK";
		} else {
			echo "Error: ".$sql. "<br>" . $conn->error;
		}
		$conn->close();
		header("Location: userData.php");
	}
 ?>