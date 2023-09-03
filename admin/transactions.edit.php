<h2 class="border-bottom pb-2 mt-2">
    لیست خریدهای کاربر
</h2>
<div class="py-3">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th scope="col">تلگرام آیدی</th>
            <th scope="col">تلگرام یوزرنیم</th>
            <th scope="col">تراکنش</th>
            <th scope="col">سرور</th>
            <th scope="col">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($transactions as $transaction): ?>
            <tr>
                    <th scope="row" class="ltr"><?php echo htmlspecialchars($transaction['telegram_id']); ?></th>
                    <td class="ltr">
                        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                           href="./admin.php?action=transactions.change&telegram_id=<?= htmlspecialchars($transaction['telegram_id']) ?>"><?= htmlspecialchars($user['telegram_username']) ?></a>
                    </td>
                    <td class="ltr"><?php echo number_format($transaction['amount']); ?></td>
                    <td class="ltr"><?php echo htmlspecialchars($transaction['servers']); ?></td>
                    <td class="ltr"><?= $transaction['created_at'] ?></td>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
