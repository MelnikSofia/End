<?php
session_start();

if (!isset($_SESSION['user_data'])) {
    header("Location: forma_log.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstName = $_SESSION['user_data']['first_name'];
    $lastName = $_SESSION['user_data']['last_name'];
    $originalText = $_POST['original_text'];
    $filteredText = $_POST['filtered_text']; 

    $date = date('Y-m-d H:i:s');

    $record = "Дата: $date, Имя: $firstName, Фамилия: $lastName, Оригинальный текст: $originalText, Отфильтрованный текст: $filteredText
";

    file_put_contents('records.txt', $record, FILE_APPEND | LOCK_EX);
    unset($_SESSION['user_data']);

    echo "Данные успешно сохранены!";
} else {
    echo "Данные не были отправлены.";
}
?>
