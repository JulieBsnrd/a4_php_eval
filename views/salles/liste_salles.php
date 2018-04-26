<?php

if (count($salles) > 1) {
	foreach ($salles as $salle) {
		echo "<a href='SalleCtrl.php?&id=1'>". $salle['titre'] ."</a>";
		echo "<br>";
	}
} else {
	echo "Il n'y a pas encore de salle";
}

?>