<?php
require __DIR__ . "/AppRoom.php";
require __DIR__ . "/AppNoti.php";

if (isset($_GET['status']) && $_GET['status'] == '1') {
    $res = ClearNoti($_COOKIE['id']);
?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">การแจ้งเตือน</h5>
    </div>
    <div class="modal-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        <center>ลำดับ</center>
                    </th>
                    <th scope="col">
                        <center>ห้องประชุม</center>
                    </th>
                    <th scope="col">
                        <center>ชื่อหัวข้อการประชุม</center>
                    </th>
                    <th scope="col">
                        <center>วันที่เริ่มต้น</center>
                    </th>
                    <th scope="col">
                        <center>วันที่สิ้นสุด</center>
                    </th>
                    <th scope="col">
                        <center>สถานะ</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty(GetNotify($_COOKIE['id']))) {
                    foreach (GetNotify($_COOKIE['id']) as $index => $calendar) { ?>
                        <tr>
                            <th scope="row">
                                <center><?= $index + 1 ?></center>
                            </th>
                            <td>
                                <center><?= $calendar['room_name'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['ca_title'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['date_start'] . '<br>' . $calendar['time_start'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['date_end'] . '<br>' . $calendar['time_end'] ?></center>
                            </td>
                            <td>
                                <?php if ($calendar['ca_status'] == 0) { ?>
                                    <div class="alert alert-warning" role="alert">
                                        ยังไม่ได้รับการอนุมัติ
                                    </div>
                                <?php } else if ($calendar['ca_status'] == 1) { ?>
                                    <div class="alert alert-info" role="alert">
                                        เจ้าหน้าที่อนุมัติแล้ว
                                    </div>
                                <?php } else if ($calendar['ca_status'] == 2) { ?>
                                    <div class="alert alert-success" role="alert">
                                        อธิการบดีอนุมัติแล้ว
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-danger" role="alert">
                                        คำขอถูกปฎิเสธ
                                    </div>
                                <?php } ?>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
    </div>
<?php
}

if (isset($_GET['status']) && $_GET['status'] == '2') {
?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">การแจ้งเตือน</h5>
    </div>
    <div class="modal-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        <center>ลำดับ</center>
                    </th>
                    <th scope="col">
                        <center>ผู้ส่งคำร้อง</center>
                    </th>
                    <th scope="col">
                        <center>ห้องประชุม</center>
                    </th>
                    <th scope="col">
                        <center>ชื่อหัวข้อการประชุม</center>
                    </th>
                    <th scope="col">
                        <center>วันที่เริ่มต้น</center>
                    </th>
                    <th scope="col">
                        <center>วันที่สิ้นสุด</center>
                    </th>
                    <th scope="col">
                        <center>สถานะ</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty(GetNotifyAll())) {
                    foreach (GetNotifyAll() as $index => $calendar) { ?>
                        <tr>
                            <th scope="row">
                                <center><?= $index + 1 ?></center>
                            </th>
                            <td>
                                <center><?= $calendar['user_name'] . '&nbsp;' . $calendar['user_lastname'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['room_name'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['ca_title'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['date_start'] . '<br>' . $calendar['time_start'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['date_end'] . '<br>' . $calendar['time_end'] ?></center>
                            </td>
                            <td>
                                <?php if ($calendar['ca_status'] == 0) { ?>
                                    <button onclick="CallChangeStatus('<?= $calendar['ca_id'] ?>','1','<?= $calendar['user_id'] ?>')" type="button" class="btn btn-outline-success">อนุมัติการจอง</button>
                                    <button onclick="CallChangeStatus('<?= $calendar['ca_id'] ?>','3','<?= $calendar['user_id'] ?>')" type="button" class="btn btn-outline-danger">ปฎิเสธการจอง</button>
                                <?php } else if ($calendar['ca_status'] == 1) { ?>
                                    <div class="alert alert-info" role="alert">
                                        เจ้าหน้าที่อนุมัติแล้ว
                                    </div>
                                <?php } else if ($calendar['ca_status'] == 2) { ?>
                                    <div class="alert alert-success" role="alert">
                                        อธิการบดีอนุมัติแล้ว
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-danger" role="alert">
                                        เจ้าหน้าที่ปฎิเสธการจอง
                                    </div>
                                <?php } ?>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
    </div>
<?php
}

if (isset($_GET['status']) && $_GET['status'] == '3') {
?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">การแจ้งเตือน</h5>
    </div>
    <div class="modal-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        <center>ลำดับ</center>
                    </th>
                    <th scope="col">
                        <center>ผู้ส่งคำร้อง</center>
                    </th>
                    <th scope="col">
                        <center>ห้องประชุม</center>
                    </th>
                    <th scope="col">
                        <center>ชื่อหัวข้อการประชุม</center>
                    </th>
                    <th scope="col">
                        <center>วันที่เริ่มต้น</center>
                    </th>
                    <th scope="col">
                        <center>วันที่สิ้นสุด</center>
                    </th>
                    <th scope="col">
                        <center>สถานะ</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty(GetCalendarByStatus())) {
                    foreach (GetCalendarByStatus() as $index => $calendar) { ?>
                        <tr>
                            <th scope="row">
                                <center><?= $index + 1 ?></center>
                            </th>
                            <td>
                                <center><?= $calendar['user_name'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['room_name'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['ca_title'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['date_start'] . '<br>' . $calendar['time_start'] ?></center>
                            </td>
                            <td>
                                <center><?= $calendar['date_end'] . '<br>' . $calendar['time_end'] ?></center>
                            </td>
                            <td>
                                <button onclick="CallChangeStatus('<?= $calendar['ca_id'] ?>','2','<?= $calendar['user_id'] ?>')" type="button" class="btn btn-outline-success">อนุมัติการจอง</button>
                                <button onclick="CallChangeStatus('<?= $calendar['ca_id'] ?>','3','<?= $calendar['user_id'] ?>')" type="button" class="btn btn-outline-danger">ปฎิเสธการจอง</button>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
    </div>
<?php
}

if (isset($_POST['get_noti'])) {
    if (!empty($_COOKIE['user_status'])) {
        if ($_COOKIE['user_status'] == 2 || $_COOKIE['user_status'] == 3) {
            $noti = get_notify($_COOKIE['user_status']);
            echo $noti;
        }
    }
}
