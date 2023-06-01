<?php 
$UIDresult = $_POST['UIDresult'];
$Write = "<?php $" . "UIDresult='". $UIDresult. "';" . "echo $"."UIDresult;"."?>";
file_put_contents('UIDContainer.php', $Write);
?>

<?php 
include 'connectDB.php';

    //Get current date and time
date_default_timezone_set('Asia/Ho_Chi_Minh');
$d = date("Y-m-d");
$t = date("H:i:sa");

$Tarrive = mktime(07,15,00);
$TimeArrive = date("H:i:sa", $Tarrive);

$Tleft = mktime(17,30,00);
$Timeleft = date("H:i:sa", $Tleft);

if(!empty($_POST['UIDresult'])){

	$Card = $_POST['UIDresult'];

	$sql = "SELECT * FROM users WHERE id=?";
	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
		echo "SQL_Error_Select_card";
		exit();
	}
	else{
		mysqli_stmt_bind_param($result, "s", $Card);
		mysqli_stmt_execute($result);
		$resultl = mysqli_stmt_get_result($result);
		if ($row = mysqli_fetch_assoc($resultl)){ 
			 //An existed card has been detected for Login or Logout
			if (!empty($row['name'])){
				$Uname = $row['name'];
				$manv = $row['manv'];
				$sql = "SELECT * FROM logs WHERE mathe=? AND datelog=CURDATE() AND khoa=0";
				$result = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($result, $sql)) {
					echo "SQL_Error_Select_logs";
					exit();
				}
				else{
					mysqli_stmt_bind_param($result, "s", $Card);
					mysqli_stmt_execute($result);
					$resultl = mysqli_stmt_get_result($result);
					//Login
					if (!$row = mysqli_fetch_assoc($resultl)){
						if ($t <= $TimeArrive) {
							$UserStat = "Arrived on time";
						}
						else{
							$UserStat = "Arrived late";
						}
						$sql = "INSERT INTO logs (name, mathe, manv, datelog, timein, state) VALUES (? ,?, ?, CURDATE(), CURTIME(), ?)";
						$result = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($result, $sql)) {
							echo "SQL_Error_Select_login1";
							exit();
						}else{
							mysqli_stmt_bind_param($result, "ssss", $Uname, $Card, $manv, $UserStat);
							mysqli_stmt_execute($result);
							echo "login";
							exit();
						}
					}
					else{
						//Logout
						if ($t >= $Timeleft && $row['timein'] <= $TimeArrive) {
							$UserStat = "Arrived and Left on time";
						}
						elseif ($t < $Timeleft && $row['timein'] > $TimeArrive){   
							$UserStat = "Arrived late and Left early";
						}
						elseif ($t < $Timeleft && $row['timein'] <= $TimeArrive) {
							$UserStat = "Arrived on time and Left early";
						}
						elseif ($t >= $Timeleft && $row['timein'] > $TimeArrive) {
							$UserStat = "Arrived late and Left on time";
						}
						$sql="UPDATE logs SET timeout=CURTIME(), state=?, khoa=1 WHERE mathe=? AND datelog=CURDATE() AND khoa=0";
						$result = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($result, $sql)) {
							echo "SQL_Error_insert_logout1";
							exit();
						}
						else{
							mysqli_stmt_bind_param($result, "ss", $UserStat, $Card);
							mysqli_stmt_execute($result);

							echo "logout";
							exit();
						}
					}
				}
			}
		}
	}
}
//Empty Card ID
else{
	echo "Empty_Card_ID";
	exit();
}
mysqli_stmt_close($result);
mysqli_close($conn);

?>