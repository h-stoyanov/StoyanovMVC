<?php

namespace App\Controllers;


use App\Config;
use Core\Controller;
use Core\View;

/**
 * Class Home
 * @package App\Controllers
 */
class Home extends Controller
{
    /**
     *  Renders sample template
     */
    public function indexAction()
    {
        View::renderTemplate('Home/index.html.twig', [
            'name' => '<script>alert("test");</script>',
            'colors' => ['red', 'green', 'blue']
        ]);
    }

}