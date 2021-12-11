<?php
require __DIR__ . "/../config/connect.php";

function GetRoomAll($floor)
{
    $reponse = array();
    $sql = "SELECT `room_id`, `room_name`, `room_floor`, `room_object`, `room_chair`, `room_status`, `room_photo` FROM `room` WHERE `room_floor` = $floor";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reponse[] = $row;
        }
        return $reponse;
    } else {
        return false;
    }
}

function InsertRoom($room_id, $title, $start, $time, $end, $endtime)
{
    $sql = "INSERT INTO `calender`(`user_id`, `date_start`, `date_end`, `ca_title`, `time_start`, `time_end`, `room_id`) VALUES ('" . $_COOKIE['id'] . "', '$start', '$end', '$title', '$time', '$endtime', '$room_id')";
    $result = $GLOBALS['conn']->query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function GetMaxIdCalender()
{
    $sql = "SELECT MAX(ca_id) as `id` FROM `calender`";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id'];
    } else {
        return false;
    }
}

function GetNotify($user_id)
{
    $reponse = array();
    $sql = "SELECT `calender`.`ca_id`, `room`.`room_name`, `calender`.`ca_status`, `calender`.`user_id`, `calender`.`date_start`, `calender`.`date_end`, `calender`.`ca_title`, `calender`.`time_start`, `calender`.`time_end` FROM `calender` INNER JOIN `room` ON `calender`.`room_id` = `room`.`room_id` WHERE `user_id` = " . $user_id;
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reponse[] = $row;
        }
        return $reponse;
    } else {
        return false;
    }
}

function GetNotifyAll()
{
    $reponse = array();
    $sql = "SELECT `calender`.`ca_id`, `room`.`room_name`, `calender`.`ca_status`, `calender`.`user_id`, `calender`.`date_start`, `calender`.`date_end`, `calender`.`ca_title`, `calender`.`time_start`, `calender`.`time_end`, `user`.`user_name` , `user`.`user_lastname` FROM `calender` INNER JOIN `room` ON `calender`.`room_id` = `room`.`room_id` INNER JOIN `user` ON `calender`.`user_id` = `user`.`user_id` ORDER BY `calender`.`ca_id` DESC";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reponse[] = $row;
        }
        return $reponse;
    } else {
        return false;
    }
}

function GetCalendarByStatus()
{
    $reponse = array();
    $sql = "SELECT `calender`.`ca_id`, `room`.`room_name`, `calender`.`ca_status`, `calender`.`user_id`, `calender`.`date_start`, `calender`.`date_end`, `calender`.`ca_title`, `calender`.`time_start`, `calender`.`time_end`, `user`.`user_name` FROM `calender` INNER JOIN `room` ON `calender`.`room_id` = `room`.`room_id` INNER JOIN `user` ON `calender`.`user_id` = `user`.`user_id` WHERE `calender`.`ca_status` = '1' ORDER BY `calender`.`ca_id` DESC";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reponse[] = $row;
        }
        return $reponse;
    } else {
        return false;
    }
}
