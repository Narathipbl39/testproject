<?php require __DIR__ . "/layout/header.php" ?>
<?php require __DIR__ . "/module/AppUsers.php" ?>
<!-- Tables -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>ผู้ใช้ทั้งหมด</h2>
                </div>
                <div class="default-table">
                    <table>
                        <button><a href="<?= ROOMBACK_URL ?>reusers.php" class="border-button">เพิ่มผู้ใช้งาน</a></button>
                        <br><br>
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ</th>
                                <th>รหัสนิสิต</th>
                                <th>สถานะผู้ใช้</th>
                                <th>จัดการผู้ใช้งาน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (Getusers() as $index => $Users) { ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $Users['user_name']  ?></td>
                                    <td><?= $Users['user_stdid']  ?></td>
                                    <td>
                                        <?php if ($Users['user_status'] == 1) { ?>
                                            <div class="alert alert-secondary" role="alert">
                                                ผู้ใช้ทั่วไป
                                            </div>
                                        <?php } else if ($Users['user_status'] == 2) { ?>
                                            <div class="alert alert-primary" role="alert">
                                                เจ้าหน้าที่
                                            </div>


                                        <?php } else { ?>
                                            <div class="alert alert-success" role="alert">
                                                อธิการบดี
                                            </div>

                                        <?php } ?>

                                    </td>
                                    <td>
                                        <button onclick="Edit('<?= $Users['user_id'] ?>')" style="background-color: #FF8C2D;" class="border-button">แก้ไข</button>
                                        <button onclick="Delete('<?= $Users['user_id'] ?>')" style="background-color: #FB2222;" class="border-button">ลบ</button>
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
    function Edit(user_id) {
        window.location.replace("<?= ROOMBACK_URL ?>user_edit.php?user_id=" + user_id);
    }

    function Delete(user_id) {
        if (confirm("ยืนยันการดำเนินการ!")) {
            window.location.replace("<?= ROOMBACK_URL ?>module/AppUsers.php?method=DeleteData&user_id=" + user_id);
        }
    }
</script>
<?php require __DIR__ . "/layout/footer.php" ?>