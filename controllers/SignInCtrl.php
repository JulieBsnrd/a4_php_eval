<?php
//session_start();

require '../config/config.php';
require '../models/functions.fn.php';
require '../models/MembresModel.php';

//core logic
if(!empty($_POST)){
    $error = validatorSignIn();

    if(!$error){
        $connect = signIn($db);
        //var_dump($connect);
        //print_r($connect);

        if($connect){
            $quote = ["class" => 'green', "content" => 'Vous êtes bien connecté.'];

        }
        else{
            $error = 'Le couple email / mot de passe est incorrect';
        }
    }
}
elseif(isset($_GET['action']) && $_GET['action'] == "logOut")
{
    session_destroy();
}

include '../views/signIn.php';

?>
