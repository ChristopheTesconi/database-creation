<?php

namespace App\Controllers;

abstract class CoreController
{
/**
     * Méthode permettant d'afficher du code HTML en se basant sur les views
     *
     * @param string $viewName Nom du fichier de vue
     * @param array $viewVars Tableau des données à transmettre aux vues
     * @return void
     */
    protected function show(string $viewName, $viewVars = [])
    {
        // On globalise $router car on ne sait pas faire mieux pour l'instant
        global $router;

        // Comme $viewVars est déclarée comme paramètre de la méthode show()
        // les vues y ont accès
        // ici une valeur dont on a besoin sur TOUTES les vues
        // donc on la définit dans show()
        $viewVars['currentPage'] = $viewName;

        // définir l'url absolue pour nos assets
        $viewVars['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';
        // définir l'url absolue pour la racine du site
        // /!\ != racine projet, ici on parle du répertoire public/
        $viewVars['baseUri'] = $_SERVER['BASE_URI'];

        // On veut désormais accéder aux données de $viewVars, mais sans accéder au tableau
        // La fonction extract permet de créer une variable pour chaque élément du tableau passé en argument
        extract($viewVars);
        // => la variable $currentPage existe désormais, et sa valeur est $viewName
        // => la variable $assetsBaseUri existe désormais, et sa valeur est $_SERVER['BASE_URI'] . '/assets/'
        // => la variable $baseUri existe désormais, et sa valeur est $_SERVER['BASE_URI']
        // => il en va de même pour chaque élément du tableau

        // $viewVars est disponible dans chaque fichier de vue
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
    }

        /**
     * Méthode permettant de rediriger l'internaute vers la page d'une route fournie
     *
     * @param string $routeName Nom de la route
     * @param array $routeParams Paramètre pour générer cette route
     * @return void
     */
    protected function redirectToRoute(string $routeName, $routeParams = [])
    {
        // global, toujours moche, mais pour l'instant, on sait pas faire autrement
        global $router;

        // On génère l'URL
        $url = $router->generate($routeName, $routeParams);

        // On redirige vers cette URL
        header('Location: ' . $url);
        exit;
    }

    /**
     * Méthode permettant de générer un token aléatoire
     * 
     * @return string
     */ 
    protected function generateToken()
    {
        // Génération d'un token aléatoire
        $_SESSION['token'] = md5 (getmypid() . '-origamiCSRF*' . time() . 'toto' . mt_rand(1000, 10000000));

        return $_SESSION['token'];
    }

}