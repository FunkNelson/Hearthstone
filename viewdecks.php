<html>
  <head>
    <title>Hearthstone Thing</title>
    <link href="funk.css" rel="stylesheet">
  </head>
  <body>
	<?php
		require('header.php');
	?>
	<?php

$fp = fopen("/decks/deck.txt", 'rb');	
flock($fp, LOCK_SH);

if (!$fp) 
{
	echo "<p>No decks available</p>";
	exit;
}

while (!feof($fp)) 
{
	$deck = fgets($fp, 999);
	echo $deck."<br />";
}

flock($fp, LOCK_UN);
fclose($fp);

	
	
	?>
	<?php
		require('footer.php');
	?>
  </body>
</html>