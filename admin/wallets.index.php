<h2 class="border-bottom pb-2 mt-2">
    کیف های پول
    <a class="btn btn-primary" href="./admin.php?action=wallets.create">افزودن کیف پول</a>
</h2>
<div class="py-3">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th scope="col">تلگرام آیدی</th>
            <th scope="col">تلگرام یوزرنیم</th>
            <th scope="col">نام مشتری</th>
            <th scope="col">شماره موبایل</th>
            <th scope="col">هزینه همکار</th>
            <th scope="col">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <th scope="row" class="ltr"><?php echo htmlspecialchars($user['telegram_id']); ?></th>
                <td class="ltr">
                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                       href="./admin.php?action=wallets.edit&telegram_id=<?= htmlspecialchars($user['telegram_id']) ?>"><?= htmlspecialchars($user['telegram_username']) ?></a>
                </td>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td class="ltr"><?php echo htmlspecialchars($user['mobile']); ?></td>
                <td class="ltr"><?php echo number_format($user['amount']); ?></td>
                <td class="ltr"><?= $user['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
