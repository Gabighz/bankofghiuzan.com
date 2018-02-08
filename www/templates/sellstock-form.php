<?php	$rows = query("SELECT * FROM `portfolio-stock` WHERE id = ?", $_SESSION["id"]);
	$stock["name"] = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
	$userinfo = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
	$cash = $userinfo[0]["cash"];

	

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
	}

 ?> 

<div class="small-pages">
<form action="sell-stock.php" method="post">
<p> Select what stock you want to sell </p>
    <fieldset>
        <fieldset>
        <div class="form-group">
            <select class="form-control" name="symbol">
                <option disabled selected value="">Symbol</option>
<?php foreach ($positions as $position): ?>
		<option value='?'><?= $position["symbol"] ?></option>
<?php endforeach ?>	
            </select>
        </div>
	
        <div class="form-group">
            <button class="btn btn-default" type="submit">Sell</button>
        </div>
    </fieldset>
    </fieldset>
</form>
</div>
			

