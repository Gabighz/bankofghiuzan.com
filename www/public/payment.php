<?php
	require("../includes/config.php");

	$userinfo = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
	$cash = $userinfo[0]["cash"];

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("payment-form.php", ["title" => "Domestic Payment"]);
	}

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(!empty($_POST["payment"]))
		{
			if($_POST["payment"] < $cash)
			{
				$payment = query("UPDATE users SET cash = cash + ? WHERE username= ?", $_POST["payment"], $_POST["username"]);
				$update_cash = query("UPDATE users SET cash = cash - ? WHERE id = ?", $_POST["payment"], $_SESSION["id"]);
				$history = query("INSERT INTO history (id, transaction, username, amount) VALUES(?, ?, ?, ?)", $_SESSION["id"], "DOMESTIC PAYMENT", $_POST["username"], $_POST["payment"]);
			}
			else if($_POST["payment"] > $cash)
			{
				apologize("You don't have enough money in this account.");
			}
		}

		redirect("/");
	}



?>
