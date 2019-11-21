<?
    //include("places.php");
    //getPlaces();
	include("pathfinder.php");
	include("fwalgorithm.php");
	include("utils.php");
	// $json = json_encode($distances_cp, JSON_PRETTY_PRINT);
	// echo json_encode($distances, JSON_PRETTY_PRINT);
	// echo $json;
?>

<h1 style="text-align:center;">Rappot bref sur le mini-projet en Mobilité et Smart Cities</h1>

<p>
	Dans le fichier <i>databases.php</i>, on trouvera la matrice Origine-Destination qui représente les liens entre certaines noeuds (points d'intérêts)
	et leurs <q>poids</q>. Les distances sont des distances réelles mais les liaisons entre ces points ont été choisis arbitrairement afin de pouvoir tester les algorithmes.
	Ci-dessous on trouvera la reprensentation (simple) de la matrice.
</p>

<? 	display($distances, $places_infos); ?>

<p>
	Grâce au traitement fait par la fonction dans le fichier <i>pathfinder.php</i> on va pouvoir éliminer les arcs transitifs de la matrice précédente et ainsi obtenir le résultat suivant.
	On remarquera la suppression de plusieurs relations.
</p>


<? 	display($distances_cp, $places_infos); ?>

<p>
	Enfin dans les fonctions présentes dans le fichier <i>fwalgorithm.php</i> on appliquera un dijkstra afin de pouvoir calculer la distance d'un point donné à un autre. Par la suite on cherchera à minimiser la distance parcourue de tous les utilisateurs.
</p>

<?  dijkstra($distances_cp, 0); ?>