<?php


class Twig
{
    static public function render($template, $data = array())
    {
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, array('auto_reload' => true));

        $twig->addGlobal('path', PATH_DIR);

        //on est login ou pas 
        if (isset($_SESSION['fingerPrint']) && $_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])) {
            $guest = false;
        } else {
            $guest = true;
        }
        // ici on regarde le type de user : admin ou staff
        $twig->addGlobal('session', $_SESSION); // $_session est un tableau associatif
        $twig->addGlobal('guest', $guest);

        echo $twig->render($template, $data);
    }
}
