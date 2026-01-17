<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;

final class ProfileController extends Controller
{
    public function show(): void
    {
        $this->render('profile/index', params: [
            'title' => 'Connexion'
        ]);
    }

    public function register(): void
    {
        $this->render('profile/register', params: [
            'title' => 'Inscription'
        ]);
    }
}
