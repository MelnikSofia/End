<?php
session_start(); 

if (!isset($_SESSION['user_data'])) {
    header("Location: forma_log.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фильтрация непристойных слов в пенях группы Ленинград</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }
        .text-block {
            width: 45%; 
        }
        h2 {
            margin: 0 0 10px 0;
        }
        .badword {
            color: red; 
            font-weight: bold; 
        }
        .replacement {
            color: green; 
            font-weight: bold; 
        }
        p {
            margin: 0; 
        }
    </style>
</head>
<body>
    <?php
function load_Badwords($filename)
{
    $badWords = [];
    $lines = file($filename, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
    foreach($lines as $line)
    {
        list($badWord, $replacement) = explode('-', $line);
        $badWords[trim($badWord)] = trim($replacement);
    }
    return $badWords;

}

$badWordsFile = 'bad_words.txt';
$badWords = load_Badwords($badWordsFile);

if ($_SERVER['REQUEST_METHOD']=="POST")
{
    $original_text = $_POST['user_text'];
    $filtered_text = $original_text;

    foreach($badWords as $bad =>$good)
    {
        $filtered_text = str_ireplace($bad, $good, $filtered_text);
    }
    
    echo "<div class='container'>";
    echo "<div class='text-block'><h2>Ваш оригинальный текст:</h2><p>" . nl2br(htmlspecialchars($original_text)) . "</p></div>";
    echo "<div class='text-block'><h2>Изменённый текст:</h2><p>" . nl2br(htmlspecialchars($filtered_text)) . "</p></div>";
    echo "</div>";
    
    // Добавляем форму для сохранения данных
    echo '<form action="save_record.php" method="post">';
    echo '<input type="hidden" name="filtered_text" value="' . htmlspecialchars($filtered_text) . '">';
    echo '<input type="hidden" name="original_text" value="' . htmlspecialchars($original_text) . '">';
    echo '<input type="submit" value="Сохранить данные">';
    echo '</form>';
} else {
    echo "Текст не был отправлен.";
}
?>
</body>
</html>