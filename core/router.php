<?php
class Routeur {
	public static function analise($requete)
	{
      //initialisation à vide du resultat de la requete
		$resultat = array(
			"controlleur" => "Erreur",
			"action" => "error404",
			"params" => array()
			);

		if($requete === "" || $requete === "/" )
		{
			$resultat["controlleur"] = "Index";
			$resultat["action"] = "afficher";
		}
		else
		{
			$parts = explode("/", $requete);

			switch($parts[0])
			{
				case "admin":
					if(isset($parts[1]))
					{
						switch($parts[1])
						{
							case "fiche":
								if(isset($parts[2])&&ctype_digit($parts[2]))
								{
									$resultat["controlleur"] = "personnage";
									$resultat["action"] = "afficher";
									$resultat["params"]["cible"] = $parts[2];
								}
								break;
						}
					}
					else{
						require 'views/adminHub.php';
					}
					break;
				
				default: 
			}
		}
		return $resultat;
	}
}
?>