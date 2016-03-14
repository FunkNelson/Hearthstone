<html>
  <head>
    <title>Hearthstone Thing</title>
    <link href="funk.css" rel="stylesheet">
  </head>
  <body>
	<div id='header'><h1>Deck Viewer</h1></div>
	<br />
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
	<img src="http://wow.zamimg.com/images/hearthstone/cards/enus/medium/GVG_110.png">
	<img src="http://wow.zamimg.com/images/hearthstone/cards/enus/medium/AT_132.png">
	<img src="http://wow.zamimg.com/images/hearthstone/cards/enus/medium/EX1_016.png">
	<img src="http://wow.zamimg.com/images/hearthstone/cards/enus/medium/EX1_572.png">
	<img src="http://wow.zamimg.com/images/hearthstone/cards/enus/medium/FP1_030.png">
  </body>
</html>