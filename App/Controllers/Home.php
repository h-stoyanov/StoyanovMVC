<?php

namespace App\Controllers;


use Core\Controller;
use Core\View;

class Home extends Controller
{
    public function indexAction()
    {
//        View::render('Home/index.php', [
//            'name' => 'Hristo',
//            'colors' => ['red', 'green', 'blue']
//        ]);
        View::renderTemplate('Home/index.html.twig', [
            'name' => '<script>alert("test");</script>',
            'colors' => ['red', 'green', 'blue']
        ]);
    }
}