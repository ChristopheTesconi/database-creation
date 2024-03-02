<?php

// On doit déclarer toutes les "routes" à AltoRouter, afin qu'il puisse nous donner LA "route" correspondante à l'URL courante
// On appelle cela "mapper" les routes
// 1. méthode HTTP : GET ou POST (pour résumer)
// 2. La route : la portion d'URL après le basePath
// 3. Target/Cible : informations contenant
//      - le nom de la méthode à utiliser pour répondre à cette route
//      - le nom du controller contenant la méthode
// 4. Le nom de la route : pour identifier la route, on va suivre une convention
//      - "NomDuController-NomDeLaMéthode"
//      - ainsi pour la route /, méthode "home" du MainController => "main-home"

// On crée une variable pour ne pas répéter le namespace de tous les Controllers
$controllersNamespace = '\App\Controllers\\';

$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => $controllersNamespace . 'MainController'
    ],
    'main-home'
);

// ---- ORIGAMIS ----

$router->map(
    'GET',
    '/origamis/list',
    [
        'method' => 'list',
        'controller' => $controllersNamespace . 'OrigamiController'
    ],
    'origami-list'
);