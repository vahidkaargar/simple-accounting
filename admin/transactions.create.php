<h2 class="border-bottom pb-2 mt-2">
    شارژ کیف پول
</h2>
<div class="py-3">
    <div class="m-auto ltr" style="max-width: 400px">
        <form action="./admin.php" method="post">
            <?php if ($_ENV['error']): ?>
                <div class="alert alert-danger rtl"><?= $_ENV['error'] ?></div>
            <?php endif; ?>
            <div class="input-group mb-3 ">
                <input type="hidden" name="action" value="transactions.create">
                <input type="hidden" name="telegram_id" value="<?= $telegramId ?>">
                <input type="text" class="form-control" name="amount" value="<?= $amount ?? '' ?>" autofocus
                       placeholder="حداقل: <?= number_format(ADD_FUND_MIN) ?>">
                <span class="input-group-text" id="inputGroup-sizing-default">مبلغ</span>
            </div>
            <div><small>

                </small></div>
            <button type="submit" class="btn btn-primary">افزایش کیف پول</button>
        </form>
    </div>
</div>
