<?php

RequirePage::model('User');

class ControllerLogin extends Controller
{
    public function index()
    {
        Twig::render('login.php');
    }


    public function auth()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            RequirePage::redirect('login');
            exit();
        }

        extract($_POST);

        RequirePage::library('Validation');
        $val = new Validation();

        $val->name('username')->value($username)->pattern('email')->required()->max(50);
        $val->name('password')->value($password)->pattern('alphanum')->min(6)->max(20);
        if ($val->isSuccess()) {

            $user = new User;
            if ($user->checkUser($username, $password)) {
                RequirePage::redirect('login');
            } else {
                RequirePage::redirect('home/error');
            }
        } else {
            $errors = $val->displayErrors();
            Twig::render('login.php', ['errors' => $errors, 'data' => $_POST]);
        }
    }


    public function logout()
    {
        session_destroy();
        RequirePage::redirect('login');
    }
}
