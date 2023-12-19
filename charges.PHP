<!doctype html>
<html>
    <head>
        <meta charset=“UTF-8”>
        <title>Charge</title>
        <link rel = "stylesheet" href = "Style/style.css" type = "text/css"/>
    </head>

    <body>

        <H1>Таблица начислений</H1>

        <?php
            $link = mysqli_connect ("localhost", "root", "", "ShkuratokLABA") 
                or die ("Ошибка соединения с сервером");
        ?>
	
        <table>
            <tr>
                <th>&nbsp ID &nbsp</th>
                <th>&nbsp Apartment &nbsp</th>
                <th>&nbsp Charge &nbsp</th>
                <th>&nbsp Month &nbsp</th>
                <th>&nbsp Year &nbsp</th>
            </tr>
				
            <?php
                $charges = mysqli_query($link, "SELECT * FROM `Charges`")
                    or die ("Ошибка получения таблицы Charges");
                $charges = mysqli_fetch_all($charges)
                    or die ("Ошибка получения массива");
		
                foreach ($charges as $cha)   
                {
                    echo '<tr>
                        <td>' . $cha[0] . '</td>
                        <td>' . $cha[1] . '</td>
                        <td>' . $cha[2] . '</td>
                        <td>' . $cha[3] . '</td>
                        <td>' . $cha[4] . '</td>
                    </tr>';
                }
            ?>		
        </table>
        <form action="index.PHP">
            <button class="pressed-button">Назад</button>
        </form>
    </body>
</html>