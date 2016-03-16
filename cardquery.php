<?php
$searchtype = $_POST['searchtype'];
$hero = $_POST['hero'];
$race = $_POST['race'];
$mechanic = $_POST['mechanic'];
$type = $_POST['type'];
$mana = $_POST['mana'];
$attack = $_POST['attack'];
$health = $_POST['health'];

$mana_operand = $_POST['mana_operand'];
$attack_operand = $_POST['attack_operand'];
$health_operand = $_POST['health_operand'];



//DB LOGIN
require('db_connection_config.php');

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


$query = construct_query($hero, $searchterm, $mana, $mana_operand, $attack, $attack_operand, $health, $health_operand, $race, $mechanic, $type);

//debug query
//echo $query;

$result = $db->query($query);
construct_results_table($result);

echo "<br />";
$result->free();
$db->close();



function construct_query($hero, $searchterm, $mana, $mana_operand, $attack, $attack_operand, $health, $health_operand, $race, $mechanic, $type) {

	$query = "select name, hero, type, quality, race, expansion, mana, attack, health from cards where collectable = 1 and type in ('minion', 'spell', 'weapon')";	
	
	if (strlen($searchterm) > 0)
	{
		$query .= " and name like '%$searchterm%'";
	}
	
	if ($hero != "all")
	{
		$query .= " and hero = '$hero'";
	}
	
	if ($race != "all")
	{
		$query .= " and race = '$race'";
	}

	if ($mechanic != "all")
	{
		$query .= " and $mechanic = 1";
	}

	if ($cardtype != "all")
	{
		$query .= " and type = '$type'";
	}
	
	if (!empty ($mana))
	{
		$query .= " and mana $mana_operand $mana";
	}
	
	if (!empty ($attack))
	{
		$query .= " and attack $attack_operand $attack";
	}

	if (!empty ($health))
	{
		$query .= " and health $health_operand $health";
	}
	
	
	return $query;
}


function construct_results_table($result)  {

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
		
		//alternates color in table for readability
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
		echo "<td><font color=\"#0000FF\">".$row['mana']."</font></td>";
		echo "<td><font color=\"#6A6A6A\">".$row['attack']."</font></td>";
		echo "<td><font color=\"#FF0000\">".$row['health']."</font></td>";
		echo "</tr>";
	}	
	
	echo "</table>";
}

function determine_quality($quality) {
	switch($quality)
	{
		case "rare":
			$color = "#0000FF";
			break;
		case "epic":
			$color = "#FF00FF";
			break;
		case "legendary":
			$color = "#CA8906";
			break;
		default:
			$color = "#000000";
			break;
	}
	
	return $color;
}

?>