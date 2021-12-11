<?php
require __DIR__ . "/Appcalendar.php";
require __DIR__ . "/AppNoti.php";

if (isset($_GET['type']) && $_GET['type'] == '1') {
    $ca_id = $_POST['ca_id'];
    $status = $_POST['status'];
    $user_id = $_POST['user_id'];
?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">การแจ้งเตือน</h5>
    </div>
    <div class="modal-body">
        <h4>ยืนยันการทำรายการ?</h4>
        <h6>หากดำเนินการแล้วจะไม่สามารถแก้ไขได้!</h6>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <button onclick="ChangeStatus('<?= $ca_id ?>','<?= $status ?>','<?= $user_id ?>')" type="button" class="btn btn-primary">ยืนยัน</button>
    </div>
<?php
}

if (isset($_GET['type']) && $_GET['type'] == '2') {
    $ca_id = $_POST['ca_id'];
    $status = $_POST['status'];
    $user_id = $_POST['user_id'];

    $respone = ChangeStatus($ca_id, $status);
    $respone_2 = UpdateNoti($user_id, $status, $ca_id);
    if ($respone) {
        echo '1';
    } else {
        echo '0';
    }
}
