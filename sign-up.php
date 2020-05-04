<?php

require_once('core.php');
require 'vendor/autoload.php';

$errors = [];

//Закрываем доступ для залогиненых
if ($user) {
    http_response_code(403);
    exit();
}

// если данные получену методом роst
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $gump = new GUMP();

// set validation rules  установить правила проверки
    $gump->validation_rules([
        'username' => 'required|max_len,30|min_len,3',
        'password' => 'required|max_len,30|min_len,4'
    ]);

// set field-rule specific error messages   установить специфичные для правила поля сообщения об ошибках
    $gump->set_fields_error_messages([
        'username' => [
            'required' => 'Поле обязательно для заполнения.',
            'max_len' => 'Максимальное число символов - 30.',
            'min_len' => 'Минивальное число символов - 3.'
        ],
        'password' => [
            'required' => 'Поле обязательно для заполнения.',
            'max_len' => 'Максимальное число символов - 30.',
            'min_len' => 'Минивальное число символов - 4.'
        ]
    ]);

// set filter rules   установить правила фильтрации
    $gump->filter_rules([
        'username' => 'trim|sanitize_string',
        'password' => 'trim'
    ]);
    
// после проверок и фильтрации помещает все в массив
    $valid_data = $gump->run($_POST);

    $sql_username = "SELECT user_name FROM users WHERE user_name = '{$valid_data['username']}'";// Собственно сам запрос
    $result_username = mysqli_query($mysqli_connect, $sql_username);// Сначала получаем объект результата
    if ($result_username) {
        $row = mysqli_fetch_assoc($result_username);// Затем преобразуем объект результата в виде ассоциативного массива
    } else {
        show_error($mysqli_connect);
    }

 //   if ($row)


//    if (!empty($row)) {
//        GUMP::set_error_message('already_exists', '{username} имя уже существует.');
//    }

    if ($valid_data) {

        $password = password_hash($valid_data['password'], PASSWORD_BCRYPT);

        $sql_users = 'INSERT INTO users (dt_reg, user_name, password)
				VALUES (NOW(), ?, ?)';

        //Создает подготовленное выражение на основе готового SQL запроса и переданных данных
        $insert_users = db_insert_data(
            $mysqli_connect,
            $sql_users,
            [
                $valid_data['username'],
                $password
            ]
        );

        if ($insert_users) {
            header("Location: login.php");
            exit();
        }
    }

    $errors = $gump->get_errors_array(); // ['field' => 'Field Somefield is required']
}

var_dump($errors);

// Подключение шаблонов
$sign_up_content = include_template(
    'sign-up.php',
    [
        'errors' => $errors
    ]
);

$layout_content = include_template(
    'layout.php',
    [
        'content' => $sign_up_content,
        'title' => 'Регистрация',
        'user' => $user
    ]
);
print($layout_content);