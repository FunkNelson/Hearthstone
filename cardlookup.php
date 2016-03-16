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
		  <td align="right">Name </td>
		  <td align="center">contains</td>
		  <td align="left"><input type="searchterm" name="searchterm" size="20" maxlength="20" /></td>
		</tr>
		<tr>
		  <td align="right">Class </td>
		  <td align="center">is</td>
		  <td><select name="hero">
		    <option value = "all">All</option>
			<option value = "neutral">Neutral</option>
			<option value = "druid">Druid</option>
		    <option value = "hunter">Hunter</option>
		    <option value = "mage">Mage</option>
		    <option value = "paladin">Paladin</option>
		    <option value = "priest">Priest</option>
		    <option value = "rogue">Rogue</option>
		    <option value = "shaman">Shaman</option>
		    <option value = "warlock">Warlock</option>
		    <option value = "warrior">Warrior</option>
   		    <select>
		  </td>
		</tr>
		<tr>
		  <td align="right">Race </td>
		  <td align="center">is</td>
		  <td><select name="race">
		    <option value = "all">All</option>
			<option value = "beast">Beast</option>
			<option value = "demon">Demon</option>
		    <option value = "dragon">Dragon</option>
		    <option value = "mech">Mech</option>
		    <option value = "murloc">Murloc</option>
		    <option value = "pirate">Pirate</option>
		    <option value = "totem">Totem</option>
   		    <select>
		  </td>
		</tr>
		<tr>
		  <td align="right">Mechanic </td>
		  <td align="center">is</td>
		  <td><select name="mechanic">
		    <option value = "all">All</option>
			<option value = "battlecry">Battlecry</option>
			<option value = "charge">Charge</option>
		    <option value = "choose">Choose</option>
		    <option value = "combo">Combo</option>
		    <option value = "deathrattle">Deathrattle</option>
		    <option value = "discover">Discover</option>
		    <option value = "divineshield">Divine Shield</option>
			<option value = "enrage">Enrage</option>
			<option value = "freeze">Freeze</option>
		    <option value = "immune">Immune</option>
		    <option value = "inspire">Inspire</option>
		    <option value = "joust">Joust</option>
		    <option value = "overload">Overload</option>
		    <option value = "secret">Secret</option>
			<option value = "silence">Silence</option>
		    <option value = "spelldamage">Spell Damage</option>
		    <option value = "stealth">Stealth</option>
		    <option value = "summon">Summon</option>
		    <option value = "taunt">Taunt</option>
		    <option value = "transform">Transform</option>				
			<option value = "windfury">Windfury</option>
   		    <select>
		  </td>
		</tr>
		<tr>
		  <td align="right">Mana </td>
		  <td align="center"><select name="mana_operand">
			<option value = "=">=</option>
		    <option value = "<">&lt;</option>
			<option value = ">">&gt;</option>
			<option value = "<=">&lt;=</option>
			<option value = ">=">&gt;=</option>
			<option value = "!=">!=</option>
   		    <select>
		  </td>
		  <td align="left"><input type="number" name="mana" min="0" max="50" /></td>
		</tr>  
		<tr>
		  <td align="right">Attack </td>
		  <td align="center"><select name="attack_operand">
			<option value = "=">=</option>
		    <option value = "<">&lt;</option>
			<option value = ">">&gt;</option>
			<option value = "<=">&lt;=</option>
			<option value = ">=">&gt;=</option>
			<option value = "!=">!=</option>
   		    <select>
		  </td>
		  <td><input type="number" name="attack" min="0" max="50" /></td>
		</tr>  
		<tr>
		  <td align="right">Health </td>
		  <td align="center"><select name="health_operand">
			<option value = "=">=</option>
		    <option value = "<">&lt;</option>
			<option value = ">">&gt;</option>
			<option value = "<=">&lt;=</option>
			<option value = ">=">&gt;=</option>
			<option value = "!=">!=</option>
   		    <select>
		  </td>
		  <td><input type="number" name="health" min="0" max="50" /></td>
		</tr>
        <tr>
	      <td colspan="3" align="center"><input type="submit" value="Find all the cards" /></td>
        </tr>		
	  </table>
	</form>
  </body>
</html>	

