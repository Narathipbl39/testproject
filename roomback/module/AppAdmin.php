<?php
require __DIR__ . "/../../config/connect.php";


function Login($username, $password)
{
    $sql = "SELECT `username`, `password`, `admin_id`,'admin_status' FROM `admin` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
    $query = $GLOBALS['conn']->query($sql);

    if ($query->num_rows > 0) {
        $result = $query->fetch_assoc();
        return $result;
    } else {
        return false;
    }
}
if (isset($_GET['method']) && $_GET['method'] == "Login") {
    require __DIR__ . "/../../config/define.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $data_login = Login($username, $password);

    if (!$data_login) {
?>
        <script>
            alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!');
            window.location.replace("<?= ROOMBACK_URL ?>login/form.php");
        </script>

    <?php
    } else {
        setcookie('admin_id', $data_login['admin_id'], time() + (86400 * 30), "/");
        setcookie('admin_username', $data_login['username'], time() + (86400 * 30), "/");
        setcookie('admin_status', $data_login['admin_status'], time() + (86400 * 30), "/");

    ?>
        <script>
            window.location.replace("<?= ROOMBACK_URL ?>index.php");
        </script>
    <?php
    }
}

if (isset($_GET['method']) && $_GET['method'] == "Logout") {
    require __DIR__ . "/../../config/define.php";
    setcookie('admin_id', null, -1, '/');
    setcookie('username', null, -1, '/');
    setcookie('admin_status', null, -1, '/');
    ?>
    <script>
        window.location.replace("<?= ROOMBACK_URL ?>login/form.php");
    </script>
<?php
}
