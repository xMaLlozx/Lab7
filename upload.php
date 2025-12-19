<?php
// upload.php

$filename = '';
$message = '';

if (!empty($_FILES['file']['name'])) {
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filename = basename($_FILES['file']['name']);
    $target = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        $message = 'Файл успешно загружен: ' . $filename;
    } else {
        $message = 'Ошибка загрузки файла';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка файла</title>
</head>
<body>

<h2>11) Загрузка файла на сервер</h2>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Загрузить</button>
</form>

<?php if ($message !== ''): ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

</body>
</html>
