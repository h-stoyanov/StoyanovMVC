<?php


namespace Core;


class View
{

    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $view;
        if (is_readable($file)) {
            require $file;
        } else {
            echo "$file not found";
        }
    }

    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig == null) {
            $loader = new \Twig_Loader_Filesystem(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'twig',
            ));
        }

        echo $twig->render($template, $args);
    }
}