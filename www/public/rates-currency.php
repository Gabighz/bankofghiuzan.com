<?php
	require("../includes/config.php");	

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("rates-currency-form.php", ["title" => "Currency rates"]);
	}
?>
