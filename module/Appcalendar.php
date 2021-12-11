<?php
require __DIR__ . "/../config/connect.php";

function GetCalendarAll()
{
    $reponse = array();
    $sql = "SELECT `ca_id`, `ca_status`, `user_id`, `date_start`, `date_end`, `ca_title`, `time_start`, `time_end` FROM `calender` WHERE 1";
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

function ChangeStatus($ca_id, $status)
{
    $sql = "UPDATE `calender` SET `ca_status`= '$status' WHERE `ca_id` = " . $ca_id;
    $result = $GLOBALS['conn']->query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
