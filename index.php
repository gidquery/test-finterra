<?php

require_once('core_.php');// Подключает файл только один раз, в core часовой пояс, соединение с БД, подключение функций И тд.


// Запрос для главной страницы
$query_position = "SELECT position_name FROM position";
$result_position = mysqli_query($mysqli_connect, $query_position);//Выполняет запрос к базе данных, возвращает некое подготовленное выражение
if ($result_position) {
    $position = mysqli_fetch_all($result_position, MYSQLI_ASSOC);//Помещает данные из запроса в массив
} else {
    show_error($mysqli_connect);
}


// Подключение шаблонов
$page_content = include_template(
    'main.php',
    [
        'position' => $position,
        'result_position' => $result_position
    ]
);

$layout_content = include_template(
    'layout.php',
    [
        'content' => $page_content,
        'title' => 'Каталог - Главная страница',
        'user' => $user
    ]
);

print($layout_content);



