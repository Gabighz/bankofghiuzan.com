<?php	$rows = query("SELECT * FROM `portfolio-stock` WHERE id = ?", $_SESSION["id"]);
	
	$userinfo = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
	$cash = $userinfo[0]["cash"];
	$usernameinfo = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
	$username = $usernameinfo[0]["username"];

	$positions = [];
	foreach ($rows as $row)
	{
		$stock = lookup($row["symbol"]);
		if ($stock !== false)
    		{
        		$positions[] = [
            		"name" => $stock["name"],
            		"price" => $stock["price"],
            		"shares" => $row["shares"],
            		"symbol" => $row["symbol"]
        		];
    		}
	} ?>

<div class="small-pages">
	<p> Welcome to your stock exchange account, <?= $username ?></p>

<table align= "center", border = "1">
	<thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>


        <?php foreach ($positions as $position): ?>

    <tr>
        <td><?= $position["symbol"] ?></td>
		<td><?= $position["name"] ?></td>
        <td><?= $position["shares"] ?></td>
        <td><?= number_format($position["price"] * $position["shares"], 2, '.', ',' ) ?></td>
    </tr>
	<?php endforeach ?>
</table>
</div>
<br>
<br>
<div id="portfolio-cash">
<table align ="center", border = "1">
    <tr>
	<td>USD</td>
	<td><?= number_format($cash, 2, '.', ',') ?></td>
    </tr>	

</table>
</div>
