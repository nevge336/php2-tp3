<?php

RequirePage::model('User');
RequirePage::model('Privilege');

class ControllerUser extends Controller
{
    public function __construct()
    {
        CheckSession::sessionAuth();
        // CheckSession::checkPrivilegeSuperAdmin();
    }

    public function index()
    {
        if ($_SESSION['privilege'] == 1) {
            $user = new User;
            $select = $user->selectInnerJoin();

            Twig::render('user-index.php', ['users' => $select]);
        } else {
            RequirePage::redirect('login');
        }
    }


    public function create()
    {
        $privilege = new Privilege;
        $selectPrivilege = $privilege->select();
        Twig::render('user-create.php', ['privileges' => $selectPrivilege]);
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
        $val->name('name')->value($name)->max(45)->min(2)->pattern('words');
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
            RequirePage::redirect('user');
        } else {
            $errors = $val->displayErrors();
            $privilege = new Privilege;
            $select = $privilege->select();
            Twig::render('user-create.php', ['privileges' => $select, 'errors' => $errors, 'data' => $_POST]);
        }
    }

    public function show($id)
    {
        $user = new User;
        $selectId = $user->selectId($id);
        $privilege = new Privilege;
        $selectPrivilege = $privilege->selectId($selectId['privilege_id']);
        $privilege = $selectPrivilege['privilege'];
        Twig::render('user-show.php', ['user' => $selectId, 'privilege' => $privilege]);
    }



    public function edit($id)
    {
        $user = new User;
        $selectId = $user->selectId($id);
        $privilege = new Privilege;
        $selectPrivilege = $privilege->select();
        Twig::render('user-edit.php', ['user' => $selectId, 'privileges' => $selectPrivilege]);
    }



    public function update()
    {
        $user = new User;
        $update = $user->update($_POST);
        if ($update) {
            RequirePage::redirect('user');
        } else {
            print_r($update);
        }
    }



    public function destroy()
    {
        $user = new User;
        $delete = $user->delete($_POST['id']);
        if ($delete) {
            RequirePage::redirect('user');
        } else {
            print_r($delete);
        }
    }
}
