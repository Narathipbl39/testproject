<?php
require __DIR__ . "/module/Appcalendar.php";

$calendar = GetCalendarAll();

header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// โค้ดไฟล์ dbconnect.php ดูได้ที่ http://niik.in/que_2398_5642
// require_once("dbconnect.php");
$json_data = array();

$arr_color_demo = array(
    "1" => "#ffd149",
    "2" => "#fa42a2",
    "3" => "#61c419",
    "4" => "#ff8e25",
    "5" => "#44c5ed",
    "6" => "#ca5ec9",
    "7" => "#ff0000"
);

$key = null;
foreach ($calendar as $i => $data) {
    $i++;
    if (is_null($key)) {
        $key = 0;
    } else {
        $key++;
    }

    $date_end_old = strtotime($data['date_end']) - (strtotime($data['date_start']));
    $date_end = floor($date_end_old / 3600 / 24);

    $json_data[$key] = array(
        "id" => $i,
        "groupId" => $data['ca_id'],
        "start" => date("Y-m-d", strtotime($data['date_start'])) . 'T' . $data['time_start'],
        "end" => date("Y-m-d", strtotime($data['date_start'] . " +$date_end day")) . 'T' . $data['time_end'],
        "title" => $data['ca_title'],
        "url" => "",
        "textColor" => "#FFFFFF",
        "backgroundColor" => (($data['ca_status'] == 0) ? '#FF9933' : (($data['ca_status'] == 1) ? '#CCFFFF' : (($data['ca_status'] == 2) ? '#66FF99' : '#FF0033'))),
        "borderColor" => "transparent"
    );
}

// แปลง array เป็นรูปแบบ json string  
if (isset($json_data)) {
    $json = json_encode($json_data);
    if (isset($_GET['callback']) && $_GET['callback'] != "") {
        echo $_GET['callback'] . "(" . $json . ");";
    } else {
        echo $json;
    }
}
