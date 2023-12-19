<!doctype html>
<html>
    <head>
        <meta charset=“UTF-8”>
        <title>Adding DataBase</title>
        <link rel = "stylesheet" href = "Style/style.css" type = "text/css"/>
    </head>

    <body>
        <H1>Добавить новую запись с таблицу</H1>
        <form action="AddFunction.PHP" method="post">
            <p>Номер квартиры</p>
            <input type="number" class="pressed-button" name="apartment">
            <p>Начисления по лицевому счету</p>
            <input type="number" class="pressed-button"  name="charge">
            <p>Платежи по лицевому счету</p>
            <input type="number" class="pressed-button"  name="payment">
            <p>Сальдо</p>
            <input type="number" class="pressed-button"  name="saldo">
            <p>Месяц</p>
            <input type="number" class="pressed-button"  name="month">
            <p>Год</p>
            <input type="number" class="pressed-button"  name="year">
            <br> <br>
            <button type="submit" class="pressed-button">Добавить</button>
        </form>       
        <form action="index.PHP">
            <button class="pressed-button">Назад</button>
        </form>
    </body>
</html>