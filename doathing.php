<html>
<head>
  <title>Hearthstone Thing</title>
  <link href="funk.css" rel="stylesheet">
</head>
  <body>
    <div id='header'><h1>Deck Builder</h1></div>
<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	
	$class_choice = $_POST['find'];
	$style_choice = $_POST['style'];
	$deckname = $_POST['deckname'];
	$minions = $_POST['minions'];
	$weapons = $_POST['weapons'];
	$spells = $_POST['spells'];
	
	$class_type = "";
	$style_type = "";
	$decksize = $minions + $weapons + $spells;
	
		
				
	switch($class_choice) 
	{
		case "a":
			$class_type = "Druid";
			break;
		case "b":
			$class_type = "Hunter";
			break;
		case "c":
			$class_type = "Mage";
			break;
		case "d":
			$class_type = "Paladin";
			break;
		case "e":
			$class_type = "Priest";
			break;
		case "f":
			$class_type = "Rogue";
			break;
		case "g":
			$class_type = "Shaman";
			break;
		case "h":
			$class_type = "Warlock";
			break;
		case "i":
			$class_type = "Warrior";
			break;
		default:
			$class_type = "Class type not selected";
			break;			
	}
	
	switch($style_choice) 
	{
		case "a":
			$style_type = "rush";
			break;
		case "b":
			$style_type = "midrange";
			break;
		case "c":
			$style_type = "control";
			break;
		case "d":
			$style_type = "mill";
			break;
		case "e":
			$style_type = "fatigue";
			break;
		case "f":
			$style_type = "other";
			break;
		default:
			$style_type = "Class type not selected";
			break;			
	}
	
	
	if ($decksize === 30) 
	{ 
		$deck = array($deckname, $style_type, $class_type, $minions, $spells, $weapons);
		
		$result_string = "$deckname is a $style_type $class_type deck with $minions minions, $spells spells and $weapons weapons.";
		$result_record = "";
		
		foreach ($deck as $deckpart)
		{
			$result_record .= $deckpart."\t";
		}
		
		//$result_record = "$deckname\t$style_type\t$class_type\t$minions\t$spells\t$weapons";
		
		echo "<p>$result_string</p>";	
		echo '<a href="formpage.html">Back</a><br />';
		
		$fp = fopen("/decks/deck.txt", 'ab');	
		flock($fp, LOCK_EX);
		fwrite($fp, $result_record."\n");
		flock($fp, LOCK_UN);
		fclose($fp);
	}
	else 
	{
		echo "<p>You don't have 30 cards in your deck.</p>";	
		echo '<a href="formpage.html">Back</a><br />';
	}
?>
  	<img src="http://wow.zamimg.com/images/hearthstone/cards/enus/medium/GVG_110.png">
	<img src="http://wow.zamimg.com/images/hearthstone/cards/enus/medium/AT_132.png">
	<img src="http://wow.zamimg.com/images/hearthstone/cards/enus/medium/EX1_016.png">
	<img src="http://wow.zamimg.com/images/hearthstone/cards/enus/medium/EX1_572.png">
	<img src="http://wow.zamimg.com/images/hearthstone/cards/enus/medium/FP1_030.png">
  </body>
</html>