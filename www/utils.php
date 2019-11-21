<?

	function display($tab) {

		echo '<table style="border: solid 1px;">';
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