<?php

namespace App\Controllers;

use App\Models\Topic;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Interfaces\RouterInterface as Router;
use Slim\Views\Twig as View;
use Illuminate\Database\Capsule\Manager as Eloquent;
use \App\Models\User;

class UserController
{
    public function show(Response $response, View $view, \PDO $db)
    {
        $users = $db->query('SELECT * FROM user')->fetchAll(\PDO::FETCH_OBJ);

        return $view->render($response, 'user/show.twig', compact('users'));
    }

    public function profile(int $id, Response $response, View $view, \PDO $db, Router $router)
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


    public function test(Response $response, View $view, Eloquent $db, User $user, Topic $topic)
    {
//        $users = $user->get();
//        $users = User::get();
        $user = $user->find(1);

        // Create record
//        User::create([
//            'username' => 'mabel',
//            'first_name' => 'Mabel',
//            'last_name' => 'Garrett'
//        ]);

        // Update record
//        User::where('id', 4)->update([
//            'first_name' => 'Mabel Smith'
//        ]);

        // Delete record
//        User::where('id', 4)->delete();

        // Create record with relationship
//        $user->topics()->create([
//            'title' => 'Second topic'
//        ]);

        // Get topics from specified user
//        $alexTopics = $user->topics()->get();

        $topics = $topic->get();

        foreach ($topics as $topic) {
            echo $topic->user->fullName() . '<br>';
        }
    }
}