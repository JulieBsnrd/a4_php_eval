<?php

//--------- SESSION

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//------------------------------------
function internauteEstConnecte()
{
    if(!isset($_SESSION['membre'])) return false;
    else return true;
}
//------------------------------------
function internauteEstConnecteEtEstAdmin()
{
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1) return true;
    else return false;
}

function debug($var, $mode = 1)
{
    echo '<div style="background: orange; padding: 5px; float: right; clear: both; ">';
    $trace = debug_backtrace();
    $trace = array_shift($trace);
    echo 'Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].';
    if($mode === 1)
    {
        print '<pre>'; print_r($var); print '</pre>';
    }
    else
    {
        print '<pre>'; var_dump($var); print '</pre>';
    }
    echo '</div>';
}

?>