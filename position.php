<?php

require_once('core.php');

// Обращаемся к $_GET и проверяем на существование id
$categories_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (empty($categories_id)) {  //Проверяет переменную, возвращает true если переменной нет, или равна NULL
    header("HTTP/1.0 404 Not Found");
    die;
}

// Запрос лота по позиций категории по id
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
if (!isset($position)) {
    header("HTTP/1.0 404 Not Found");
    die;
}


$page_content = include_template(
    'main.php',
    [
        //'result_category' => $result_category
    ]
);

$layout_content = include_template(
    'layout.php',
    [
        'content' => $page_content,
        'title' => 'Каталог',
        'user' => $user,
        'categories' => $categories,
        'position' => $position
    ]
);

print($layout_content);

