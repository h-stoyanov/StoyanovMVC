<?php

namespace App\Controllers;
use Core\Controller;
use App\Models\Post;
use Core\View;


class Posts extends Controller
{
    public function indexAction()
    {
        $posts = Post::getAll();
        View::renderTemplate('Posts/index.html.twig', [
           'posts' => $posts
        ]);
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