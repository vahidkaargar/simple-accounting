<h2 class="border-bottom pb-2 mt-2">
    افزودن کیف پول
</h2>
<div class="py-3">
    <div class="m-auto ltr" style="max-width: 400px">
        <form class="" action="./admin.php?action=wallets.create" method="post">
            <?php if ($_ENV['error']): ?>
                <div class="alert alert-danger rtl"><?= $_ENV['error'] ?></div>
            <?php endif; ?>
            <div class="input-group mb-3 ">
                <input type="text" class="form-control" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default" name="telegram_id">
                <span class="input-group-text" id="inputGroup-sizing-default">تلگرام آیدی</span>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default" name="telegram_username">
                <span class="input-group-text" id="inputGroup-sizing-default">تلگرام یوزرنیم</span>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control rtl" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default" name="name">
                <span class="input-group-text" id="inputGroup-sizing-default">نام</span>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default" name="mobile">
                <span class="input-group-text" id="inputGroup-sizing-default">شماره موبایل</span>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default" name="amount">
                <span class="input-group-text" id="inputGroup-sizing-default">هزینه همکار</span>
            </div>
            <button type="submit" class="btn btn-primary">ایجاد کیف پول</button>
        </form>
    </div>
</div>
