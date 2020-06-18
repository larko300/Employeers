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
        if ($_POST['q']) {
            try {
                $employers = Employer::search($_POST);
                View::render('EmployersList', [
                    'employers' => $employers,
                    'user' => UsersAuthService::getUserByToken()
                ]);
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

    public function edit()
    {
        $id = (int) filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $employer = Employer::getById($id);
        View::render('EmployerEdit', [
            'employer' => $employer,
            'user' => UsersAuthService::getUserByToken(),
        ]);
    }

    public function update()
    {
        try {
            $id = (int) filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
            Employer::edit($_POST, $id);
            $_SESSION['flesh'] = 'Success';
            header('Location: /employers');
            exit();
        } catch (InvalidArgumentException $e) {
            View::render('EmployerEdit', [
                'employer' => Employer::getById($id),
                'user' => UsersAuthService::getUserByToken(),
                'error' => $e->getMessage()
            ]);
            exit();
        }
    }

    public function destroy()
    {
        $id = (int) filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $employer = Employer::getById($id);
        $employer->delete();
        $_SESSION['flesh'] = 'Success';
        header('Location: /employers');
    }
}
