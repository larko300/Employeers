<?php

namespace App\Controller;

use App\Exceptions\InvalidArgumentException;
use App\Model\Employer;
use App\Services\UsersAuthService;
use App\View\View;

class EmployerController
{
    public function index()
    {
        View::render('EmployersList', [
            'employers' => Employer::findAll(),
            'user' => UsersAuthService::getUserByToken()
        ]);
    }

    public function create()
    {
        try {
            Employer::add($_POST);
            $_SESSION['flesh'] = 'Success';
            header('Location: /employers');
            exit();
        } catch (InvalidArgumentException $e) {
            View::render('EmployersList', [
                'employers' => Employer::findAll(),
                'user' => UsersAuthService::getUserByToken(),
                'error' => $e->getMessage()
            ]);
            exit();
        }
    }
}
