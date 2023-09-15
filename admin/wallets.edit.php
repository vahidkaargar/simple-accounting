<h2 class="border-bottom pb-2 mt-2">
    اطلاعات کیف پول
</h2>
<div class="py-3">
    <div class="row g-3">
        <div class="col-md-5">
            <div style="max-width: 400px" class="m-auto">
                <ul class="list-group mb-3 p-0 text-white border-0">
                    <li class="list-group-item d-flex justify-content-between lh-sm bg-success pt-3 pb-2 text-white border-0">
                        <div>
                            <h6>مجموع شارژها</h6>
                        </div>
                        <span class="ltr">+<?= number_format($balance['deposit']) ?></span>
                    </li>
                    <li style="max-height: 3px"></li>
                    <li class="list-group-item d-flex justify-content-between lh-sm bg-danger pt-3 pb-2 text-white border-0">
                        <div>
                            <h6>مجموع خریدها</h6>
                        </div>
                        <span class="ltr"><?= number_format($balance['withdrawal']) ?></span>
                    </li>
                    <li style="max-height: 3px"></li>
                    <li class="list-group-item d-flex justify-content-between lh-sm bg-primary pt-3 pb-2 text-white border-0">
                        <div>
                            <h6>بالانس نهایی</h6>
                        </div>
                        <span class="ltr">+<?= number_format($balance['deposit'] + $balance['withdrawal']) ?></span>
                </ul>
            </div>
        </div>
        <div class="col-md-7">
            <div class="m-auto ltr" style="max-width: 400px">
                <form class="" action="./admin.php?action=wallets.edit&telegram_id=<?= $wallet['telegram_id'] ?>"
                      method="post">
                    <?php if ($_ENV['error']): ?>
                        <div class="alert alert-danger rtl"><?= $_ENV['error'] ?></div>
                    <?php endif; ?>
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" name="telegram_id"
                               value="<?= $wallet['telegram_id'] ?>">
                        <span class="input-group-text" id="inputGroup-sizing-default">تلگرام آیدی</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" name="telegram_username"
                               value="<?= $wallet['telegram_username'] ?>">
                        <span class="input-group-text" id="inputGroup-sizing-default">تلگرام یوزرنیم</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rtl" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" name="name" value="<?= $wallet['name'] ?>">
                        <span class="input-group-text" id="inputGroup-sizing-default">نام</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" name="mobile"
                               value="<?= $wallet['mobile'] ?>">
                        <span class="input-group-text" id="inputGroup-sizing-default">شماره موبایل</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" name="amount"
                               value="<?= $wallet['amount'] ?>">
                        <span class="input-group-text" id="inputGroup-sizing-default">هزینه همکار</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" name="servers"
                               value="<?= cast($wallet['servers']) ?>">
                        <span class="input-group-text" id="inputGroup-sizing-default">سرورهای مجاز</span>
                    </div>
                    <button type="submit" class="btn btn-primary">ویرایش کیف پول</button>
                </form>
            </div>
            <a class="btn btn-primary" href="./admin.php?action=transactions.create&telegram_id=<?= $wallet['telegram_id'] ?>">افزودن شارژ</a>
        </div>
    </div>
</div>
