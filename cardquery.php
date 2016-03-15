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
	$query = "select image_url from cards where name like '%$searchterm%'";
	
	if ($class_query)
	{
		$query .= " and hero = '$class_type'";
	}
}
else
{
	$query = "select image_url from cards where hero = '$class_type'";
}

$query .= "and collectable = 1";

$result = $db->query($query);
$num_results = $result->num_rows;

echo "<p>$num_results cards found  |  <a href=\"cardlookup.php\">Look up more cards</a></p>";

for ($i = 0; $i < $num_results; $i++)
{
	$row = $result->fetch_assoc();	
	echo '<img src="'.htmlspecialchars(stripslashes($row['image_url'])).'">';
	
	if ($i % 6 === 5 && $i > 0)
	{
		echo "<br />";
	}	
}

echo "<br />";
$result->free();
$db->close();
?>