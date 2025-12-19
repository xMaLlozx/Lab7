<?php
// task_translit.php

$translitMap = [
    'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'yo','ж'=>'zh','з'=>'z','и'=>'i',
    'й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t',
    'у'=>'u','ф'=>'f','х'=>'h','ц'=>'ts','ч'=>'ch','ш'=>'sh','щ'=>'sch','ъ'=>'','ы'=>'y',
    'ь'=>'','э'=>'e','ю'=>'yu','я'=>'ya',
];

function transliterate($string) {
    global $translitMap;
    $result = '';
    $len = mb_strlen($string, 'UTF-8');
    for ($i = 0; $i < $len; $i++) {
        $ch = mb_substr($string, $i, 1, 'UTF-8');
        $lower = mb_strtolower($ch, 'UTF-8');
        if (isset($translitMap[$lower])) {
            $lat = $translitMap[$lower];
            if ($ch !== $lower && $lat !== '') {
                $lat = strtoupper(mb_substr($lat, 0, 1, 'UTF-8')) . mb_substr($lat, 1);
            }
            $result .= $lat;
        } else {
            $result .= $ch;
        }
    }
    return $result;
}

function translitForUrl($string) {
    $string = transliterate($string);
    $string = str_replace(' ', '_', $string);
    return $string;
}

$text = $_POST['text'] ?? '';
$trans = '';
$slug = '';

if ($text !== '') {
    $trans = transliterate($text);
    $slug = translitForUrl($text);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Транслитерация</title>
</head>
<body>

<h2>8–9) Транслитерация строки</h2>

<form method="post">
    <label>Строка на русском:<br>
        <textarea name="text" rows="3" cols="40"><?php echo htmlspecialchars($text); ?></textarea>
    </label><br><br>
    <button type="submit">Преобразовать</button>
</form>

<?php if ($text !== ''): ?>
    <p><strong>Транслитерация:</strong> <?php echo htmlspecialchars($trans); ?></p>
    <p><strong>Для URL (с подчёркиваниями):</strong> <?php echo htmlspecialchars($slug); ?></p>
<?php endif; ?>

</body>
</html>
