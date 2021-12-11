<?php
require __DIR__ . "/../config/connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE `user_username` = '$username' AND `user_password` = '$password'";
$result = $GLOBALS['conn']->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    setcookie('id', $row['user_id'], time() + (86400 * 30), "/");
    setcookie('user_status', $row['user_status'], time() + (86400 * 30), "/");
    setcookie('user_name', $row['user_name'], time() + (86400 * 30), "/");
    setcookie('user_username', $row['user_username'], time() + (86400 * 30), "/");
    header('location: ../index.php');
} else {
?>
    <script>
        alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง !');
        window.location.replace('login.php');
    </script>
<?php
}
