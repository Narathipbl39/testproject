function get_notify() {
  $.ajax({
    url: "module/ajax_notify.php",
    type: "POST",
    data: {
      get_noti: "1",
    },
    success: function success(data) {
      if (data >= 1) {
        $("#notify").html(
          '<span style="color: white;" class="badge bg-danger ms-2">' +
            data +
            "</span>"
        );
      } else {
        $("#notify").html("");
      }
    },
  });
}
var run_getnotify = setInterval(get_notify, 1500);
