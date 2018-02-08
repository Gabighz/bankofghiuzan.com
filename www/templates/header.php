<!DOCTYPE html>

<html>

	<head>

		<link href="/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
		<link href="/css/styles.css" rel="stylesheet"/>

		<?php if (isset($title)): ?>
			<title>Bank of Ghiuzan: <?= htmlspecialchars($title) ?></title>
		<?php else: ?>
			<title>Bank of Ghiuzan</title>
		<?php endif ?>

		<script src="/js/jquery-1.11.1.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/scripts.js"></script>

	</head>

	<body>

		<div class="container">

			<div id="top" >
	
		<div id="image">
				<a href="/"><img alt="Bank of Ghiuzan" src="/img/logo.png"/></a>
		</div>


		 <ul class="nav nav-pills">
						<li><img src="/img/user.png" width="25px"><a href="index.php"><strong>Account</strong></a></li>
						<li><img src="/img/history.png" width="20px"><a href="history.php">History</a></li>
						<li><img src="/img/settings.png" width="25px"><a href="settings.php">Settings</a></li>
						<li><img src="/img/map.png" width="20px"><a href="map.php">Map</a></li> <!-- NEARBY SUBSIDIARIES & ATMs -->
						<li><img src="/img/envelope.png" width="40px"><a href="contact.php">Contact</a></li>
						<li><img src="/img/logout.png" width="25px"><a href="logout.php"><strong>Log Out</strong></a></li>
					</ul>
		
			   
		
			</div>

			<div id="middle">
