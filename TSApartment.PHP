<!doctype html>
<html>
    <head>
	    <meta charset=“UTF-8”>
	    <title>Turnover Sheet for Apartment</title>
        <link rel = "stylesheet" href = "Style/style.css" type = "text/css"/>
    </head>

    <body>

        <H1>Начисления по месяцам 2020 года квартиры 1 </H1>
	
	    <?php
		    $link = mysqli_connect ("localhost", "root", "", "ShkuratokLABA") 
			    or die ("Ошибка соединения с сервером");
	    ?>
	
	    <table>
		    <tr>
		    	<th>&nbsp На начало года &nbsp<br>&nbsp (+долг/-переплата) &nbsp</th>
			    <th></th>
			    <th>&nbsp 01 &nbsp</th>
			    <th>&nbsp 02 &nbsp</th>
			    <th>&nbsp 03 &nbsp</th>
			    <th>&nbsp 04 &nbsp</th>
			    <th>&nbsp 05 &nbsp</th>
			    <th>&nbsp 06 &nbsp</th>
			    <th>&nbsp 07 &nbsp</th>
			    <th>&nbsp 08 &nbsp</th>
			    <th>&nbsp 09 &nbsp</th>
			    <th>&nbsp 10 &nbsp</th>
			    <th>&nbsp 11 &nbsp</th>
			    <th>&nbsp 12 &nbsp</th>
			    <th>&nbsp Итого: &nbsp</th>
			    <th>&nbsp На конец года &nbsp<br>&nbsp (+долг/-переплата) &nbsp</th>
		    </tr>		
		
		    <?php
		        $Apartment = 1;
		
		        $OpenSaldo = mysqli_query($link, "SELECT OpeningBalance.Saldo 
                    from OpeningBalance WHERE (OpeningBalance.Apartment = $Apartment)")
			    or die ("Ошибка получения запроса из таблицы OpeningBalance");
        
		        $OpenSaldo = mysqli_fetch_all($OpenSaldo)
			        or die ("Ошибка получения массива OpenSaldo");
		
		        foreach ($OpenSaldo as $os) 
                {
			        echo '<tr>
			        	<td rowspan="2">&nbsp' . $os[0] . '</td>
			        	<td>&nbsp Начис. &nbsp</td>';
			        for ($i = 1; $i <= 8; $i++)    
                    {
			    	    echo '<td>&nbsp 0 &nbsp</td>';
			        }
		        }
		
		        $payment = 0;
		        for ($i = 9; $i <= 12; $i++) 
                {                    
			        $TurnoverSheet = mysqli_query($link, "SELECT Payments.Payment 
                        from `Payments` where (Payments.Month = $i) and (Payments.Year = 2020)
			    		and (Payments.Apartment = $Apartment)")
			    	or die ("Ошибка получения запроса из таблицы payments");
				
			        $TurnoverSheet = mysqli_fetch_all($TurnoverSheet)
			    	or die ("Ошибка получения массива TurnoverSheet");
				
			        foreach ($TurnoverSheet as $ts) 
                    {
			        	echo '<td>&nbsp' . $ts[0] . '&nbsp</td>';
			    	    $payment = $payment + $ts[0];
			        }
		        }   
		        echo '<td>&nbsp' . $payment . '&nbsp</td>';
		
		        $TurnoverSheet = mysqli_query($link, "SELECT Saldo.Saldo from `Saldo`
			    	where (Saldo.Month = 12) and (Saldo.Year = 2020) and (Saldo.Apartment = $Apartment)")
			    or die ("Ошибка получения запроса из таблицы Saldo");
			
		        $TurnoverSheet = mysqli_fetch_all($TurnoverSheet)
			       or die ("Ошибка получения массива TurnoverSheet");
			
		        foreach ($TurnoverSheet as $ts) 
                {
			        echo '<td rowspan="2">&nbsp' . $ts[0] . '&nbsp</td>';
		        }		
		
		        echo '<tr><td>&nbsp Опл. &nbsp</td>';
		        for ($i = 1; $i <= 8; $i++) 
                {
			        echo '<td>&nbsp 0 &nbsp</td>';
		        }
		
		        $charges = 0;
		        for ($i = 9; $i <= 12; $i++) 
                {
			        $TurnoverSheet = mysqli_query($link, "SELECT Charges.Charge from`Charges`
					    where (Charges.Month = $i) and (Charges.Year = 2020)
					    and (Charges.Apartment = $Apartment)")
				    or die ("Ошибка получения запроса из таблицы Charges");
				
			        $TurnoverSheet = mysqli_fetch_all($TurnoverSheet)
			    	    or die ("Ошибка получения массива TurnoverSheet");
				
			        foreach ($TurnoverSheet as $ts) 
                    {
				        echo '<td>&nbsp' . $ts[0] . '&nbsp</td>';
				        $charges = $charges + $ts[0];
			        }
		        }
		
		        $endr = 0;
		        $end = $os[0] + $payment - $charges;
		        echo '<td>&nbsp' . $charges . '&nbsp</td>
			        <tr><td colspan="15" align="right">&nbsp Итого к оплате: &nbsp</td>
				<td>&nbsp' . $end . '&nbsp</td> ';
		    ?>		
	    </table>
        <form action="index.PHP">
            <button class="pressed-button">Назад</button>
        </form>
    </body>
</html>