<?php
	$userinfo = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
	$cash = $userinfo[0]["cash"];

	$rows_currency = query("SELECT * FROM currency WHERE id = ?",$_SESSION["id"]);


	$positions = [];
	foreach ($rows_currency as $row_currency)
	{
        		$positions[] = [
            		"cur" => $row_currency["cur"],
            		"amount" => $row_currency["amount"]
        		];
	} ?>


<p><strong>Domestic account</strong></p>
<table align ="center", border = "1">
    <tr>
	<td>USD</td>
	<td><?= number_format($cash, 2, '.', ',') ?></td>
    </tr>	

</table>
<br>
<p><strong>Currency account</strong></p>
<table align ="center", border = "1">
	<?php foreach ($positions as $position): ?>
    <tr>
	<td><?= $position["cur"] ?></td>
	<td><?= number_format($position["amount"], 2, '.', ',') ?></td>
    </tr>
	<?php endforeach ?>	

</table>
<br>
<p> Would you like to check <a href="rates-currency.php">currency exchange rates</a>?</p>
<br>
<form action="currency.php" method="post">
<p> Select what currency you want to convert</p>
    <fieldset>
        <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="currency1" placeholder="Currency to purchase" type="text"/>
        </div>
	<div class="form-group">
            <input autofocus class="form-control" name="amount1" placeholder="Amount" type="text"/>
        </div>
	<div class="form-group">
            <input autofocus class="form-control" name="currency2" placeholder="Currency to convert" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Convert</button>
        </div>
    </fieldset>
    </fieldset>
</form>


