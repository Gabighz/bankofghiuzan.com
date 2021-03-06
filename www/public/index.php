<?php
	
	require("../includes/config.php");

	$usernameinfo = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
	$username = $usernameinfo[0]["username"];

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
	render("index-form.php", ["title" => "Account"]);
	}
	else if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(!empty($_POST["deposit"]))
		{
			if($_POST["deposit"] < 100000)
			{
		$update_cash = query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["deposit"], $_SESSION["id"]);
		$history = query("INSERT INTO history (id, transaction, username, amount) VALUES(?, ?, ?, ?)", $_SESSION["id"], "DEPOSIT", $username, $_POST["deposit"]);
			}
			else if($_POST["deposit"] > 100000)
			{
				apologize("The amount you're trying to deposit is too large. Visit your local Bank of Ghiuzan subsidiary to deposit sums of over 100,000 USD.");
			}
		}

		redirect("/"); 
	}

?>
