<?php
require __DIR__ . "/module/AppRoom.php";
require __DIR__ . "/module/AppNoti.php";

$title = $_POST['title'];
$start = $_POST['start'];
$time = $_POST['time'];
$end = $_POST['end'];
$endtime = $_POST['endtime'];
$room_id = $_POST['room_id'];

$respone_1  =  InsertRoom($room_id, $title, $start, $time, $end, $endtime);
$ca_id = GetMaxIdCalender();
$respone_2 = InsertNoti($_COOKIE['id'], $ca_id);
if ($respone_1 && $respone_2) {
?>
    <script>
        alert('ส่งคำขอจองห้องประชุมสำเร็จ');
        window.location.replace('showroom.php');
    </script>
<?php
} else {
?>
    <script>
        alert('ส่งคำขอจองห้องประชุมไม่สำเร็จ');
        window.location.replace('showroom.php');
    </script>
<?php
}
