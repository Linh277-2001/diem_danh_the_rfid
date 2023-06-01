<?php
session_start();
if (!isset($_SESSION['username'])) {
	 header('Location: index.php');
}
?>
<?php
    //Connect to database
include'connectDB.php';

    //Get current date and time
date_default_timezone_set('Asia/Ho_Chi_Minh');
$d = date("Y-m-d");


$db = mysqli_connect("localhost", "root", "", "rfid");
$sql = "select * from time where id=1 ";
$rs = mysqli_query($db, $sql);
if ($rs->num_rows > 0) {
	while ($row = $rs->fetch_assoc()) {
		$gioden= $row["gioden"];
		$phutden= $row["phutden"];
		$giayden= $row["giayden"];
		$giotan= $row["giotan"];
		$phuttan= $row["phuttan"];
		$giaytan= $row["giaytan"];
	}
}

$Tarrive = mktime($gioden,$phutden,$giayden);
$TimeArrive = date("H:i:sa", $Tarrive);
// var_dump($TimeArrive);exit;  
// >>> string(10) "07:15:00am"

$Tleft = mktime($giotan,$phuttan,$giaytan);
$Timeleft = date("H:i:sa", $Tleft);



// $Tarrive = mktime(07,15,00);
// $TimeArrive = date("H:i:sa", $Tarrive);

// $Tleft = mktime(17,30,00);
// $Timeleft = date("H:i:sa", $Tleft);

if (!empty($_POST['seldate'])) {
	$seldate = $_POST['date'];
}
else{
	$seldate = $d;
}

$_SESSION["exportdata"] = $seldate;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="bootstrap5/css/bootstrap.css">
	<script type="text/javascript" src="bootstrap5/js/bootstrap.js"></script>
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
	href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
	rel="stylesheet">

	<title>Users Logs</title>
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
	<script src="jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			setInterval(function(){
				$.ajax({
					url: "load-users.php"
				}).done(function(data) {
					$('#cards').html(data);
				});
			},3000);
		});
	</script>
	<style>

	header .head h1 {
		font-family:Nunito, sans-serif ;
		text-align: center;
		color:#000;
	}

	header .opt {
		float: right;margin: -100px 20px 0px 0px
	}
	header .opt a {
		text-decoration: none;
		font-family:Nunito, sans-serif;
		text-align: center;
		font-size:20px;
		color:red;
		margin-right: 15px
	}
	header .opt a:hover {
		opacity: 0.8;
		cursor: pointer;
	}
	header .opt #inp {
		padding:3px;
		margin:0px 0px 0px 33px;
		background-color:#00A8A9;
		font-family:Nunito, sans-serif;
		font-size:16px; 
		opacity: 0.6;
		color:#000;
	}
	header .opt #inp:hover {
		background-color: #00A8A9; 
		opacity: 0.8;
	}
	header .opt input {
		padding-left:5px; 
		margin:2px 0px 3px 20px; 
		border-radius:7px; 
		border-color: #A40D0F ; 
		background-color:#8E8989; 
		color: white;
	}
	header .opt p {
		font-family:Nunito, sans-serif;
		text-align: left;
		font-size:19px;
		color:#000;
	}
	.export {
		margin: 0px 0px 10px 20px; 
		background-color:#900C3F ;
		font-family:Nunito, sans-serif;
		border-radius: 7px;
		width: 145px;
		height: 28px;
		color: #FFC300; 
		border-color: #581845;
		font-size:17px
	}
	.export:hover {
		cursor: pointer;
		background-color:#C70039
	}
	#table {
		font-family: Nunito, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	#table td, #table th {
		border: 1px solid #ddd;
		padding: 8px;
		opacity: 0.6;
	}

	#table tr:nth-child(even){
		background-color: #f2f2f2;
	}
	#table tr:nth-child(odd){
		background-color: #f2f2f2;
		opacity: 0.9;
	}

	#table tr:hover {
		background-color: #ddd; 
		opacity: 0.8;
	}

	#table th {
		opacity: 0.6;
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #00A8A9;
		color: white;
	}
</style>
</head>
<body>
	<header >
		<h1 class="display-4" align="center">QUẢN LÝ NHÂN VIÊN</h1>
		<?php include 'menubar.php'; ?>
		<br>
		<div class="head">
			<h1>Báo cáo</h1>
		</div>	        

		<div class="opt">
			<table border="0">
				<tr>
					<td>
						<td>
							<br>
							<p style="margin-top: 78px">Select the date log:
								<form method="POST" action="">
									<input type="date" name="date"><br>
									<input type="submit" name="seldate" value="Select Date" id="inp">
								</form></p>
							</td>
						</td>
					</tr>
				</table>
			</div>
		</header>
		<h3 style="margin-left: 15px;">
			Giờ làm việc: <?php echo $TimeArrive?><br>
			Giờ tan ca: <?php echo $Timeleft?>
		</h3>

		<form method="post" action="export.php">
			<input type="submit" name="export" class="export" value="Export to Excel" />
		</form>
		<div id="cards" class="cards">
		</div>
	</body>
	</html>
