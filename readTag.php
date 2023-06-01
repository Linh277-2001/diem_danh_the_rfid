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

	td.lf{
		padding-left: 15px;
		padding-top: 12px;
		padding-bottom: 12px;
	}

	@media (max-width: 400px) {
		.col-md-6 {
			width: 100%;
		}

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
			<div class="col-md-12">
				<br>
				<h3 align="center" id="blink" style="color: red">Please Scan Tag to Display ID or User Data</h3>
				<p id="getUID" hidden></p>
				<br>
				<div id="show_user_data">
					<table  class="table table-bordered" align="center">
						<tr>
							<td align="center" colspan="2"><strong>User Data</strong></td>
						</tr>
						<tr>
							<td class="lf">ID:</td>
							<td align="left">--------</td>
						</tr>
						<tr>
							<td class="lf">Họ tên:</td>
							<td align="left">--------</td>
						</tr>
						<tr>
							<td class="lf">Mã NV:</td>
							<td align="left">--------</td>
						</tr>
						<tr>
							<td class="lf">Chức vụ:</td>
							<td align="left">--------</td>
						</tr>
						<tr>
							<td class="lf">Giới tính:</td>
							<td align="left">--------</td>
						</tr>
						<tr>
							<td class="lf">SĐT:</td>
							<td align="left">--------</td>
						</tr>
						<tr>
							<td class="lf">Email:</td>
							<td align="left">--------</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script>
		var myVar = setInterval(myTimer, 1000);
		var myVar1 = setInterval(myTimer1, 1000);
		var oldID="";
		clearInterval(myVar1);

		function myTimer() {
			var getID=document.getElementById("getUID").innerHTML;
			oldID=getID;
			if(getID!="") {
				myVar1 = setInterval(myTimer1, 500);
				showUser(getID);
				clearInterval(myVar);
			}
		}

		function myTimer1() {
			var getID=document.getElementById("getUID").innerHTML;
			if(oldID!=getID) {
				myVar = setInterval(myTimer, 500);
				clearInterval(myVar1);
			}
		}

		function showUser(str) {
			if (str == "") {
				document.getElementById("show_user_data").innerHTML = "";
				return;
			} else {
				if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("show_user_data").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","controlReadTag.php?id="+str,true);
					xmlhttp.send();
				}
			}
			
			var blink = document.getElementById('blink');
			setInterval(function() {
				blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
			}, 750); 
		</script>
	</body>
	</html>