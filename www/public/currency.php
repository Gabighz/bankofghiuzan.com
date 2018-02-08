<?php
	require("../includes/config.php");

	$USD_to_GBP = 0.6748;
	$USD_to_EUR = 0.9114;
	$GBP_to_USD = 1.4818;
	$EUR_to_USD = 1.0964;
	$GBP_to_EUR = 1.3667;
	$EUR_to_GBP = 0.7318;

	

	if($_SERVER["REQUEST_METHOD"] === "GET")
	{
		render("currency-form.php", ["title" => "Currency Exchange"]);
	}


	if($_SERVER["REQUEST_METHOD"] === "POST")
	{
		if(!empty($_POST["currency1"]) && !empty($_POST["currency2"]))
		{

			if($_POST["amount1"] < 10000)

			{
					/*CURRENCY TO PURCHASE*/	/*CURRENCY TO CONVERT*/
			if($_POST["currency1"] === "USD"  && $_POST["currency2"] === "GBP" )
			{

				 query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["amount1"], $_SESSION["id"]);

				 
				 query("UPDATE currency SET amount = amount - ? WHERE id = ? AND cur = ?", $GBP_to_USD * $_POST["amount1"], $_SESSION["id"], $_POST["currency2"]);	

				query("INSERT INTO `history-exchange` (id, amount, amount2, transaction) VALUES(?, ?, ?, ?)", $_SESSION["id"], $_POST["amount1"],$USD_to_GBP * $_POST["amount1"], "GBP to USD");
				 /*CONVERTED GBP TO PURCHASE USD*/	
			}


				    /*CURRENCY TO PURCHASE*/		/*CURRENCY TO CONVERT*/
			if($_POST["currency1"] === "GBP" && $_POST["currency2"] === "USD")
			{
				query("UPDATE users SET cash = cash - ? WHERE id = ?", $USD_to_GBP * $_POST["amount1"], $_SESSION["id"]);

				query("INSERT INTO currency (id, cur, amount) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE amount = amount + VALUES(amount)", $_SESSION["id"],$_POST["currency1"], $_POST["amount1"]);

				query("INSERT INTO `history-exchange` (id, amount, amount2, transaction) VALUES(?, ?, ?, ?)", $_SESSION["id"], $_POST["amount1"],$GBP_to_USD * $_POST["amount1"], "USD to GBP");
				 /*CONVERTED USD TO PURCHASE GBP*/
			}


				    /*CURRENCY TO PURCHASE*/		/*CURRENCY TO CONVERT*/
			if($_POST["currency1"] === "USD" && $_POST["currency2"] === "EUR")
			{
				 query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["amount1"], $_SESSION["id"]);

				
				query("UPDATE currency SET amount = amount - ? WHERE id = ? AND cur = ?", $EUR_to_USD * $_POST["amount1"], $_SESSION["id"], $_POST["currency2"]);	

				query("INSERT INTO `history-exchange` (id, amount, amount2, transaction) VALUES(?, ?, ?, ?)", $_SESSION["id"], $_POST["amount1"],$USD_to_EUR * $_POST["amount1"], "EUR to USD");
				 /*CONVERTED EUR TO PURCHASE USD*/
			}

	

				    /*CURRENCY TO PURCHASE*/		/*CURRENCY TO CONVERT*/
			if($_POST["currency1"] === "EUR" && $_POST["currency2"] === "USD")
			{
				query("UPDATE users SET cash = cash - ? WHERE id = ?", $USD_to_EUR * $_POST["amount1"], $_SESSION["id"]);

 				query("INSERT INTO currency (id, cur, amount) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE amount = amount + VALUES(amount)", $_SESSION["id"], $_POST["currency1"], $_POST["amount1"]);

				query("INSERT INTO `history-exchange` (id, amount, amount2, transaction) VALUES(?, ?, ?, ?)", $_SESSION["id"], $_POST["amount1"],$EUR_to_USD * $_POST["amount1"], "USD to EUR");
				 /*CONVERTED USD TO PURCHASE EUR*/
			}

				    /*CURRENCY TO PURCHASE*/		/*CURRENCY TO CONVERT*/
			if($_POST["currency1"] === "GBP" && $_POST["currency2"] === "EUR")
			{
				query("UPDATE currency SET amount = amount - ? WHERE cur = 'EUR' AND id = ?", $GBP_to_EUR * $_POST["amount1"], $_SESSION["id"]);

				query("INSERT INTO currency (id, cur, amount) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE amount = amount + VALUES(amount)", $_SESSION["id"],$_POST["currency1"], $_POST["amount1"]);

				query("INSERT INTO `history-exchange` (id, amount, amount2, transaction) VALUES(?, ?, ?, ?)", $_SESSION["id"], $_POST["amount1"], $GBP_to_EUR * $_POST["amount1"], "EUR to GBP");
				 /*CONVERTED EUR TO PURCHASE GBP*/
			}

					/*CURRENCY TO PURCHASE*/		/*CURRENCY TO CONVERT*/
			if($_POST["currency1"] === "EUR" && $_POST["currency2"] === "GBP")
			{
				query("UPDATE currency SET amount = amount - ? WHERE cur = 'GBP' AND id = ?", $EUR_to_GBP * $_POST["amount1"], $_SESSION["id"]);

				query("INSERT INTO currency (id, cur, amount) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE amount = amount + VALUES(amount)", $_SESSION["id"],$_POST["currency1"], $_POST["amount1"]);

				query("INSERT INTO `history-exchange` (id, amount, amount2, transaction) VALUES(?, ?, ?, ?)", $_SESSION["id"], $_POST["amount1"], $GBP_to_EUR * $_POST["amount1"], "GBP to EUR"); 
				 /*CONVERTED GBP TO PURCHASE EUR*/
			}
			
			}
			else
			{
				apologize("The amount you're trying to input is too large. Refer to your local Bank of Ghiuzan subsidiary for a larger amount.");
			}
		}
		else
		{
			apologize("You must a currency to purchase, an amount and a currency to convert.");
		}

		redirect("currency.php");
	}

?>
