<?php

namespace App\Controllers;
use Core\Controller;


class Posts extends Controller
{
    public function indexAction()
    {
        echo 'Hello from the index action in the Posts controller';
        echo '<p>Query string parameters: <pre>' .
            htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
    }

    public function addNewAction()
    {
        echo 'Add new action in posts controller';
    }

    public function editAction()
    {
        echo 'Hello from edit action';
        echo '<p>Route parameters: <pre>' . htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}