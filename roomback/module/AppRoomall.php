<?php
require __DIR__ . "/../../config/connect.php";

function Getroomall()
{

    $response = array();

    $sql = "SELECT * FROM `room` ";
    $query = $GLOBALS['conn']->query($sql);

    while ($result = $query->fetch_assoc()) {
        $response[] = $result;
    }
    return $response;
}

function GetroomallById($room_id)
{
    $sql = "SELECT * FROM `room` WHERE `room_id` = '$room_id'";
    $query = $GLOBALS['conn']->query($sql);

    $result = $query->fetch_assoc();
    return $result;
}


function InsertData($room_name, $room_floor, $room_object, $room_chair,  $imgup)
{
    $sql = "INSERT INTO `room`( `room_name`, `room_floor`, `room_object`,`room_chair`,`room_photo`) VALUES ('$room_name','$room_floor','$room_object','$room_chair','$imgup')";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function UpdateData($room_id, $room_name, $room_floor, $room_object, $room_chair, $imgup)
{
    $sql = "UPDATE `room` SET `room_name` = '$room_name', `room_floor` = '$room_floor', `room_object` = '$room_object', `room_chair` = '$room_chair', `room_photo` = '$imgup' WHERE `room_id` = '$room_id'";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function DeleteData($room_id)
{
    $sql = "DELETE FROM `room` WHERE `room_id` = '$room_id'";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['method']) && $_GET['method'] == "AddData") {
    require __DIR__ . "/../../config/define.php";

    $imgup = $_FILES['file']['name'];
    if ($imgup != "") {
        $target_dir = "../../img/roompic/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $imgup);
        }
    } else {
        $imgup = $_POST['room_photo'];
    }

    $room_name = $_POST['room_name'];
    $room_floor = $_POST['room_floor'];
    $room_object = $_POST['room_object'];
    $room_chair = $_POST['room_chair'];


    $response = InsertData($room_name, $room_floor, $room_object, $room_chair, $imgup);

    if (!$response) {
?>
        <script>
            alert('เพิ่มรายการไม่สำเร็จ โปรดลองใหม่อีกครั้ง!');
            window.location.replace("<?= ROOMBACK_URL ?>roomall.php");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('เพิ่มรายการเรียบร้อยแล้ว');
            window.location.replace("<?= ROOMBACK_URL ?>roomall.php");
        </script>
    <?php
    }
}

if (isset($_GET['method']) && $_GET['method'] == "EditData") {
    require __DIR__ . "/../../config/define.php";

    $imgup = $_FILES['file']['name'];
    if ($imgup != "") {
        $target_dir = "../../img/roompic/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $imgup);
        }
    } else {
        $imgup = $_POST['room_photo'];
    }

    $room_name = $_POST['room_name'];
    $room_floor = $_POST['room_floor'];
    $room_object = $_POST['room_object'];
    $room_chair = $_POST['room_chair'];
    $room_id = $_POST['room_id'];

    $response = UpdateData($room_id, $room_name, $room_floor, $room_object, $room_chair, $imgup);

    if (!$response) {
    ?>
        <script>
            alert('แก้ไขรายการไม่สำเร็จ โปรดลองใหม่อีกครั้ง!');
            window.location.replace("<?= ROOMBACK_URL ?>roomall.php?room_id=" + "<?= $room_id ?>");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('แก้ไขรายการเรียบร้อยแล้ว');
            window.location.replace("<?= ROOMBACK_URL ?>roomall.php?room_id=" + "<?= $room_id ?>");
        </script>
    <?php
    }
}

if (isset($_GET['method']) && $_GET['method'] == "DeleteData") {
    require __DIR__ . "/../../config/define.php";

    $room_id = $_REQUEST['room_id'];

    $response = DeleteData($room_id);

    if (!$response) {
    ?>
        <script>
            alert('ลบรายการไม่สำเร็จ โปรดลองใหม่อีกครั้ง!');
            window.location.replace("<?= ROOMBACK_URL ?>roomall.php");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('ลบรายการเรียบร้อยแล้ว');
            window.location.replace("<?= ROOMBACK_URL ?>roomall.php");
        </script>
<?php
    }
}
