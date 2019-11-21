<?
    //include("places.php");
    //getPlaces();
	include("pathfinder.php");
	include("fwalgorithm.php");
	include("utils.php");
	$return = array();
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
	Ci-dessous un exemple pour les chemins depuis le noeud 0.
</p>

<?  dijkstra($distances_cp, 0, $array); ?>

<p>
	Prenons maintenant 3 noeuds au hasard pour vérifier que l'on trouve bien le noeud optimal (à une distance minimale de chacun).
	Supposons que l'on prend les noeuds 10, 2 et 3.
	On va faire des appels successifs à la fonction <i>dijkstra()</i> afin de récupérer les distances et les chemins depuis chacun des ces noeuds. On obtient les résultats suivants.
</p>

<?

	$ret1 = dijkstra($distances_cp, 10-1, $ret1);
	$ret2 = dijkstra($distances_cp, 2-1, $ret2);
	$ret3 = dijkstra($distances_cp, 3-1, $ret3);
	$allret = array($ret1, $ret2, $ret3);
?>

<p>
	Les chemins et les distances de chaque point de départ vont être comparés afin par la fonction <i>bestNode()</i> dans le fichier <i>pathfinder.php</i>.
	Pour tous les utilisateurs, on va sommer les distances vers un point d'intérêt donné et on choisira celui pour lequel la somme est la plus petite.
</p>

<?
	echo "<p>La fonction nous renvoie le noeud ",bestNode($allret)+1,".";
?>

<p>
	Il suffit de récupérer les chemins évoqués précédemment calculés pour indiquer à chaque utilisateur quelle route il devra suivre pour attendre le noeud en question.
</p>

<p><b>Note:</b> Le reste des fichiers sont simplements des reliquats de tests précedents ou bien des implémentations futures. Il est indiqué dans ce document les fichiers à analyser plus en détails.</p>