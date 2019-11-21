<?

	function display($tab, $infos) {

		echo '<table style="border: solid 1px;">';
			echo '<thead style="border: solid 1px;"><tr style="border: solid 1px;">';
			for ($i=0; $i < count($infos); $i++) { 
				echo "<th>",$infos[$i]['name'],"</th>";
			}
			echo "</thead></tr>";
			foreach ($tab as $key => $value) {
				echo '<tr style="border: solid 1px;">';
				foreach ($value as $key2 => $value2) {
				echo '<td style="border: solid 1px;">', $value2, '</td>';
			}
			echo '</tr>';
		}
		echo "</table>";
		echo "<br/><br/>";
	}


?>