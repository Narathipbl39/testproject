<?php
require __DIR__ . "/../config/connect.php";

function Getusers()
{
    $response = array();

    $sql = "SELECT * FROM `user`";
    $query = $GLOBALS['conn']->query($sql);

    while ($result = $query->fetch_assoc()) {
        $response[] = $result;
    }
    return $response;
}

function GetusersById($user_id)
{
    $sql = "SELECT * FROM `user` WHERE `user_id` = '$user_id'";
    $query = $GLOBALS['conn']->query($sql);

    $result = $query->fetch_assoc();
    return $result;
}



function UpdateData($user_id, $user_name, $user_lastname, $user_stdid, $user_address, $user_numberphone, $user_gender, $user_username, $user_password)
{
    $sql = "UPDATE `user` SET `user_password` = '$user_password',`user_name` = '$user_name',`user_lastname` = '$user_lastname', `user_stdid` = '$user_stdid',`user_address` = '$user_address',`user_numberphone` = '$user_numberphone', `user_gender` = '$user_gender',`user_username`='$user_username',`user_password`='$user_password' WHERE `user_id` = '$user_id'";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}
if (isset($_GET['method']) && $_GET['method'] == "EditData") {
    require __DIR__ . "/../config/define.php";

    $user_id = $_POST['user_id'];
  
    $user_name = $_POST['user_name'];
    $user_lastname = $_POST['user_lastname'];
    $user_stdid = $_POST['user_stdid'];
    $user_address = $_POST['user_address'];
    $user_numberphone = $_POST['user_numberphone'];
    $user_gender = $_POST['user_gender'];
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $response = UpdateData($user_id, $user_name, $user_lastname, $user_stdid, $user_address, $user_numberphone, $user_gender, $user_username, $user_password);

    if (!$response) {
    ?>
        <script>
            alert('แก้ไขรายการไม่สำเร็จ โปรดลองใหม่อีกครั้ง!');
            window.location.replace("<?= WEBSIDE_URL ?>edituser.php?user_id=" + "<?= $user_id ?>");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('แก้ไขรายการเรียบร้อยแล้ว');
            window.location.replace("<?= WEBSIDE_URL ?>edituser.php?user_id=" + "<?= $user_id ?>");
        </script>
    <?php
    }
}