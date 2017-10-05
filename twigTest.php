<?php
require_once './lib/lib_db.php';
require_once './vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('TWIG');
$twig = new Twig_Environment($loader);

//Rendu de la vue
echo $twig->load("liste_films.html.twig")->render(["films"=>lister()]);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

