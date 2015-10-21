<?php
session_start();
require "includes/autoloader.php";
autoloader::register();

$db = App::getDatabase();
$auth = App::getAuth();
    /**
    * Routing
    **/
    if (!isset($_GET['p'])) {

     $_GET['p'] = 'vueprincipale';

    }
    
    
    if (!preg_match('/^([a-z0-9A-Z]+\.?)+$/', $_GET['p'])) {
     $page = 'Erreur/404';
    } else {
     $page = implode('/', explode('.', $_GET['p']));
    }

    /**
    * Génération de la vue
    **/
    if (file_exists('page/jeu/' . $page . '.php')) {
     ob_start();
     
      require 'page/jeu/' . $page . '.php';
     
     
     $content = ob_get_clean();
    } 
    

    require 'page/Templates/structureJeu.php';

    
    /* 
     * DANTER14 & NOVATECK (VALENTIN LAMOTHE)
     */
    
?>
