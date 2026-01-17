<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;

final class AuthController extends Controller
{
    public function login(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        header('Content-Type: application/json; charset=utf-8');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
            return;
        }

        $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

        if (empty($input['email']) || empty($input['password'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Email et mot de passe requis']);
            return;
        }

        $user = User::authenticate($input['email'], $input['password']);

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nom'];
            $_SESSION['user_email'] = $user['email'];

            echo json_encode([
                'success' => true,
                'message' => 'Connexion réussie'
            ]);
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'Email ou mot de passe incorrect']);
        }
    }

    public function register(): void
    {
        ob_start();
        header('Content-Type: application/json; charset=utf-8');

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            ob_end_clean();
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
            return;
        }

        $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

        if (empty($input['nom']) || empty($input['email']) || empty($input['password'])) {
            ob_end_clean();
            http_response_code(400);
            echo json_encode(['error' => 'Tous les champs sont requis']);
            return;
        }

        if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            ob_end_clean();
            http_response_code(400);
            echo json_encode(['error' => 'Email invalide']);
            return;
        }

        if (strlen($input['password']) < 6) {
            ob_end_clean();
            http_response_code(400);
            echo json_encode(['error' => 'Mot de passe minimum 6 caractères']);
            return;
        }

        if (User::findByEmail($input['email'])) {
            ob_end_clean();
            http_response_code(400);
            echo json_encode(['error' => 'Email déjà utilisé']);
            return;
        }

        $user = new User();
        $user->setNom($input['nom']);
        $user->setEmail($input['email']);
        $user->setPassword($input['password']);

        if ($user->saveWithPassword()) {
            $createdUser = User::findByEmail($input['email']);
            
            $_SESSION['user_id'] = $createdUser['id'];
            $_SESSION['user_name'] = $createdUser['nom'];
            $_SESSION['user_email'] = $createdUser['email'];

            ob_end_clean();
            http_response_code(201);
            echo json_encode([
                'success' => true,
                'message' => 'Inscription réussie'
            ]);
        } else {
            ob_end_clean();
            http_response_code(500);
            echo json_encode(['error' => 'Erreur lors de l\'inscription']);
        }
    }

    public function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        header('Content-Type: application/json; charset=utf-8');

        session_destroy();

        echo json_encode(['success' => true, 'message' => 'Déconnecté']);
    }
}
