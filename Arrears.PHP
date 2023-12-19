<!doctype html>
<html>
    <head>
	    <meta charset=“UTF-8”>
	    <title>Arrears</title>
        <link rel = "stylesheet" href = "Style/style.css" type = "text/css"/>
    </head>

    <body>
        <H1>Сводка по категориям должников</H1>	
	
	    <table>
		    <tr>
			    <th rowspan="2">&nbsp Квартира &nbsp</th>
			    <th rowspan="2">&nbsp Начислено &nbsp<br>&nbsp за последний месяц &nbsp</th>
			    <th rowspan="2">&nbsp Сальдо &nbsp</th>
			    <th colspan="4">&nbsp Задолженность &nbsp</th>
		    </tr>
		
		    <tr>
			    <th>&nbsp 1 месяц &nbsp</th>
			    <th>&nbsp 2 месяца &nbsp</th>
			    <th>&nbsp 3 месяца &nbsp</th>
			    <th>&nbsp Свыше 3 &nbsp<br>&nbsp месяцев &nbsp</th>
		    </tr>		
		
		    <?php
		        $link = mysqli_connect ("localhost", "root", "", "ShkuratokLABA") 
			        or die ("Ошибка соединения с сервером");

			
                    $Apartments = mysqli_query($link, "SELECT DISTINCT Saldo.Apartment from Saldo
                    where (Saldo.Saldo > 0) and (Saldo.Month = 12) and (Saldo.Year = 2020)")
                or die ("Ошибка получения таблицы Saldo");
		        $Apartments = mysqli_fetch_all($Apartments)
			        or die ("Ошибка получения массива Apartments");
		
		        foreach ($Apartments as $apar) 
                {			
			        echo '<tr><td>&nbsp' . $apar[0] . '&nbsp</td>';
			        $info = mysqli_query($link, "SELECT Charges.Charge, Saldo.Saldo 
                        from `Charges`, `Saldo` where (Charges.Month = 12)and (Saldo.Month = 12)
                        and (Charges.Year = 2020) and (Saldo.Year = 2020)
		    			and (Charges.Apartment = $apar[0]) and (Saldo.Apartment = $apar[0])")
		    		or die ("Ошибка получения запроса из таблиц Charges, Saldo");
					
		    	    $info = mysqli_fetch_all($info)
		    		    or die ("Ошибка получения массива info");				
			
		    	    foreach ($info as $in) 
                    {
		    		    echo '<td>&nbsp' . $in[0] . '&nbsp</td>
		    			    <td>&nbsp' . $in[1] . '&nbsp</td>';
		    	    }
			
		    	    $Debtors = mysqli_query($link, "CALL Debtors($apar[0]);")
		    		    or die ("Ошибка получения запроса хранимой процедуры");
					
		    	    $Debtors = mysqli_fetch_all($Debtors)
		    		    or die ("Ошибка получения массива Debtors");
				
		    	    for ($i = 1; $i <= 4; $i++)  
                    {
		    		    foreach ($Debtors as $deb) 
                        {
		    			    if ($i == $deb[0]) 
                            {
		    				    echo '<td>&nbsp' . $in[1] . '&nbsp</td>';
		    			    }
		    			    if ($i != $deb[0])
		    			    {
		    				    echo '<td></td>';
		    			    }
				        }
			        }
			        echo '</tr>';
		        }
		    ?>
	    </table>  
        <form action="index.PHP">
            <button class="pressed-button">Назад</button>
        </form>      
    </body>
</html>