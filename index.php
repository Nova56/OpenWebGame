<?php

require "includes/autoloader.php";
autoloader::register();

$db = App::getDatabase();
$auth = App::getAuth();
    /**
    * Routing
    **/
    if (!isset($_GET['p'])) {

     $_GET['p'] = 'accueil';

    }
    
    if (!preg_match('/^([a-z0-9A-Z]+\.?)+$/', $_GET['p'])) {
     $page = 'Erreur/404';
    } else {
     $page = implode('/', explode('.', $_GET['p']));
    }

    /**
    * Génération de la vue
    **/
    if (file_exists('page/' . $page . '.php')) {
     ob_start();
     
      require 'page/' . $page . '.php';
     
     
     $content = ob_get_clean();
    } else {
     ob_start();
     require 'page/Erreur/404.php';
     $content = ob_get_clean();
    }
    

    require 'page/Templates/structure.php';
    
    /* 
     * DANTER14 & NOVATECK (VALENTIN LAMOTHE)
     */
    
?>
