<?php



class ControllerLogbook extends Controller
{
    public function __construct()
    {
        CheckSession::sessionAuth();
        CheckSession::checkPrivilegeSuperAdmin();
    }

    public function index()
    {
        $logbook = new Logbook;
        $select = $logbook->select();

        Twig::render('logbook-index.php', ['logbooks' => $select]);
    }



}
