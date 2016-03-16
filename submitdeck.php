<html>
  <head>
    <title>Hearthstone Thing</title>
    <link href="funk.css" rel="stylesheet">
  </head>
  <body>
	<?php
		require('header.php');
	?>
    <form action="doathing.php" method="post">
      <table border="0" class="center">
        <tr>
	      <td align="right">Deck Name</td>
	      <td align="left"><input type="text" name="deckname" size="16" maxlength="16" /></td>
        </tr>
		<tr>
	      <td align="right">Descriptor</td>
	      <td align="left"><input type="text" name="descriptor" size="16" maxlength="16" /></td>
        </tr>
		<tr>
		  <td></td>
		  <td size="6">Ex: zoo, mech, murloc...</td>
		</tr>
        <tr>
	      <td align="right">Style</td>
	      <td><select name="style">
		    <option value = "nothing">Choose</option>
		    <option value = "a">rush</option>
		    <option value = "b">midrange</option>
		    <option value = "c">control</option>
		    <option value = "d">mill</option>
		    <option value = "e">combo</option>
		    <option value = "f">other</option>
			</select>
		  </td>
        </tr>
        <tr>
	      <td align="right">Select your class</td>
	      <td><select name="find">
		    <option value = "nothing">Choose</option>
		    <option value = "a">Druid</option>
		    <option value = "b">Hunter</option>
		    <option value = "c">Mage</option>
		    <option value = "d">Paladin</option>
		    <option value = "e">Priest</option>
		    <option value = "f">Rogue</option>
		    <option value = "g">Shaman</option>
		    <option value = "h">Warlock</option>
		    <option value = "i">Warrior</option>
			</select>
		  </td>
        </tr>	
		<tr>
		  <td align="right">Minion count</td>
		  <td><input type="number" name="minions" min="0" max="30" /></td>
		</tr>
		<tr>
		  <td align="right">Spell count</td>
		  <td><input type="number" name="spells" min="0" max="30" /></td>
		</tr>
		<tr>
		  <td align="right">Weapon count</td>
		  <td><input type="number" name="weapons" min="0" max="30" /></td>
		</tr>
        <tr>
	      <td colspan="2" align="center"><input type="submit" value="Touch this." /></td>
        </tr>
      </table>
    </form>
	<?php
		require('footer.php');
	?>
  </body>
</html>	