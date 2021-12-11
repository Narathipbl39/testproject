<?php require __DIR__ . "/header.php";
$user_id = $_COOKIE['id'];
?>

<form class="row g-3" action="module/AppUsers2.php?method=EditData" method="POST">
  <div class="col-md-6">
    <label for="user_username" class="form-label">ชื่อผู้ใช้</label>
    <input name="user_username" type="text" class="form-control" id="" placeholder="ชื่อผู้ใช้" required="" value="<?= GetusersById($user_id)['user_username'] ?>" readonly>
  </div>
  <div class="col-md-6">
    <label for="user_password" class="form-label">รหัสผ่าน</label>
    <input name="user_password" type="text" class="form-control" id="" placeholder="รหัสผ่าน" required="" value="<?= GetusersById($user_id)['user_password'] ?>">
  </div>
  <div class="col-md-6">
    <label for="user_name" class="form-label">ชื่อ</label>
    <input name="user_name" type="text" class="form-control" id="" placeholder="ชื่อ" required="" value="<?= GetusersById($user_id)['user_name'] ?>">
  </div>
  <div class="col-md-6">
    <label for="user_lastname" class="form-label">สกุล</label>
    <input name="user_lastname" type="text" class="form-control" id="" placeholder="นามสกุล" required="" value="<?= GetusersById($user_id)['user_lastname'] ?>">
  </div>
  <div class="col-md-6">
    <label for="user_stdid" class="form-label">รหัสนิสิต</label>
    <input name="user_stdid" type="text" class="form-control" id="" placeholder="รหัสนิสิต" required="" value="<?= GetusersById($user_id)['user_stdid'] ?>">
  </div>
  <div class="col-md-6">
    <label for="ser_gender" class="form-label">เพศ</label>
    <input name="user_gender" type="text" class="form-control" id="" placeholder="ชื่อผู้ใช้" required="" value="<?= GetusersById($user_id)['user_gender'] ?>" readonly>
  </div>
  <div class="col-md-6">
    <label for="user_numberphone" class="form-label">เบอร์โทรศัพท์</label>
    <input name="user_numberphone" type="text" class="form-control" id="" placeholder="เบอร์โทรติดต่อ" required="" value="<?= GetusersById($user_id)['user_numberphone'] ?>">
  </div>
  <div class="col-md-12">
    <label for="user_address" class="form-label">ที่อยู่</label>
    <input name="user_address" type="text" class="form-control" id="" placeholder="ที่อยู่" required="" value="<?= GetusersById($user_id)['user_address'] ?>">
  </div>
  <input type="hidden" name="user_id" value="<?= $user_id ?>">
  <div class="col-md-12 mt-3">
    <button type="submit" class="btn btn-primary">ยืนยัน</button>
    <button type="reset" class="btn btn-danger ">รีเซ็ต</button>
  </div>
</form>

<?php require __DIR__ . "/footer.php"; ?>