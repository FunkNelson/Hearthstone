<html>
  <head>
    <title>Hearthstone Thing</title>
    <link href="funk.css" rel="stylesheet">
  </head>
    <body>
	<?php
		require('header.php');
	?>
	<h1>Card Lookup</h1>
	
	<form action="lookupresults.php" method="post">
	  <table border="0" class="center">
		<tr>
		  <td align="right">Name contains: </td>
		  <td align="left"><input type="searchterm" name="searchterm" size="20" maxlength="20" /></td>
		</tr>
		<tr>
		  <td align="right">Class type: </td>
		  <td><select name="hero">
		    <option value = "all">All</option>
			<option value = "x">Neutral</option>
			<option value = "a">Druid</option>
		    <option value = "b">Hunter</option>
		    <option value = "c">Mage</option>
		    <option value = "d">Paladin</option>
		    <option value = "e">Priest</option>
		    <option value = "f">Rogue</option>
		    <option value = "g">Shaman</option>
		    <option value = "h">Warlock</option>
		    <option value = "i">Warrior</option>
   		    <select>
		  </td>
		</tr>
        <tr>
	      <td colspan="2" align="center"><input type="submit" value="Look up" /></td>
        </tr>		
	  </table>
	</form>
  </body>
</html>	

