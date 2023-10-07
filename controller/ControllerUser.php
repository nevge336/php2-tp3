<?php

RequirePage::model('User');
RequirePage::model('Privilege');
class ControllerUser extends Controller
{
    public function index()
    {
    }



    public function create()
    {
        $privilege = new Privilege;
        $select = $privilege->select();

        // print_r($select);
        // die();
        Twig::render('user-create.php', ['privileges' => $select]);
    }


    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            RequirePage::redirect('user/create');
            exit();
        }

        extract($_POST);
        RequirePage::library('Validation');
        $val = new Validation();
        $val->name('nom')->value($nom)->max(45)->min(2)->pattern('alpha');
        $val->name('username')->value($username)->pattern('email')->required()->max(50);
        $val->name('password')->value($password)->pattern('alphanum')->min(6)->max(20);
        $val->name('privilege_id')->value($privilege_id)->required();

        if ($val->isSuccess()) {
            // insert
            $user = new User;
            $options = [
                'cost' => 10,
            ];
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

            $_POST['password'] = $hashPassword;

            $insert = $user->insert($_POST);

            RequirePage::redirect('user/create');
            // echo 'Validation Ok!';
        } else {
            $errors = $val->displayErrors();
            $privilege = new Privilege;
            $select = $privilege->select();
            Twig::render('user-create.php', ['privileges' => $select, 'errors' => $errors, 'data' => $_POST]);
        }
    }
}
