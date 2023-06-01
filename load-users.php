<TABLE id='table'>
<TR>
    <TH>ID.No</TH>
    <TH>Họ tên</TH>
    <TH>Mã thẻ</TH>
    <TH>Mã NV</TH>
    <TH>Ngày</TH>
    <TH>Thời gian vào</TH>
    <TH>Thời gian ra</TH>
    <TH>Trạng thái</TH>
</TR>
<?php
session_start();
//Connect to database
include'connectDB.php';

$seldate = $_SESSION["exportdata"];

$sql = "SELECT * FROM logs WHERE datelog='$seldate' ORDER BY id DESC";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
?>
        <TR>
        <TD><?php echo $row['id'];?></TD>
        <TD><?php echo $row['name'];?></TD>
        <TD><?php echo $row['mathe'];?></TD>
        <TD><?php echo $row['manv'];?></TD>
        <TD><?php echo $row['datelog'];?></TD>
        <TD><?php echo $row['timein'];?></TD>
        <TD><?php echo $row['timeout'];?></TD>
        <TD><?php echo $row['state'];?></TD>
        </TR>
<?php
  }
}
?>
</TABLE>