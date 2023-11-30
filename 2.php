<?php

/* Исходный код 

$questionsQ = $mysqli->query('SELECT * FROM questions WHERE catalog_id=' . $catId);
$result = array();
while ($question = $questionsQ->fetch_assoc()) {
    $userQ = $mysqli->query('SELECT name, gender FROM users WHERE id=' . (int)$question[‘user_id’]);
    $user = $userQ->fetch_assoc();
    $result[] = array('question' => $question, 'user' => $user);
    $userQ->free();
}
$questionsQ->free();

*/


$result = [];

$questionsQ = $mysqli->prepare('SELECT * FROM questions WHERE catalog_id = :catId');
$questionsQ->execute(['catId' => $catId]);
$questionsResult = $questionsQ->get_result();

$question = $questionsResult->fetch_assoc();

while ($question) {
    $user_id = (int)$question['user_id'];

    $userQ = $mysqli->prepare('SELECT name, gender FROM users WHERE id = :user_id');
    $userQ->execute(['user_id' => $user_id]);
    $userResult = $userQ->get_result();

    $user = $userResult->fetch_assoc();

    $result[] = [
        'question' => $question,
        'user' => $user,
    ];

    $userQ->free();
};

$questionsQ->free();
