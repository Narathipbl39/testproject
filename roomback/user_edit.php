<?php require __DIR__ . "/layout/header.php"; ?>
<?php require __DIR__ . "/module/AppUsers.php";
$user_id = $_REQUEST['user_id'];
?>
<div class="inner">
    <!-- Forms -->
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>แก้ไขข้อมูลผู้ใช้</h2>
                    </div>
                    <form id="contact" action="<?= ROOMBACK_URL ?>module/AppUsers.php?method=EditData" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="user_username">ชื่อผู้ใช้</label>
                                    <input name="user_username" type="text" class="form-control" id="" placeholder="ชื่อผู้ใช้" required="" value="<?= GetusersById($user_id)['user_username'] ?>" readonly>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="user_password">รหัสผ่าน</label>
                                    <input name="user_password" type="text" class="form-control" id="" placeholder="รหัสผ่าน" required="" value="<?= GetusersById($user_id)['user_password'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="user_name">ชื่อ</label>
                                    <input name="user_name" type="text" class="form-control" id="" placeholder="ชื่อ" required="" value="<?= GetusersById($user_id)['user_name'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="user_lastname">นามสกุล</label>
                                    <input name="user_lastname" type="text" class="form-control" id="" placeholder="นามสกุล" required="" value="<?= GetusersById($user_id)['user_lastname'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="user_stdid">รหัสนิสิต</label>
                                    <input name="user_stdid" type="text" class="form-control" id="" placeholder="รหัสนิสิต" required="" value="<?= GetusersById($user_id)['user_stdid'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="user_gender">เพศ</label>
                                    <select class="form-control" name="user_gender" type="text" id="" required="">
                                        <option value="-1" selected>โปรดเลือกอีกครั้ง</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                        <option value="อื่นๆ">เพศทางเลือก</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="user_status">สถานะผู้ใช้</label>
                                    <select class="form-control" name="user_status" type="text" id="" required="">
                                        <option <?= GetusersById($user_id)['user_status'] == 1 ? 'selected' : '' ?> value="1">ผู้ใช้งานทั่วไป</option>
                                        <option <?= GetusersById($user_id)['user_status'] == 2 ? 'selected' : '' ?> value="2">เจ้าหน้าที่</option>
                                        <option <?= GetusersById($user_id)['user_status'] == 3 ? 'selected' : '' ?> value="3">อธิการบดี</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="user_numberphone">เบอร์โทร</label>
                                    <input name="user_numberphone" type="text" class="form-control" id="" placeholder="เบอร์โทรติดต่อ" required="" value="<?= GetusersById($user_id)['user_numberphone'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="user_address">ที่อยู่</label>
                                    <input name="user_address" type="text" class="form-control" id="" placeholder="ที่อยู่" required="" value="<?= GetusersById($user_id)['user_address'] ?>">
                                </fieldset>
                            </div>
                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                            <div class="col-md-12">
                                <button type="submit" id="form-submit" class="button">ยืนยัน</button>
                                <button type="reset" id="form-submit" class="button">รีเซ็ต</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require __DIR__ . "/layout/footer.php" ?>