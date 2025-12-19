<?php
// calculator.php

$result = '';
$a = $_POST['a'] ?? '';
$b = $_POST['b'] ?? '';
$op = $_POST['op'] ?? '';

if ($a !== '' && $b !== '' && $op) {
    $aVal = (float)$a;
    $bVal = (float)$b;
    switch ($op) {
        case '+':
            $result = $aVal + $bVal;
            break;
        case '-':
            $result = $aVal - $bVal;
            break;
        case '*':
            $result = $aVal * $bVal;
            break;
        case '/':
            $result = ($bVal != 0) ? $aVal / $bVal : 'Деление на ноль!';
            break;
        default:
            $result = 'Неизвестная операция';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
</head>
<body>

<h2>10) Калькулятор</h2>

<form method="post">
    <input type="text" name="a" value="<?php echo htmlspecialchars($a); ?>">
    <input type="text" name="b" value="<?php echo htmlspecialchars($b); ?>">
    <button type="submit" name="op" value="+">+</button>
    <button type="submit" name="op" value="-">-</button>
    <button type="submit" name="op" value="*">*</button>
    <button type="submit" name="op" value="/">/</button>
</form>

<?php if ($result !== ''): ?>
    <p>Результат: <?php echo htmlspecialchars((string)$result); ?></p>
<?php endif; ?>

</body>
</html>
