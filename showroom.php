<?php require __DIR__ . "/header.php"; ?>
<div class="row tm-row">
    <div class="col-12">
        <form method="GET" class="form-inline tm-mb-80 tm-search-form">
            <input class="form-control tm-search-input" name="query" type="text" placeholder="ค้นหาห้องประชุม" aria-label="Search">
            <button class="tm-search-button" type="submit">
                <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
            </button>
        </form>
    </div>
</div>
<div class="row tm-row tm-mt-100 tm-mb-75">
    <div class="tm-prev-next-wrapper">

    </div>
    <div class="tm-paging-wrapper">
        <span class="d-inline-block mr-3">ชั้น</span>
        <nav class="tm-paging-nav d-inline-block">
            <ul>
                <li class="tm-paging-item <?= !empty($_COOKIE['floor']) ? ($_COOKIE['floor'] == "" || $_COOKIE['floor'] == 1 ? 'active' : '') :'' ?>">
                    <a style="cursor: pointer;" onclick="SetFloor(1)" class="mb-2 tm-btn tm-paging-link">1</a>
                </li>
                <li class="tm-paging-item  <?= !empty($_COOKIE['floor']) ? ($_COOKIE['floor'] == "" || $_COOKIE['floor'] == 2 ? 'active' : '') :'' ?>">
                    <a style="cursor: pointer;" onclick="SetFloor(2)" class="mb-2 tm-btn tm-paging-link">2</a>
                </li>
                <li class="tm-paging-item <?= !empty($_COOKIE['floor']) ? ($_COOKIE['floor'] == "" || $_COOKIE['floor'] == 3 ? 'active' : '') :'' ?>">
                    <a style="cursor: pointer;" onclick="SetFloor(3)" class="mb-2 tm-btn tm-paging-link">3</a>
                </li>
                <li class="tm-paging-item <?= !empty($_COOKIE['floor']) ? ($_COOKIE['floor'] == "" || $_COOKIE['floor'] == 4 ? 'active' : '') :'' ?>">
                    <a style="cursor: pointer;" onclick="SetFloor(4)" class="mb-2 tm-btn tm-paging-link">4</a>
                </li>
                <li class="tm-paging-item <?= !empty($_COOKIE['floor']) ? ($_COOKIE['floor'] == "" || $_COOKIE['floor'] == 5 ? 'active' : '') :'' ?>">
                    <a style="cursor: pointer;" onclick="SetFloor(5)" class="mb-2 tm-btn tm-paging-link">5</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="row tm-row">
    <?php if (!empty(GetRoomAll(((!isset($_COOKIE['floor'])) ? '1' : $_COOKIE['floor'])))) {
        foreach (GetRoomAll(((!isset($_COOKIE['floor'])) ? '1' : $_COOKIE['floor'])) as $room) { ?>
            <article class="col-12 col-md-6 tm-post">
                <hr class="tm-hr-primary">
                <a href="rooms.php?room=<?= $room['room_id'] ?>" class="effect-lily tm-post-link tm-pt-30">
                    <div class="tm-post-link-inner">
                        <img src="<?=  'img/roompic/' .$room['room_photo'] ?>"class="img-fluid">
                    </div>

                    <h2 class="tm-pt-30 tm-color-primary tm-post-title"><?= $room['room_name'] ?></h2>
                </a>
                <p class="tm-pt-30">
                    ชั้น : <?= $room['room_floor'] ?>
                    <br>
                    จำนวนที่นั่ง : <?= $room['room_chair'] ?>
                    <br>
                    อุปกรณ์ : <?= $room['room_object'] ?>

                </p>

            </article>
    <?php }
    } ?>
</div>
<script>
    function SetFloor(floor) {
        const d = new Date();
        d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = 'floor' + "=" + floor + ";" + expires + ";path=/";
        document.location.reload();
    }
</script>

<?php require __DIR__ . "/footer.php"; ?>