<?php
session_start(); 

if (!isset($_SESSION['user_data'])) {
    header("Location: forma_log.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перевод песен</title>
</head>
<body>
    <h1>Вы можете ввести текст песни Ленинград тут!</h1>
    <form action="submit.php" method="post"> 
        <label for="user_text">Ваш текст:</label><br>
        <textarea id="user_text" name="user_text" required></textarea><br><br>

        <input type="submit" value="Получить исправленный текст песни!">
        
    </form>
</body>
</html>

