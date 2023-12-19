<?php
	$link = mysqli_connect ("localhost", "root", "", "ShkuratokLABA") 
		or die ("Ошибка соединения с сервером");
		
	$apartment = $_POST["apartment"];	
	$charge = $_POST["charge"];
    $payment = $_POST["payment"];
	$saldo = $_POST["saldo"];
	$month = $_POST["month"];
	$year = $_POST["year"];

	mysqli_query($link, "INSERT INTO `Charges`
		(`Apartment`, `Charge`, `Month`, `Year`)
		VALUES ('$apartment', '$charge', '$month', '$year')");

    mysqli_query($link, "INSERT INTO `Payments`
        (`Apartment`, `Payment`, `Month`, `Year`)
        VALUES ('$apartment', '$payment', '$month', '$year')");
							
	mysqli_query($link, "INSERT INTO `Saldo`
		(`Apartment`, `Saldo`, `Month`, `Year`) 
		VALUES ('$apartment', '$saldo', '$month', '$year')");
	
	header('Location: http://shkuratoklab/Add.PHP?');
?>