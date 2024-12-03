<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>
<body>
<?php
    if (isset($_GET['error'])) {
        echo '<p style="color: red;">'.htmlspecialchars($_GET['error']).'</p>';
    }
    ?>
    <h1>Введите ваши данные</h1>
    <form action="process.php" method="post">
        <label for="first_name">Имя</label><br>
        <input type="text" id="first_name" name="first_name"><br><br>

        <label for="last_name">Фамилия</label><br>
        <input type="text" id="last_name" name="last_name"><br><br>

        <label for="data_birthday">Дата рождения</label><br>
        <input type="date" id="data_birthday" name="data_birthday"><br><br>

        <input type="submit" value="Продолжить">
        

    </form>
</body>
</html>
