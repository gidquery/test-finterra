<form action="sign-up.php" method="post" autocomplete="on">
    <h2>Регистрация нового аккаунта</h2>
    <div class="form-group">
        <label for="username">Имя<sup>*</sup></label>
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
        <?php if (isset($errors['username'])): ?>
        <div class="invalid-feedback">
            <?= $errors['username']; ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="password">Пароль<sup>*</sup></label>
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
        <?php if (isset($errors['password'])): ?>
            <div class="invalid-feedback">
                <?= $errors['password']; ?>
            </div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>