<?php
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
	
	echo "<p>$result_string</p>";	
	echo '<a href="submitdeck.php">Back</a><br />';
	
	$fp = fopen("/decks/deck.txt", 'ab');	
	flock($fp, LOCK_EX);
	fwrite($fp, $result_record."\n");
	flock($fp, LOCK_UN);
	fclose($fp);
	
	submitDeck($deck);
}
else 
{
	echo "<p>You don't have 30 cards in your deck.</p>";	
	echo '<a href="submitdeck.php">Back</a><br />';
}


function submitDeck($deck)
{
	//DB LOGIN
	require('db_connection_config.php');
	@ $db = new mysqli($server, $db_username, $db_password, $database);	
	
	
	if (!get_magic_quotes_gpc()) 
	{
		$deck[0] = addslashes($deck[0]);
		$deck[1] = addslashes($deck[1]);
		$deck[2] = addslashes($deck[2]);	
	}
	
	$query = "insert into decks (name, style, class, minions, spells, weapons) values ";
	$query .= "('$deck[0]', '$deck[1]', '$deck[2]', '$deck[3]', '$deck[4]', '$deck[5]')";
	
	$result = $db->query($query);
	
	if ($result)
	{
		echo "$deck[0] successfully uploaded.<br />";
	}
	else
	{
		echo "Error: $deck[0] not uploaded.<br />";
	}
	
	$result->free();
	$db->close();
}

?>