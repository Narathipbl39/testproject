<?php require __DIR__ . "/module/AppNoti.php" ?>
<?php require __DIR__ . "/module/AppUsers2.php" ?>
<header class="tm-header" id="tm-header">
    <div class="tm-header-wrapper">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="tm-site-header">
            <center><img src="img/logo.png"></center>
            <br>

            <h5 class="text-center mb-3">ระบบจองห้องประชุมออนไลน์</h5>
            <br>
            <center>
                <?php if ($_COOKIE['user_status'] == 1) { ?>
                    <div style="display: inline;" class="alert alert-secondary" role="alert">
                        ผู้ใช้ทั่วไป
                    </div>
                <?php } else if ($_COOKIE['user_status'] == 2) { ?>
                    <div style="display: inline;" class="alert alert-primary" role="alert">
                        เจ้าหน้าที่
                    </div>
                <?php } else { ?>
                    <div style="display: inline;" class="alert alert-success" role="alert">
                        อธิการบดี
                    </div>
                <?php } ?>
            </center>
            <div class="text-center mt-4 " style="color: black;">
            คุณ &nbsp;<?= GetusersById($_COOKIE['id'])['user_name'] . ' ' . GetusersById($_COOKIE['id'])['user_lastname'] ?>
            </div>
        </div>
        <nav class="tm-nav" id="tm-nav">
            <ul>
                <li class="tm-nav-item"><a onclick="<?= (($_COOKIE['user_status'] == 1) ? 'CallShowNotity_1()' : (($_COOKIE['user_status'] == 2) ? 'CallShowNotity_2()' : 'CallShowNotity_3()')) ?>" style="cursor: pointer;" class="tm-nav-link">
                        <i class="far fa-bell"></i>
                        การแจ้งเตือน
                        &nbsp;
                        <div id="notify"></div>
                    </a></li>
                <li class="tm-nav-item"><a href="index.php" class="tm-nav-link">
                        <i class="far fa-calendar-alt"></i>
                        ตารางการใช้ห้องประชุม
                    </a></li>
                <li class="tm-nav-item"><a href="showroom.php" class="tm-nav-link">
                        <i class="far fa-building"></i>
                        ห้องประชุมทั้งหมด
                    </a></li>

                <li class="tm-nav-item"><a href="edituser.php" class="tm-nav-link">
                        <i class="fas fa-sliders-h"></i>
                        ตั้งค่าบัญชีผู้ใช้
                    </a></li>
                <li class="tm-nav-item"><a href="authen/logout.php" class="tm-nav-link">
                        <i class="fas fa-door-open"></i>
                        ออกจากระบบ
                    </a></li>
            </ul>
        </nav>

    </div>
</header>