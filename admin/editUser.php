<h2 class="border-bottom pb-2 mt-2">
    اطلاعات فروشنده
</h2>
<div class="py-3">
  <div class="container">
  <main>
    <div class="row g-3">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-body-secondary">لیست تراکنش ها</span>
          <span class="badge bg-secondary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">شارژ اکانت</h6>
              <small class="text-body-secondary">توضیح اکانت</small>
            </div>
            <span class="text-body-secondary">100000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">شارژ اکانت</h6>
              <small class="text-body-secondary">توضیح اکانت</small>
            </div>
            <span class="text-body-secondary">90000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
            <div class="text-success">
              <h6 class="my-0">خرید محصول</h6>
              <small>توضیح محصول</small>
            </div>
            <span class="text-success">-90000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>اعتبار مانده (ریال)</span>
            <strong>100000</strong>
          </li>
        </ul>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">ویرایش اطلاعات</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">ID</label>
              <input type="text" class="form-control" name="id" placeholder="" value="">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">نام</label>
              <input type="text" class="form-control" name="name" placeholder="" value="">
            </div>

            <div class="col-12">
              <label for="username" class="form-label">نام کاربری</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" name="username">
              </div>
            </div>


            <div class="col-12">
              <label for="address" class="form-label">شماره همراه</label>
              <input type="text" class="form-control" name="mobile" placeholder="بدون 0 اول">
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">هزینه به ازای هر خرید</label>
              <input type="text" class="form-control" name="amount">
            </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">ثبت اطلاعات</button>
        </form>
      </div>
    </div>
  </main>
</div>
