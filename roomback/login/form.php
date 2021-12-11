<?php require __DIR__ . "/../../config/define.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin IT MeetingRoom</title>
    <link rel="stylesheet" href="<?= ROOMBACK_URL ?>login/style.css">
</head>

<body>
    <div class="login-container">
        <section class="login" id="login">
            <header>
                <h2>ระบบห้องประชุม</h2>
                <h4>เฉพาะเจ้าหน้าที่</h4>
            </header>
            <form class="login-form" action="<?= ROOMBACK_URL ?>module/AppAdmin.php?method=Login" method="post">
                <input type="text" name="username" class="login-input" placeholder="Username" required autofocus />
                <input type="password" name="password" class="login-input" placeholder="Password" required />
                <div class="submit-container">
                    <button type="submit" class="login-button">เข้าสู่ระบบ</button>
                </div>
            </form>
        </section>
        <p><a href=""></a></p>
    </div>
    <script src="<?= ROOMBACK_URL ?>login/function.js"></script>
</body>

</html>