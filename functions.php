<?php
// functions.php
date_default_timezone_set('Europe/Moscow');

// 1) Рекурсивная функция возведения в степень
function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    }
    if ($pow > 0) {
        return $val * power($val, $pow - 1);
    }
    // Отрицательная степень
    return 1 / power($val, -$pow);
}

// 2) Склонения
function plural($number, $one, $two, $many) {
    $n = abs($number) % 100;
    $n1 = $n % 10;
    if ($n > 10 && $n < 20) return $many;
    if ($n1 > 1 && $n1 < 5) return $two;
    if ($n1 == 1) return $one;
    return $many;
}

// 2) Функция текущего времени со склонениями
function currentTimeString() {
    $h = (int)date('H');
    $m = (int)date('i');

    $hWord = plural($h, 'час', 'часа', 'часов');
    $mWord = plural($m, 'минута', 'минуты', 'минут');

    return $h . ' ' . $hWord . ' ' . $m . ' ' . $mWord;
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Функции power и время</title>
</head>
<body>
<h2>Функция power($val, $pow)</h2>
<p>2 в степени 5 = <?php echo power(2, 5); ?></p>
<p>3 в степени 3 = <?php echo power(3, 3); ?></p>
<p>2 в степени -2 = <?php echo power(2, -2); ?></p>

<h2>Текущее время</h2>
<p>Сейчас: <?php echo currentTimeString(); ?></p>
</body>
</html>
