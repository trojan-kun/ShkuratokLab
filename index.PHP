<!doctype html>
<html lang="ru"> 
    <head>
        <meta charset=“UTF-8”>
        <title>DataBase</title>
        <link rel = "stylesheet" href = "Style/style.css" type = "text/css"/>
    </head>

    <body>
        <ul>
	    <H1>Таблицы Базы Данных</H1>
        <form action="Add.PHP">
		    <button class="pressed-button">Добавить запись</button>
	    </form>      
        <form action="saldo.PHP">
            <button class="pressed-button">Сальдо</button>
	    </form>   
        <form action="charges.PHP">
            <button class="pressed-button">Начисления</button>
	    </form>  
	    <form action="payments.PHP">
            <button class="pressed-button">Платежи</button>
	    </form>  
	    <form action="TurnoverSheet.PHP">
            <button class="pressed-button">Оборотная ведомость</button>
	    </form>   
        <form action="TSApartment.PHP">
            <button class="pressed-button">Оборотная ведомость <br> по квартире</button>
	    </form>
        <form action="Arrears.PHP">
            <button class="pressed-button">Сводка по должникам</button>
	    </form>

        </ul>
    </body>
</html>