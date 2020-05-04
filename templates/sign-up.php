<form action="sign-up.php" method="post" autocomplete="on">
    <h2>Регистрация нового аккаунта</h2>
    <div class="form-group">
        <label for="username">Имя*</label>
        <input type="text" name="username"
               class="form-control form-control-lg
                   <?php if (isset($errors['username'])): ?>
                       is-invalid
                   <?php endif; ?>
                   <?php if (!empty($_POST)): ?>
                       is-valid
                   <?php endif; ?>"
               placeholder="Введите имя"
               id="username" value="<?= getPostVal('username'); ?>">
        <div class="valid-feedback"></div>
    </div>
    <div class="form-group">
        <label for="password">Пароль*</label>
        <input type="password" name="password"
               class="form-control form-control-lg
                   <?php if (isset($errors['password'])): ?>
                        is-invalid
                   <?php endif; ?>
                   <?php if (!empty($_POST)): ?>
                        is-valid
                   <?php endif; ?>"
               placeholder="Введите пароль"
               id="password" value="<?= getPostVal('password'); ?>">
        <div class="valid-feedback"></div>
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>