<main class="form-signin w-100 m-auto mt-5 pt-5" style="direction: ltr">
    <form class="mt-5 text-center" action="admin.php?action=login&redirect=<?= $redirect ?? 'index' ?>" method="post">
        <h2 class="h3 mb-4 fw-normal rtl">لطفا وارد شوید</h2>
        <?php if ($_ENV['login_error']): ?>
            <div class="alert alert-danger rtl"><?= $_ENV['login_error'] ?></div>
        <?php endif; ?>
        <div class="form-floating">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">وارد شوید</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; <?= date('Y') ?></p>
    </form>
</main>
<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>