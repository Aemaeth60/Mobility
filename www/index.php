<?
    //include("places.php");
    //getPlaces();
	include("pathfinder.php");
	include("fwalgorithm.php");
	// $json = json_encode($distances_cp, JSON_PRETTY_PRINT);
	// echo json_encode($distances, JSON_PRETTY_PRINT);
	// echo $json;
	foreach ($distances as $key => $value) {
		foreach ($value as $key2 => $value2) {
			echo "'''''", $value2, "'''''", PHP_EOL;
		}
		echo "<br/>";
	}
	echo "<br/>";
	echo "<br/>";
	foreach ($distances_cp as $key => $value) {
		foreach ($value as $key2 => $value2) {
			echo "'''''", $value2, "'''''", PHP_EOL;
		}
		echo "<br/>";
	}

	dijkstra($distances_cp, 0);
?>
