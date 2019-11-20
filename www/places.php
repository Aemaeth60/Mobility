<?

    include("db_connect.php");
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch($request_method)
    {
      case 'GET':
        getPlaces();
      	break;
      default:
      	// Requête invalide
      	header("HTTP/1.0 405 Method Not Allowed");
      	break;
    }

    function distance($lat1, $long1, $lat2, $long2) {
      if ($lat1 == $lat2 && $long2 == $long1) {
        return 0;
      }
	    $latitude1 = $lat1 * M_PI / 180;
   	  $latitude2 = $lat2 * M_PI / 180;
	    $longitude1 = $long1 * M_PI / 180;
      $longitude2 = $long2 * M_PI / 180;
      $R = 6371;//d?

	    $d = $R * acos(cos($latitude1) * cos($latitude2) * cos($longitude2 - $longitude1) + sin($latitude1) * sin($latitude2));

      return $d;
    }

     function getPlaces()
     {
        global $conn;
	//printf("Information sur le serveur : %s\n", mysqli_connect_error());
        $query = "SELECT * FROM interests";
        $response = array();
        $result = mysqli_query($conn, $query);
	if(!$conn)
	    echo "Connexion non établie\n";
	else
	    echo "Connexion Ok\n";
        if(mysqli_num_rows($result) > 0 ){
            echo "Requête ok!\n";
	}
	else
	    echo "Problème requête\n";
	$ODmatrix = array();
  $result_size =  mysqli_num_rows($result);
  while($row = mysqli_fetch_array($result))
        {
          $response[] = $row;
          //array_push($ODmatrix, array({"lat" : $row['lat'], "long": $row['long']}))
          //echo $row['lat'];
	  /*echo $row['lat'];
	  echo "\n";
	  echo $row['long'];
	  echo "\n";
        }
  echo $response[0];
	/*for(var i=0; i < $response.length; i++)
		echo $response[0]['lat'];*/
  }
    foreach ($response as $key => $value) {
      $line = array();
      foreach ($response as $key2 => $value2) {
        //echo distance(doubleval($value['lat']), doubleval($value['long']), doubleval($value2['lat']), doubleval($value2['long']);
        array_push($line, distance(doubleval($value['lat']), doubleval($value['long']), doubleval($value2['lat']), doubleval($value2['long'])));
      }
      array_push($ODmatrix, $line);
    }


    header('Content-Type: application/json');
    $json = json_encode($ODmatrix, JSON_PRETTY_PRINT);
	//echo mysqli_num_rows($result);
  //$json = json_encode($response, JSON_PRETTY_PRINT);

	echo $json;
	mysqli_close($conn);
  }
?>
