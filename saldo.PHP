<!doctype html>
<html>
    <head>
        <meta charset=“UTF-8”>
        <title>Saldo</title>
        <link rel = "stylesheet" href = "Style/style.css" type = "text/css"/>
    </head>

    <body>
        
        <H1>Таблица сальдо</H1>

        <?php
            $link = mysqli_connect ("localhost", "root", "", "ShkuratokLABA") 
                or die ("Ошибка соединения с сервером");
        ?>
	
        <table>
            <tr>
                <th>&nbsp ID &nbsp</th>
                <th>&nbsp Apartment &nbsp</th>
                <th>&nbsp Saldo &nbsp</th>
                <th>&nbsp Month &nbsp</th>
                <th>&nbsp Year &nbsp</th>
            </tr>
				
            <?php
                $saldo = mysqli_query($link, "SELECT * FROM `Saldo`")
                    or die ("Ошибка получения таблицы Saldo");
                $saldo = mysqli_fetch_all($saldo)
                    or die ("Ошибка получения массива");
		
                foreach ($saldo as $sal)   
                {
                    echo '<tr>
                        <td>' . $sal[0] . '</td>
                        <td>' . $sal[1] . '</td>
                        <td>' . $sal[2] . '</td>
                        <td>' . $sal[3] . '</td>
                        <td>' . $sal[4] . '</td>
                    </tr>';
                }
            ?>
            
        </table>
        <form action="index.PHP">
            <button class="pressed-button">Назад</button>
        </form>
    </body>
</html>