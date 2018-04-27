<?php
//session_start();

require '../models/functions.fn.php';
require '../models/Membre.php';

//core logic
if(!empty($_POST)){
    $error = Membre::validatorSignIn();

    if(!$error){
        $connect = Membre::signIn();
        //var_dump($connect);
        //print_r($connect);

        if($connect){
            $quote = ["class" => 'green', "content" => 'Vous êtes bien connecté.'];
            header('Location: BoutiqueCtrl.php');

        }
        else{
            $error = 'Le couple email / mot de passe est incorrect';
        }
    }
}
elseif(isset($_GET['action']) && $_GET['action'] == "logOut")
{
    session_destroy();
    header('Location: SignInCtrl.php');
}

include '../views/signIn.php';

?>
