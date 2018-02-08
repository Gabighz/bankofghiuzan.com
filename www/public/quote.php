<?php
	require("../includes/config.php");	

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render_stock("quote-form.php", ["title" => "Get Quote"]);
	}
?>
