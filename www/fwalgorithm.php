<?

	$maxVal = 999999;

	function FloydWarshall($matrix) {
		$temp = $matrix;

		//on initialise les liens non directs par une valeur infinie
		for ($k=0; $k < count($temp); $k++) { 
			for ($i=0; $i < count($temp); $i++) { 
				if($k != $i && $temp[$k][$i] == 0)
					$temp[$k][$i] = 99999;
			}
		}

		for ($k=1; $k < count($temp); $k++) { 
			for ($i=1; $i < count($temp); $i++) { 
				for ($j=1; $j < count($temp); $j++) { 
					echo $temp[$i][$j]," " ,$temp[$i][$k], " ", $temp[$k][$j], '<br/>';
					if($temp[$i][$j] > $temp[$i][$k]+$temp[$k][$j]) 
						$temp[$i][$j] = $temp[$i][$k]+$temp[$k][$j];
				}
			}
		}
		return $temp;
	}

	function minDist($dist, $q, $size) {
		$min = 999999;
		$min_index = -1;

		for ($i=0; $i < $size; $i++) { 
			if ($q[$i] == 0 && $dist[$i] <= $min) {
				$min = $dist[$i];
				$min_index = $i;
			}
		}

		return $min_index;
	}

	function dijkstra($matrix, $src) {

		//$q = new Set();
		$q = array();
		$dist = array();
		//$echo $maxVal;
		
		for ($i=0; $i < count($matrix); $i++) { 
			array_push($dist, 999999);
			array_push($q,0);

		}

		$dist[$src] = 0;

		for ($i=0; $i < count($matrix) - 1; $i++) { 
			$u = minDist($dist, $q, count($matrix));
			$q[$u] = 1;

			for ($j=0; $j < count($matrix); $j++) { 
				 if($q[$j] == 0 && $matrix[$u][$j] != 0 && $dist[$u] != 999999 && $dist[$u] + $matrix[$u][$j] < $dist[$j]) {
				 	$dist[$j] = $dist[$u] + $matrix[$u][$j];
				 }
			}
		}
		for ($i=0; $i < count($dist); $i++) { 
			echo "Noeud : ", $i, ", Distance : ", $dist[$i], "<br/>";
		}
	}

?>