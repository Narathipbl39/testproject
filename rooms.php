<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
    <!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>

<body>
    <?php
    include 'nav.php';
    $room_id = $_REQUEST['room'];
    ?>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <form action="save_rooms.php" method="POST">
                <div class="row">

                    <div class="col-md-12">
                        <label for="message">หัวข้อการประชุม</label>
                        <textarea class="form-control" name="title" placeholder="โปรดระบุหัวข้อการประชุม" rows="6"></textarea>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="message">วันที่เริ่มต้น</label>
                        <input class="form-control" name="start" type="date">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="message">เวลา</label>
                        <input class="form-control" name="time" type="time">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="message">วันที่สิ้นสุด</label>
                        <input class="form-control" name="end" type="date">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="message">เวลา</label>
                        <input class="form-control" name="endtime" type="time">
                    </div>
                    <input type="hidden" name="room_id" value="<?= $room_id ?>">

                    <div class="col-md-12 mt-3">
                        <div class="text-right">
                            <button type="submit" class="tm-btn tm-btn-primary tm-btn-small">ตกลง</button>
                        </div>
                    </div>
                    <!-- <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2> -->

                </div>
            </form>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>

</html>