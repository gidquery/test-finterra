<?php

require_once('core.php');// Подключает файл только один раз, в core часовой пояс, соединение с БД, подключение функций И тд.

// Запрос для главной страницы
$query_categories = "SELECT categories.id, category_name, COUNT(position_name) FROM categories
                  LEFT JOIN position p ON categories.id = p.category_id
GROUP BY category_name";
$result_categories = mysqli_query($mysqli_connect, $query_categories);  // функция для выполнения любых SQL запросов
if ($result_categories) {
    $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);  // функция для создания масива
} else {
    show_error($mysqli_connect);
}

// Обращаемся к $_GET и проверяем на существование id
$categories_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$position = [];

if ($categories_id) {  //Проверяет переменную, возвращает true если переменной нет, или равна NULL
    // Запрос лота по позиции категории по id
    $query_position = "SELECT categories.id, position_name
FROM categories
         LEFT JOIN position p ON categories.id = p.category_id
WHERE categories.id = {$categories_id}";
    $result_position = mysqli_query($mysqli_connect, $query_position);// функция для выполнения любых SQL запросов
    if ($result_position) {
        $position = mysqli_fetch_all($result_position, MYSQLI_ASSOC);
    } else {
        show_error($mysqli_connect);
    }

    if (empty($position)) {
        header("HTTP/1.0 404 Not Found");
        die;
    }
}

// Подключение шаблонов
$page_content = include_template(
    'main.php',
    [
        'categories' => $categories,
        'position' => $position
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



