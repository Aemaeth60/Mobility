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
        while($row = mysqli_fetch_array($result))
        {
          $response[] = $row;
        }
        header('Content-Type: application/json');
	echo mysqli_num_rows($result);
        //echo json_encode($response, JSON_PRETTY_PRINT);
	mysqli_close($conn);
      }
?>
