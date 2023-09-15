<h2 class="border-bottom pb-2 mt-2">
  شارژ کیف پول
</h2>
<div class="py-3">
  <div class="m-auto ltr" style="max-width: 400px">
      <form class="" action="./admin.php?action=transactions.create&telegram_id=<?= $telegramId ?>" method="post">
          <div class="input-group mb-3 ">
              <input type="text" class="form-control" aria-label="Sizing example input"
                     aria-describedby="inputGroup-sizing-default" name="amount">
              <span class="input-group-text" id="inputGroup-sizing-default">مبلغ</span>
          </div>
          <button type="submit" class="btn btn-primary">افزایش کیف پول</button>
      </form>
  </div>
</div>
