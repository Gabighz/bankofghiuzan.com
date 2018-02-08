<?php

	require("../includes/config.php");

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("settings-form.php", ["title" => "Settings"]);
	}

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(!empty($_POST["username-change"]))
		{
			$username_change = query("UPDATE users SET username = ? WHERE id = ?", $_POST["username-change"], $_SESSION["id"]);
		}
		else if(!empty($_POST["password-change"]))
		{
			$password_change = query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["password-change"]), $_SESSION["id"]);
		}
		else if(empty($_POST["username-change"]) && empty($_POST["password-change"]))
		{
			apologize("You must provide a new username or a new password!");
		}

		redirect("/");
	}

?>
