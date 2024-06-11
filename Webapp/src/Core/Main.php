<?php

namespace App\Core;

use App\Controllers\MainController;

class Main
{
    public function start()
    {
        session_start();

        $uri = $_SERVER['REQUEST_URI'];
        /*----------lien en get------------------------*/
        $str = parse_url($uri, PHP_URL_QUERY);
        parse_str($str, $output);
        foreach ($output as $key => $value) {
            $_GET["$key"] = $value;
        }
        /*---------------------------------------*/
        // On vérifie si elle n'est pas vide et si elle se termine par un / (trailing slash)
        if (!empty($uri) && $uri != '/' && $uri[-1] === '/') {
            // Dans ce cas on enlève le  /
            $uri = substr($uri, 0, -1);

            // On envoie une redirection permanente
            http_response_code(301);

            // On redirige vers l'URL dans /
            header('Location: ' . $uri);
            exit;
        }
        //recuperer les liens
        $params = isset($_GET['p']) ? explode('/', $_GET['p']) : [];

        if (!empty($params) && $params[0] != "") {
            //on recupere le nom du controller a instancier
            $route = array_shift($params);
            $route = str_replace(' ', '', ucwords(str_replace('-', ' ', $route)));
            $controller = '\\App\\Controllers\\' . ucfirst($route) . 'Controller';


            //cas exceptionnel ou on a pas besoin de créer un controller
            if ($route == "Register" || $route == "Logout") {
                $controller = new MainController;
                $controller->$route();
            } elseif (class_exists($controller)) {
                if ($controller!="\App\Controllers\ApiController" &&  $controller!="\App\Controllers\NewsletterController"&& !isset($_SESSION["user"])){
                    header("Location:/");
                }

                $controller = new $controller;

                $action = isset($params[0]) ? array_shift($params) : 'index';
                if (method_exists($controller, $action)) {
                    if (isset($params[0]))
                        call_user_func_array([$controller, $action], $params);
                    else
                        $controller->$action();
                } else {
                    $controller = new MainController;
                    $controller->notFoundPage();
                }
            } else {
                $controller = new MainController;
                $controller->notFoundPage();
            }
        } else {
            //on instancie le controller par defaut
            $controller = new MainController;
            $controller->index();
        }
    }
}