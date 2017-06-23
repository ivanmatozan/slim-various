<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Interfaces\RouterInterface as Router;
use Slim\Views\Twig as View;

class UserController
{
    public function show(Request $request, Response $response, View $view, \PDO $db)
    {
        $users = $db->query('SELECT * FROM user')->fetchAll(\PDO::FETCH_OBJ);

        return $view->render($response, 'user/show.twig', compact('users'));
    }

    public function profile(int $id, Request $request, Response $response, View $view, \PDO $db, Router $router)
    {
        $sql = 'SELECT * FROM user WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);

        $user = $stmt->fetch(\PDO::FETCH_OBJ);

        if (!$user) {
            return $response->withRedirect($router->pathFor('user.show'));
        }

        return $view->render($response, 'user/profile.twig', compact('user'));
    }
}