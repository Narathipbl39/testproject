<!-- Modal -->
<div class="modal fade" id="notity_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div id="notity-1" class="modal-content">
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="confirm_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div id="confirm-1" class="modal-content">
        </div>
    </div>
</div>

<script>
    function CallShowNotity_1() {
        $.ajax({
            url: "module/ajax_notify.php?status=1",
            type: "POST",
            data: {

            },
            success: function success(data) {
                $('#notity-1').html(data);
                $('#notity_1').modal('show');
            }
        });
    }

    function CallShowNotity_2() {
        $.ajax({
            url: "module/ajax_notify.php?status=2",
            type: "POST",
            data: {

            },
            success: function success(data) {
                $('#notity-1').html(data);
                $('#notity_1').modal('show');
            }
        });
    }

    function CallShowNotity_3() {
        $.ajax({
            url: "module/ajax_notify.php?status=3",
            type: "POST",
            data: {

            },
            success: function success(data) {
                $('#notity-1').html(data);
                $('#notity_1').modal('show');
            }
        });
    }

    function CallChangeStatus(ca_id, status, user_id) {
        $.ajax({
            url: "module/ajax_ca.php?type=1",
            type: "POST",
            data: {
                ca_id: ca_id,
                status: status,
                user_id: user_id
            },
            success: function success(data) {
                $('#confirm-1').html(data);
                $('#confirm_1').modal('show');
            }
        });
    }

    function ChangeStatus(ca_id, status, user_id) {
        $.ajax({
            url: "module/ajax_ca.php?type=2",
            type: "POST",
            data: {
                ca_id: ca_id,
                status: status,
                user_id: user_id
            },
            success: function success(data) {
                $('#confirm_1').modal('hide');
                if (data == '1') {
                    CallShowNotity_2();
                } else {
                    alert('error');
                }
            }
        });
    }
</script>

</main>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/templatemo-script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>