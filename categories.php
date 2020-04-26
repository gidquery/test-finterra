<?php

require_once('mysqli_connect.php');

$query_categories = "SELECT categories.id, category_name, COUNT(position_name) FROM categories
                  LEFT JOIN position p ON categories.id = p.category_id
GROUP BY category_name";
$result_categories = mysqli_query($mysqli_connect, $query_categories);  // функция для выполнения любых SQL запросов
if ($result_categories) {
    $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);  // функция для создания масива
} else {
    show_error($mysqli_connect);
}
