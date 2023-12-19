<!doctype html>
<html>
    <head>
	    <meta charset=“UTF-8”>
	    <title>Turnover Sheet</title>
		<link rel = "stylesheet" href = "Style/style.css" type = "text/css"/>
    </head>

    <body>
        <H1>Оборотная ведомость</H1>
	
	    <?php
	    	$link = mysqli_connect ("localhost", "root", "", "ShkuratokLABA") 
		    	or die ("Ошибка соединения с сервером");
	    ?>
	
	    <table>
		    <tr>
		    	<th>&nbsp Квартира &nbsp</th>
			    <th>&nbsp Вход. сальдо &nbsp</th>
		    	<th>&nbsp Январь &nbsp</th>
		    	<th>&nbsp Февраль &nbsp</th>
		    	<th>&nbsp Март &nbsp</th>
		    	<th>&nbsp Апрель &nbsp</th>
		    	<th>&nbsp Май &nbsp</th>
		    	<th>&nbsp Июнь &nbsp</th>
		       	<th>&nbsp Июль &nbsp</th>
			    <th>&nbsp Август &nbsp</th>
			    <th>&nbsp Сентябрь &nbsp</th>
			    <th>&nbsp Октябрь &nbsp</th>
			    <th>&nbsp Ноябрь &nbsp</th>
			    <th>&nbsp Декабрь &nbsp</th>
			    <th>&nbsp Исх. сальдо &nbsp</th>
		    </tr>	
		
		    <?php
		        $Apartments = mysqli_query($link,"SELECT DISTINCT Payments.Apartment from `Payments`")
		    	    or die ("Ошибка получения таблицы Payments");
		        $Apartments = mysqli_fetch_all($Apartments)
			        or die ("Ошибка получения массива Apartments");
					$year = 2020;
		
		        foreach ($Apartments as $apar)
                {		
			        $OpenSaldo = mysqli_query($link, "SELECT OpeningBalance.Saldo from `OpeningBalance`
					    WHERE (OpeningBalance.Apartment = $apar[0])")
				    or die ("Ошибка получения запроса из таблицы OpeningBalance");
					
			        $OpenSaldo = mysqli_fetch_all($OpenSaldo)
				        or die ("Ошибка получения массива OpenSaldo");
				
			        foreach ($OpenSaldo as $os)
                    {
				        echo '<tr>
				    	    <td>&nbsp' . $apar[0] . '</td>
				    	<td>&nbsp' . $os[0] . '</td>';
                        for ($i = 1; $i <= 8; $i++) 
                        {
                            echo '<td>&nbsp 0 <br>&nbsp 0 <br>&nbsp 0 </td>';
                        }
                        $SumSaldo = $os[0];
			        }
			
			        for ($i = 9; $i <= 12; $i++)
                    {
                        $TurnoverSheet = mysqli_query($link, "SELECT Charges.Charge, Payments.Payment 
                            from  `Charges`, `Payments`
				        	where (Payments.Month = '$i') and (Payments.Year = '$year')
				    	    and (Charges.Month = '$i') and (Charges.Year = '$year')
				    	    and (Payments.Apartment = '$apar[0]') 
                            and (Charges.Apartment = '$apar[0]')")
				    	or die ("Ошибка получения запроса из таблиц Payments и\или Charges");
                        $TurnoverSheet = mysqli_fetch_all($TurnoverSheet)
					        or die ("Ошибка получения массива TurnoverSheet");
				             
                        foreach($TurnoverSheet as $ts)
                        {
                            $saldo = $ts[0] - $ts[1];
							$SumSaldo = $SumSaldo + $saldo;
					        echo '<td>&nbsp' . $ts[0] . '&nbsp<br>&nbsp' . $ts[1] . '&nbsp<br>&nbsp' . $SumSaldo . '&nbsp</td>';
                        }
                    }
					echo '<td>&nbsp' . $SumSaldo . '&nbsp</td>';
                }				        			    					        
		    ?>	
	    </table>
		<form action="index.PHP">
            <button class="pressed-button">Назад</button>
        </form>
    </body>
</html>