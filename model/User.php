<?php
require_once('Crud.php');

class User extends Crud
{

    public $table = 'user';

    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'nom',
        'username',
        'password',
        'privilege_id'
    ];

    public function checkUser($username, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE username = ?";
        $stmt = $this->prepare($sql);

        $stmt->execute(array($username));

        $count = $stmt->rowCount();

        if ($count === 1) {

            $user = $stmt->fetch();
            // echo $user['password'];
            // print_r($user);
            if (password_verify($password, $user['password'])) {

                session_regenerate_id();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nom'] = $user['nom']; //on passe la donnée nom
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                return true;
                // RequirePage::redirect('client');

                //logbook - journal de connection: adresse ip $_SERVER - REDIRECT_URL 
                // adressip + variable  REDI
                // print_r($_SERVER);
                // echo $_SERVER['REDIRECT_URL'];
                // echo $_SERVER['REMOTE_ADDR'];

            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
