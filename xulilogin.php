<?php
    session_start();
    $u = $_POST['user'];
    $p = $_POST['pass'];
    $db= mysqli_connect("localhost","root","","rfid");
    $sql= "select * from admin where admin_email = '$u' and admin_pwd ='$p'";
    $rs = mysqli_query($db,$sql);
    if(mysqli_num_rows($rs) >0){
        $_SESSION['username'] = $u;
        header('Location: readTag.php');
    }else{
        header('Location: login.php');
    }
?>