<?
	include("databases.php");

	$distances_cp = $distances;

	for ($i=0; $i < count($distances_cp); $i++) { 
		for ($j=0; $j < count($distances_cp[$i]); $j++) {
			if($distances_cp[$i][$j] != 0) {
				for ($k=0; $k < count($distances_cp[$j]); $k++) { 
					if($distances_cp[$j][$k] != 0 && $distances_cp[$i][$k] != 0)
						$distances_cp[$j][$k] = 0;

				}
			}
		}
	}



?>