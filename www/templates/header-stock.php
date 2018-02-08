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
			<li><a href="index.php"><strong>Back to your bank account</strong></a></li>
			<li><a href="history-stock.php">Exchange history</a></li>
                        <li><a href="quote.php">Quote</a></li>
                        <li><a href="buy-stock.php">Buy stock</a></li>
                        <li><a href="sell-stock.php">Sell stock</a></li>
                    </ul>
		
               
        
            </div>

            <div id="middle">
