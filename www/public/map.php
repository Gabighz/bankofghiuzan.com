<?php
	require("../includes/config.php");

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("map.html", ["title" => "Map"]);
	}
?>
