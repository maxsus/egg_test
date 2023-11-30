<?php

/* Исходный код
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");
$id = $_GET['id'];
$res = $mysqli->query('SELECT * FROM users WHERE u_id=' . $id);
$user = $res->fetch_assoc();
 */


$mysqli = new mysqli("localhost", "my_user", "my_password", "world");
// Получение параметра из GET запроса. Рекомендуется применить какую-нибудь фильтрацию.
$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
// Не рекомендуется вставлять переменные прямо в запрос во избежании иньекций.
// Может использоваться как предварительная фильтрация, как на примере выше, 
// так и специальными функциями формирования запроса.
$query = $mysqli->prepare('SELECT * FROM users WHERE u_id = :id');
$query->execute(['id' => +$id]);
$res = $query->get_result();
$user = $res->fetch_assoc();
