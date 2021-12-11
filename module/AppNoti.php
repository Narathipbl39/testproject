<?php
require __DIR__ . "/../config/connect.php";
date_default_timezone_set('Asia/Bangkok');

function InsertNoti($user_id, $ca_id)
{
    $sql = "INSERT INTO `notification`(`user_id`, `ca_id`, `no_date`) VALUES ('$user_id', '$ca_id','" . date('Y-m-d') . "')";
    $result = $GLOBALS['conn']->query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function GetNoti($user_id)
{
    $num = 0;
    $sql = "SELECT `no_id`, `user_id`, `no_old`, `no_new`, `no_date` FROM `notification` WHERE `user_id` = " . $user_id;
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['no_old'] != $row['no_new']) {
                $num++;
            }
        }
        return $num;
    } else {
        return $num;
    }
}

function get_notify($status)
{
    if ($status == 2) {
        $status = 0;
    } else {
        $status = 1;
    }
    $sql = "SELECT COUNT(notification.no_id) AS num FROM notification INNER JOIN calender ON notification.ca_id = calender.ca_id WHERE calender.ca_status = " . $status;
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['num'];
    } else {
        return false;
    }
}

function UpdateNoti($user_id, $no_new, $ca_id)
{
    $sql = "UPDATE `notification` SET `no_new`= '$no_new' WHERE `user_id` = $user_id AND `ca_id` = $ca_id";
    $result = $GLOBALS['conn']->query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function ClearNoti($user_id)
{
    $sql = "UPDATE `notification` SET `no_new`= '0', `no_old`= '0' WHERE `user_id` = $user_id";
    $result = $GLOBALS['conn']->query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
