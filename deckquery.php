<?php

//DB LOGIN
require('db_connection_config.php');

@ $db = new mysqli($server, $db_username, $db_password, $database);

if (mysqli_connect_errno())
{
	echo "Error: Could not connect to database.";
	exit;
}

$query = "select * from decks";
$result = $db->query($query);
$num_results = $result->num_rows;
echo "<p>$num_results decks found</p>";

construct_deck_table($result);


function construct_deck_table($result)
{
	$num_results = $result->num_rows;
	
	//echo '<div id="decktable">';
	echo '<table border="1" class="decktable">';
	echo "<tr>";
	echo "<td>Name</td>";
	echo "<td>Style</td>";
	echo "<td>Class</td>";
	echo "<td>Minions</td>";
	echo "<td>Spells</td>";
	echo "<td>Weapons</td>";
	echo "</tr>";
	
	for ($i = 0; $i < $num_results; $i++)
	{
		$row = $result->fetch_assoc();
		
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['style']."</td>";
		echo "<td>".$row['class']."</td>";
		echo "<td>".$row['minions']."</td>";
		echo "<td>".$row['spells']."</td>";
		echo "<td>".$row['weapons']."</td>";
		echo "</tr>";
	}
	
	echo "</table>";
	//echo "</div>";
}

?>