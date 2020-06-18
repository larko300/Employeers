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
}
