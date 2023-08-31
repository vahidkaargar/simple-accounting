<h2 class="border-bottom pb-2 mt-2">
    فروشندگان
</h2>
<div class="py-3">
    <a class="btn btn-primary" href="./admin.php?action=addUser">افزودن کاربر</a>
  <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">نام کاربری</th>
      <th scope="col">نام</th>
      <th scope="col">شماره موبایل</th>
      <th scope="col">هزینه هر خرید</th>
    </tr>
    </thead>
    <tbody>
      <?php foreach($users as $user): ?>
        <tr>
          <th scope="row"><?php echo htmlspecialchars($user['telegram_id']);?></th>
          <td><a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="./admin.php?action=index"><?php echo htmlspecialchars($user['telegram_username']);?></a></td>
          <td><?php echo htmlspecialchars($user['name']);?></td>
          <td><?php echo htmlspecialchars($user['mobile']);?></td>
          <td><?php echo htmlspecialchars($user['amount']);?></td>
        </tr>
      <?php endforeach;  ?>
    </tbody>
  </table>
</div>
