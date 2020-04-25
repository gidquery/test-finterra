<?php

require_once('core_.php');// Подключает файл только один раз, в core часовой пояс, соединение с БД, подключение функций И тд.


// Запрос для главной страницы
/*
$query_category = "SELECT category_name FROM categories";
$result_category = mysqli_query($mysqli_connect, $query_category);//Выполняет запрос к базе данных, возвращает некое подготовленное выражение
if ($result_category) {
    $category = mysqli_fetch_all($result_category, MYSQLI_ASSOC);//Помещает данные из запроса в массив
} else {
    show_error($mysqli_connect);
}
*/

// Подключение шаблонов
$page_content = include_template(
    'main.php',
    [
      //  'result_category' => $result_category
    ]
);

$layout_content = include_template(
    'layout.php',
    [
        'content' => $page_content,
        'title' => 'Каталог - Главная страница',
        'user' => $user,
        'categories' => $categories
    ]
);

print($layout_content);



