<!DOCTYPE html>

<html>
    <head>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script>

            /**
             * Gets a quote via JSON.
             */
            function quote()
            {
                var url = 'quote-stock.php?symbol=' + $('#symbol').val();
                $.getJSON(url, function(data) {
                    $('#price').html(data.price);
                });
            }

        </script>
    </head>
    <body>
	<div class="small-pages">
        <form onsubmit="quote(); return false;">
            Symbol: <input autocomplete="off" id="symbol" type="text"/>
            <br/>
            Price: <span id="price">to be determined</span>
            <br/><br/>
            <input type="submit" value="Get Quote"/>
        </form>
<br>
<br>
	<p> Would you like to go back to your <a href="index-stock.php">stock account</a> ? </p>
	</div>
    </body>
</html>
