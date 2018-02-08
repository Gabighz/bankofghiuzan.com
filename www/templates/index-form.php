<?php
	$usernameinfo = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
	$username = $usernameinfo[0]["username"];
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
	}
?>

<p class="intros"> Welcome to your user account, <?= $username ?> !</p>
<br>
<p><strong>Domestic account</strong></p>

<table align ="center", border = "1">
	<tr>
	<td>USD</td>
	<td><?= number_format($cash, 2, '.', ',') ?></td>
	</tr>	

</table>
<br>
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
<br>
<br>
<p> Would you like to deposit in USD ? </p>
<form action="index.php" method="post">
	<fieldset>
		<div class="form-group">
			<input autofocus class="form-control" name="deposit" placeholder="Amount in USD" type="text"/>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default">Deposit</button>
		</div>
	</fieldset>
	
</form>
<br>
<br>
<p>Check our <a href="map.php">map</a> to see local Bank of Ghiuzan subsidiaries or ATMs</p>

 <div id="sidebar">
	<table>
		<tr>
			<td><img src="/img/money.png" width="25px"><a href="payment.php">Domestic payment</a></td>
		</tr>
		<tr>
			<td><img src="/img/currency.png" width="25px"><a href="currency.php">Currency Exchange</a></td>
		</tr>
		<tr>
			<td><img src="/img/stock.png" width="25px"><a href="index-stock.php">Stock Exchange</a></td>
		</tr>
	</table>
 </div>