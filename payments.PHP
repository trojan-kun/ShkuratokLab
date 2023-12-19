<!doctype html>
<html>
    <head>
        <meta charset=“UTF-8”>
        <title>Payments</title>
        <link rel = "stylesheet" href = "Style/style.css" type = "text/css"/>
    </head>

    <body>
        
        <H1>Таблица платежей</H1>

        <?php
            $link = mysqli_connect ("localhost", "root", "", "ShkuratokLABA") 
                or die ("Ошибка соединения с сервером");
        ?>
	
        <table>
            <tr>
                <th>&nbsp ID &nbsp</th>
                <th>&nbsp Apartment &nbsp</th>
                <th>&nbsp Payment &nbsp</th>
                <th>&nbsp Month &nbsp</th>
                <th>&nbsp Year &nbsp</th>
            </tr>
				
            <?php
                $payments = mysqli_query($link, "SELECT * FROM `Payments`")
                    or die ("Ошибка получения таблицы Payments");
                $payments = mysqli_fetch_all($payments)
                    or die ("Ошибка получения массива");
		
                foreach ($payments as $pay)   
                {
                    echo '<tr>
                        <td>' . $pay[0] . '</td>
                        <td>' . $pay[1] . '</td>
                        <td>' . $pay[2] . '</td>
                        <td>' . $pay[3] . '</td>
                        <td>' . $pay[4] . '</td>
                    </tr>';
                }
            ?>		
        </table>
        <form action="index.PHP">
            <button class="pressed-button">Назад</button>
        </form>
    </body>
</html>