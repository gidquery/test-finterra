<?php

require_once('core.php');// Подключает файл только один раз, в core часовой пояс, соединение с БД, подключение функций И тд.



// Запрос для главной страницы
$query_position = "SELECT position_name FROM position";
$result_position = mysqli_query($mysqli_connect, $query_position);
if ($result_position) {
    $position = mysqli_fetch_all($result_position, MYSQLI_ASSOC);
} else {
    show_error($mysqli_connect);
}



// Подключение шаблонов
$page_content = include_template(
    'main.php',
    [
        'position' => $position,
      //  'categories' => $categories,
    ]
);

$layout_content = include_template(
    'layout.php',
    [
        'content' => $page_content,
     //   'categories' => $categories,
        'title' => 'Test - Главная страница',
        'user' => $user
    ]
);

print($layout_content);



