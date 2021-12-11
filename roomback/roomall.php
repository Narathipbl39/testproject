<?php require __DIR__ . "/layout/header.php" ?>
<?php require __DIR__ . "/module/AppRoomall.php" ?>
<!-- Tables -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>ห้องที่จองได้ทั้งหมด</h2>
                </div>
                <div class="default-table">
                <button><a href="reroom.php" class="border-button">เพิ่มผู้ใช้งาน</a></button>
                <br><br>
                    <table>
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ภาพห้องประชุม</th>
                                <th>ห้อง</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (Getroomall() as $index => $roomall) { ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td>
                                        <?php if ($roomall['room_photo'] != "") { ?>
                                            <img style="width: 30%;" src="<?= ROOMBACK_URL . '../img/roompic/' . $roomall['room_photo'] ?>">
                                        <?php } ?>
                                    </td>
                                    <td><?= $roomall['room_name']?></td>
                                    <td>
                                        <button onclick="Edit('<?= $roomall['room_id'] ?>')" style="background-color: #FF8C2D;" class="border-button">แก้ไข</button>
                                        <button onclick="Delete('<?= $roomall['room_id'] ?>')" style="background-color: #FB2222;" class="border-button">ลบ</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function Edit(room_id) {
        window.location.replace("<?= ROOMBACK_URL ?>room_edit.php?room_id=" + room_id);
    }

    function Delete(room_id) {
        if (confirm("ยืนยันการดำเนินการ!")) {
            window.location.replace("<?= ROOMBACK_URL ?>module/AppRoomall.php?method=DeleteData&room_id=" + room_id);
        }
    }
</script>
<?php require __DIR__ . "/layout/footer.php" ?>