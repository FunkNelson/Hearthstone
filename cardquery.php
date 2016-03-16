<?php
$searchtype = $_POST['searchtype'];
$searchterm = $_POST['searchterm'];
$hero_choice = $_POST['hero'];
$hero = "";

$class_query = true;

//DB LOGIN
require('db_connection_config.php');


if (!$searchterm)
{
	echo "You didn't search for anything.  Try more.";
	exit;
}

if (!get_magic_quotes_gpc())
{
	$searchtype = addslashes($searchtype);
	$searchterm = addslashes($searchterm);
}

@ $db = new mysqli($server, $db_username, $db_password, $database);

if (mysqli_connect_errno())
{
	echo "Error: Could not connect to database.";
	exit;
}

switch($hero_choice)
{
	case "a":
		$class_type = "druid";
		break;
	case "b":
		$class_type = "hunter";
		break;
	case "c":
		$class_type = "mage";
		break;
	case "d":
		$class_type = "paladin";
		break;
	case "e":
		$class_type = "priest";
		break;
	case "f":
		$class_type = "rogue";
		break;
	case "g":
		$class_type = "shaman";
		break;
	case "h":
		$class_type = "warlock";
		break;
	case "i":
		$class_type = "warrior";
		break;
	case "x":
		$class_type = "neutral";
		break;
	case "all":
		$class_query = false;
		break;
	default:
		$class_query = false;
		break;
}


//Create SQL query
if (strlen($searchterm) > 0)
{
	$query = "select name, hero, type, quality, race, expansion, mana, attack, health from cards where name like '%$searchterm%'";
	
	if ($class_query)
	{
		$query .= " and hero = '$class_type'";
	}
}
else
{
	$query = "select name, type, quality, race, expansion, mana, attack, health from cards where hero = '$class_type'";
}

$query .= "and collectable = 1 and type in ('minion', 'spell', 'weapon')";

$result = $db->query($query);


construct_results_table($result);

//$num_results = $result->num_rows;

//echo "<p>$num_results cards found  |  <a href=\"cardlookup.php\">Look up more cards</a></p>";

// SHOWS CARD IMAGES, BUT IS VERY SLOW TO LOAD
/*
for ($i = 0; $i < $num_results; $i++)
{
	$row = $result->fetch_assoc();	
	echo '<img src="'.htmlspecialchars(stripslashes($row['image_url'])).'">';
	
	if ($i % 6 === 5 && $i > 0)
	{
		echo "<br />";
	}	
}
*/

echo "<br />";
$result->free();
$db->close();


function construct_results_table($result)
{
	$num_results = $result->num_rows;
	echo "<p>$num_results cards found  |  <a href=\"cardlookup.php\">Look up more cards</a></p>";
	
	echo '<table border="0" class="decktable">';
	echo "<tr bgcolor=\"#000000\">";
	echo '<th style="width:300px"><font color=\"#FFFFFF\">Name</font></th>';
	echo "<th style=\"width:100px\"><font color=\"#FFFFFF\">Hero</font></th>";
	echo "<th style=\"width:100px\"><font color=\"#FFFFFF\">Type</font></th>";
	echo "<th style=\"width:100px\"><font color=\"#FFFFFF\">Race</font></th>";
	echo "<th style=\"width:100px\"><font color=\"#FFFFFF\">Expansion</font></th>";
	echo "<th style=\"width:80px\"><font color=\"#FFFFFF\">Mana</font></th>";
	echo "<th style=\"width:80px\"><font color=\"#FFFFFF\">Attack</font></th>";
	echo "<th style=\"width:80px\"><font color=\"#FFFFFF\">Health</font></th>";
	echo "</font></tr>";

	for ($i = 0; $i < $num_results; $i++)
	{
		$row = $result->fetch_assoc();
		$color = determine_quality($row['quality']);
		
		if ($i % 2 === 1) 
		{
			echo "<tr bgcolor=\"#E2E1DF\">";
		}
		else 
		{
			echo "<tr>";
		}
		
		echo "<td><font color=\"$color\"><b>".$row['name']."</b></font></td>";
		echo "<td>".$row['hero']."</td>";
		echo "<td>".$row['type']."</td>";
		echo "<td>".$row['race']."</td>";
		echo "<td>".$row['expansion']."</td>";
		echo "<td>".$row['mana']."</td>";
		echo "<td>".$row['attack']."</td>";
		echo "<td>".$row['health']."</td>";
		echo "</tr>";
	}	
	
	echo "</table>";
}

function determine_quality($quality)
{
	switch($quality)
	{
		case "rare":
			$color = "#0000FF";
			break;
		case "epic":
			$color = "#FF00FF";
			break;
		case "legendary":
			$color = "#F0AF26";
			break;
		default:
			$color = "#000000";
			break;
	}
	
	return $color;
}

?>