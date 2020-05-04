<?php

require_once('core.php');


// Подключение шаблонов
    $login_content = include_template(
        'login.php',
        [
    //        'errors_login' => $errors_login
        ]
    );

    $layout_content = include_template(
        'layout.php',
        [
            'content' => $login_content,
            'title' => 'Вход',
            'user' => $user
        ]
    );
    print($layout_content);
