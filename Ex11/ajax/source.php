<?php

$term = trim($_GET['term']);

$listUser = [
    'cat',
    'dog',
    'elephant',
    'fish',
    'pig',
    'snake',
    'rhino',
    'cock',
    'duck',
    'jolly',
    'birds',
    'ant'
];
$results = [];

foreach($listUser as $user) {
    if (strstr($user, $term)) $results[] = $user;
}

echo json_encode($results);