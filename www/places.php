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

   /* function distance(var lat1, var long1, var lat2, var long2) {
	var latitude1 = lat1 * Math.PI / 180;
   	var latitude2 = lat2 * Math.PI / 180;
	var longitude1 = long1 * Math.PI / 180;
        var longitude2 = long2 * Math.PI / 180;
        var R = 6371;//d?

	var d = R * Math.Acos(Math.Cos(latitude1) * Math.Cos(latitude2) * Math.Cos(longitude2 - longitude1) + Math.Sin(latitude1) * *Math.Sin(latitude2));

        return d;
    }*/

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
	//var ODmatrix = new Array(mysqli_num_rows($result));
        while($row = mysqli_fetch_array($result))
        {
          $response[] = $row;
	  /*echo $row['lat'];
	  echo "\n";
	  echo $row['long'];
	  echo "\n";*/
        }
echo $response.keys();
	/*for(var i=0; i < $response.length; i++)
		echo $response[0]['lat'];*/
        header('Content-Type: application/json');
	//echo mysqli_num_rows($result);
        $json = json_encode($response, JSON_PRETTY_PRINT);
	//echo $response[1]['name'];
	mysqli_close($conn);
      }
?>
