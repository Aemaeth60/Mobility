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

	function bestNode($allSol) {

		$allDist = array();
		for ($i=0; $i < count($allSol[0][0]); $i++) { 
			array_push($allDist, 0);
		}

		for ($i=0; $i < count($allSol); $i++) { 
			for ($j=0; $j < count($allSol[$i][0]); $j++) { 
				$allDist[$j] += $allSol[$i][0][$j];
			}
		}

		$min = 999999;
		$min_idx = 0;
		for ($i=0; $i < count($allDist); $i++) { 
			if($allDist[$i] < $min) {
				$min = $allDist[$i];
				$min_idx = $i;
			}
		}

		return $min_idx;
	}



?>