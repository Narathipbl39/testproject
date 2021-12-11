<div class="container">
  <!-- heading -->
  <h2>
    <center>ตารางการใช้ห้องประชุม</center>
  </h2>
  <br>
<div><center> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/notic.jpg"  width="50%" height="50%"></center>
</div>
<br>


<?php
$fullcalendar_path = "fullcalendar-4.4.2/packages/";
?>
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8' />

  <link href='<?= $fullcalendar_path ?>/core/main.css' rel='stylesheet' />
  <link href='<?= $fullcalendar_path ?>/daygrid/main.css' rel='stylesheet' />

  <!--   ส่วนที่เพิ่มเข้ามาใหม่-->
  <link href='<?= $fullcalendar_path ?>/timegrid/main.css' rel='stylesheet' />
  <link href='<?= $fullcalendar_path ?>/list/main.css' rel='stylesheet' />

  <script src='<?= $fullcalendar_path ?>/core/main.js'></script>
  <script src='<?= $fullcalendar_path ?>/daygrid/main.js'></script>
  <!--   ส่วนที่เพิ่มเข้ามาใหม่-->
  <script src='<?= $fullcalendar_path ?>/core/locales/th.js'></script>
  <script src='<?= $fullcalendar_path ?>/timegrid/main.js'></script>
  <script src='<?= $fullcalendar_path ?>/interaction/main.js'></script>
  <script src='<?= $fullcalendar_path ?>/list/main.js'></script>
  <style type="text/css">
    #calendar {
      width: 830px;
      margin: auto;
    }
  </style>
</div>
</head>

<body>

  <div id='calendar'></div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(function() {
      // กำหนด element ที่จะแสดงปฏิทิน
      var calendarEl = $("#calendar")[0];

      // กำหนดการตั้งค่า
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'], // plugin ที่เราจะใช้งาน
        defaultView: 'dayGridMonth', // ค้าเริ่มร้นเมื่อโหลดแสดงปฏิทิน
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        events: { // เรียกใช้งาน event จาก json ไฟล์ ที่สร้างด้วย php
          url: 'events.php?gData=1',
          error: function() {

          }
        },
        eventLimit: true, // allow "more" link when too many events
        locale: 'th', // กำหนดให้แสดงภาษาไทย
        firstDay: 0, // กำหนดวันแรกในปฏิทินเป็นวันอาทิตย์ 0 เป็นวันจันทร์ 1
        showNonCurrentDates: false, // แสดงที่ของเดือนอื่นหรือไม่
        eventTimeFormat: { // รูปแบบการแสดงของเวลา เช่น '14:30' 
          hour: '2-digit',
          minute: '2-digit',
          meridiem: false
        }
      });

      // แสดงปฏิทิน 
      calendar.render();

    });
  </script>

</body>

</html>