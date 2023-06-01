<?php 
	include 'connectDB.php';
	
	$id = (isset($_POST['id']))?$_POST['id']:'';

	if($_POST['id1']==''){
		$id1 = $_POST['id'];
	// var_dump($id1);exit;
	}else{
		$id1 = $_POST['id1'];
		// var_dump($id1);exit;
	}
	
	$name = (isset($_POST['name']))?$_POST['name']:'';
	$manv = (isset($_POST['manv']))?$_POST['manv']:'';
	$chucvu = (isset($_POST['chucvu']))?$_POST['chucvu']:'';
	$gt = (isset($_POST['gt']))?$_POST['gt']:'';
	$sdt = (isset($_POST['sdt']))?$_POST['sdt']:'';
	$email = (isset($_POST['email']))?$_POST['email']:'';

	$sql = "UPDATE users
		SET id= '$id1', name='$name', manv='$manv', chucvu='$chucvu', gt='$gt', sdt='$sdt', email='$email' WHERE id='".$id."'";

	$result = $conn->query($sql);

	if ($result === TRUE) {
		echo "New record created successfully".'<br>';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	header("Location: userData.php");
 ?>