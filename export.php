<?php
session_start();
    //Connect to database
    include'connectDB.php';

$output = '';
$outputdata = $_SESSION['exportdata'];

if(isset($_POST["export"])){

    $query = "SELECT * FROM logs WHERE datelog='$outputdata' ";
    $result = mysqli_query($conn, $query);
    if($result->num_rows > 0){
        $output .= '
                    <table class="table" bordered="1">  
                      <TR>
                        <TH>ID.No</TH>
                        <TH>Họ tên</TH>
                        <TH>Mã thẻ</TH>
                        <TH>Mã NV</TH>
                        <TH>Ngày</TH>
                        <TH>Thời gian vào</TH>
                        <TH>Thời gian ra</TH>
                        <TH>Trạng thái</TH>
                      </TR>';

      while($row=$result->fetch_assoc()) {

          $output .= '
                      <TR> 
                          <TD> '.$row['id'].'</TD>
                          <TD> '.$row['name'].'</TD>
                          <TD> '.$row['mathe'].'</TD>
                          <TD> '.$row['manv'].'</TD>
                          <TD> '.$row['datelog'].'</TD>
                          <TD> '.$row['timein'].'</TD>
                          <TD> '.$row['timeout'].'</TD>
                          <TD> '.$row['state'].'</TD>
                      </TR>';
      }
      $output .= '</table>';
      header('Content-Type: application/xls');
      header('Content-Disposition: attachment; filename=UserLog'.$outputdata.'.xls');
      echo $output;
    }
    else{
        header( "location: userLog.php" );
    }
}
?>