<?php
setcookie('id', null, -1, '/');
setcookie('user_status', null, -1, '/');
setcookie('user_name', null, -1, '/');
setcookie('user_username', null, -1, '/');
header('location: ../index.php');
