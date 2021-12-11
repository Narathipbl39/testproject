<?php require __DIR__ . "/layout/header.php" ?>
<?php require __DIR__ . "/module/Approomall.php";
$room_id = $_REQUEST['room_id']; ?>
<div class="inner">
    <!-- Forms -->
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>แก้ไขข้อมูลห้องประชุม</h2>
                    </div>
                    <form id="contact" action="<?= ROOMBACK_URL ?>module/AppRoomall.php?method=EditData" method="post" enctype="multipart/form-data">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                    <center>
                                        <?php if (GetroomallById($room_id)['room_photo'] == "") { ?>
                                            <img src="<?= ROOMBACK_URL . 'img/img_old.png' ?>" id="blah" style="width: 50%;" alt="">
                                        <?php } else { ?>
                                            <img src="<?= ROOMBACK_URL . 'img/' . GetroomallById($room_id)['room_photo'] ?>" style="width: 50%;" id="blah" alt="">
                                        <?php } ?>
                                    </center>
                                    <input class="mt-3" type='file' id="imgInp" name="file">
                                    <input type="hidden" name="img_old" id="img_old" value="<?= GetroomallById($room_id)['room_photo'] ?>">
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>

                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        $('#blah').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            $("#imgInp").change(function() {
                                readURL(this);
                            });
                        </script>

                        <div class="row mt-5">
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="room_name">ชื่อห้อง</label>
                                    <input name="room_name" type="text" class="form-control" id="" placeholder="ชื่อห้อง" required="" value="<?= GetroomallById($room_id)['room_name'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="room_floor">ชั้นที่</label>
                                    <input name="room_floor" type="text" class="form-control" id="" placeholder="ชั้นที่" required="" value="<?= GetroomallById($room_id)['room_floor'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="room_object">อุปกรณ์ภายในห้อง</label>
                                    <input name="room_object" type="text" class="form-control" id="" placeholder="อุปกรณ์ภายในห้อง" required="" value="<?= GetroomallById($room_id)['room_object'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="room_chair">จำนวนที่งนั่ง</label>
                                    <input name="room_chair" type="text" class="form-control" id="" placeholder="จำนวนที่งนั่ง" required="" value="<?= GetroomallById($room_id)['room_chair'] ?>">
                                </fieldset>
                            </div>
                            <input type="hidden" name="room_id" value="<?= $room_id ?>">
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