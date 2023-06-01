<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.css">
    <script type="text/javascript" src="bootstrap5/js/bootstrap.js"></script>
</head>

<body>
    <h1 class="display-4" align="center">QUẢN LÝ NHÂN VIÊN</h1>
    <?php include 'menubar.php'; ?>
    <form class="col-sm-6 offset-3" action='' method="post">
        <h3 align="center">GIỜ ĐẾN/TAN</h3>
        <?php
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
                $giaytan= $row["giaytan"];}}
        ?>
        <div>
            <label  class="form-label">Giờ đến</label>
            <input type="number" value=<?php echo $gioden ?> name='gioden' class="form-control" required>
        </div>
        <div>
            <label class="form-label">Phút đến</label>
            <input type="number" value="<?php echo $phutden ?>" name='phutden' class="form-control"  required>
        </div>
        <div>
            <label class="form-label">Giây đến</label>
            <input type="number" value=<?php echo $giayden ?> name='giayden' class="form-control" required>
        </div>
        <div>
            <label class="form-label">Giờ tan</label>
            <input type="number" value=<?php echo $giotan ?> name='giotan' class="form-control" required>
        </div>
        <div>
            <label  class="form-label">Phút tan</label>
            <input type="number" value=<?php echo $phuttan ?> name='phuttan' class="form-control"  required>
        </div>
        <div>
            <label  class="form-label">Giây tan</label>
            <input type="number" value=<?php echo $giaytan ?> name='giaytan' class="form-control"  required>
        </div>

        <button style="margin: 10px 43%;" type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
    <br>


    <?php
    if (isset($_POST['gioden'])) {
        $gioden = $_POST['gioden'];
        $phutden = $_POST['phutden'];
        $giayden = $_POST['giayden'];
        $giotan = $_POST['giotan'];
        $phuttan = $_POST['phuttan'];
        $giaytan = $_POST['giaytan'];

        $db = mysqli_connect("localhost", "root", "", "rfid");
        $sql = "update time set gioden = '$gioden', phutden = '$phutden',giayden = '$giayden',
                giotan = '$giotan',phuttan = '$phuttan',giaytan = '$giaytan' where id=1 ";
        $rs = mysqli_query($db, $sql);
       
        header('Location: userLog.php');
        }
    ?>

</body>

</html>