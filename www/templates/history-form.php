<?php
	$rows = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);

	


	$positions = [];
	foreach ($rows as $row)
	{
        		$positions[] = [
            		"transaction" => $row["transaction"],
			"time" => $row["time"],
            		"username" => $row["username"],
            		"amount" => $row["amount"],
        		];
	}

	$rows_stock = query("SELECT * FROM `history-stock` WHERE id = ?", $_SESSION["id"]);

	


	$positions_stock = [];
	foreach ($rows_stock as $row_stock)
	{
		$stock = lookup($row_stock["symbol"]);
		if ($stock !== false)
    		{
        		$positions_stock[] = [
            		"transaction" => $row_stock["transaction"],
			"time" => $row_stock["time"],
            		"price" => $stock["price"],
            		"shares" => $row_stock["shares"],
            		"symbol" => $row_stock["symbol"]
        		];
    		}
	}

	$rows_exchange = query("SELECT * FROM `history-exchange` WHERE id = ?", $_SESSION["id"]);

	$positions_exchange = [];
	foreach ($rows_exchange as $row_exchange)
	{
        		$positions_exchange[] = [
            		"transaction" => $row_exchange["transaction"],
			"time" => $row_exchange["time"],
            		"amount" => $row_exchange["amount"],
			"amount2" => $row_exchange["amount2"]
        		];
	}

?>

<div>
	
<table align= "center", border = "1">
	<thead>
        <tr>
            <th>Transaction</th>
            <th>Date & Time</th>
            <th>Account</th>
            <th>Amount</th>
        </tr>
    </thead>


        <?php foreach ($positions as $position): ?>

    <tr>
	<td><?= $position["transaction"] ?></td>
	<td><?= $position["time"] ?></td>
        <td><?= $position["username"] ?></td>
        <td><?= $position["amount"] ?></td>
    </tr>
	<?php endforeach ?>
</table>
</div>
<br>
<br>
<p><strong> Stock exchange history </strong></p>
<div>
	
<table align= "center", border = "1">
	<thead>
        <tr>
            <th>Transaction</th>
            <th>Date & Time</th>
            <th>Symbol</th>
            <th>Shares</th>
	    <th>Price</th>
        </tr>
    </thead>


        <?php foreach ($positions_stock as $position_stock): ?>

    <tr>
	<td><?= $position_stock["transaction"] ?></td>
	<td><?= $position_stock["time"] ?></td>
        <td><?= $position_stock["symbol"] ?></td>
        <td><?= $position_stock["shares"] ?></td>
        <td><?= number_format($position_stock["price"] * $position_stock["shares"], 2, '.', ',' ) ?></td>
    </tr>
	<?php endforeach ?>
</table>
</div>
<br>
<br>
<p><strong> Currency exchange history </strong></p>
<div>

<table align= "center", border = "1">
	<thead>
        <tr>
            <th>Transaction</th>
            <th>Date & Time</th>
            <th>Amount converted</th>
	    <th>Amount purchased</th>
        </tr>
    </thead>


        <?php foreach ($positions_exchange as $position_exchange): ?>

    <tr>
	<td><?= $position_exchange["transaction"] ?></td>
	<td><?= $position_exchange["time"] ?></td>
        <td><?= $position_exchange["amount2"] ?></td>
	<td><?= $position_exchange["amount"] ?></td>
    </tr>
	<?php endforeach ?>
</table>
</div>
