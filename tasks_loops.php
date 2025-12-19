<?php
// tasks_loops.php

$regions = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Скопин'],
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задания 3–7 (циклы и массивы)</title>
</head>
<body>

<h2>3) Числа 0–100, делящиеся на 3</h2>
<?php
$i = 0;
while ($i <= 100) {
    if ($i % 3 == 0) {
        echo $i . ' ';
    }
    $i++;
}
?>

<h2>4) do…while 0–10 с текстом</h2>
<?php
$i = 0;
do {
    if ($i == 0) {
        echo $i . ' – это ноль<br>';
    } elseif ($i % 2 == 0) {
        echo $i . ' – четное число<br>';
    } else {
        echo $i . ' – нечетное число<br>';
    }
    $i++;
} while ($i <= 10);
?>

<h2>5) for без тела</h2>
<?php
for ($j = 0; $j < 10; print $j++) {
    // пустое тело
}
?>

<h2>6) Области и города</h2>
<?php
foreach ($regions as $region => $cities) {
    echo $region . ': ' . implode(', ', $cities) . '<br>';
}
?>

<h2>7) Только города на букву «К»</h2>
<?php
foreach ($regions as $region => $cities) {
    $filtered = [];
    foreach ($cities as $city) {
        if (mb_substr($city, 0, 1, 'UTF-8') === 'К') {
            $filtered[] = $city;
        }
    }
    if ($filtered) {
        echo $region . ': ' . implode(', ', $filtered) . '<br>';
    }
}
?>

</body>
</html>
