<h2 class="border-bottom pb-2 mt-2">
    لیست خریدها
</h2>
<div class="py-3">
    <div class="border-bottom pb-3 mb-4">
        <form class="row g-3" action="./admin.php" method="get">
            <input type="hidden" name="action" value="transactions.index">
            <div class="col-md-4">
                <label for="telegram_username" class="form-label">یوزرنیم تلگرام</label>
                <input name="telegram_username" type="text" class="form-control ltr" id="telegram_username">
            </div>
            <div class="col-md-2">
                <label for="transaction_type" class="form-label">نوع تراکنش</label>
                <select name="transaction_type" id="transaction_type" class="form-select">
                    <option value="0">همه</option>
                    <option value="1">واریز</option>
                    <option value="2">برداشت</option>
                </select>
            </div>
            <div class="col-md-6 pt-4">
                <button type="submit" class="btn btn-primary mt-2">جستجو</button>
            </div>
        </form>
    </div>
    <table class="table table-hover text-center">
        <thead>
        <tr>
            <th scope="col">مبلغ</th>
            <th style="width: 120px" scope="col">کد تراکنش</th>
            <th scope="col">تلگرام یوزرنیم</th>
            <th scope="col">حذف</th>
            <th scope="col">سرور</th>
            <th scope="col">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($transactions as $transaction): ?>
            <?php $bgColor = bgTransactionRow($transaction); ?>
            <tr>
                <td class="text-start ltr <?= $bgColor ?>"><?php echo number_format($transaction['amount']); ?></td>
                <th scope="row" class="ltr <?= $bgColor ?>"><?php echo $transaction['id']; ?></th>
                <td class="ltr <?= $bgColor ?>">
                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                       target="_blank"
                       href="./admin.php?action=wallets.edit&telegram_id=<?= htmlspecialchars($transaction['telegram_id']) ?>">
                        <?= htmlspecialchars($transaction['telegram_username']) ?>
                    </a>
                </td>
                <td class="ltr <?= $bgColor ?>">
                    <form onsubmit="return confirm('آیا از حذف این تراکنش اطمینان دارید؟')" action="./admin.php?action=transactions.delete" method="POST" >
                    <input type="hidden" value="<?= $transaction['id'] ?>" name="id">
                     <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                    </form>
                </td>
                <td class="ltr <?= $bgColor ?>"><?php echo htmlspecialchars($transaction['server'] ?? 'N/A'); ?></td>
                <td class="ltr <?= $bgColor ?>"><?= $transaction['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <nav class="ltr">
        <ul class="pagination justify-content-center">
            <?php foreach ($paginate['page_numbers'] as $page_number) : ?>
                <li class="page-item">
                    <a class="page-link"
                       href="/admin.php?action=transactions.index&page=<?= $page_number ?>"><?= $page_number ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>
