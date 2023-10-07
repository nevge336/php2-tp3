<?php

RequirePage::model('Client');
RequirePage::model('Ville');

class ControllerClient extends Controller
{


    
    public function index()
    {

        CheckSession::sessionAuth();
        $client = new Client;
        $select = $client->select();

        Twig::render('client-index.php', ['clients' => $select]);
    }



    public function create()
    {
        $ville = new Ville;
        $selectVille = $ville->select();
        // print_r($selectVille);
        // die();
        Twig::render('client-create.php', ['villes' => $selectVille]);
    }



    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            RequirePage::redirect('client/create');
            exit();
        }

        RequirePage::library('Validation');
        extract($_POST);
        $val = new Validation();
        $val->name('nom')->value($nom)->max(30)->min(2)->pattern('alpha');
        $val->name('adresse')->value($adresse)->max(50);
        $val->name('postal_code')->value($postal_code)->max(10);
        $val->name('courriel')->value($courriel)->pattern('email')->required()->max(50);
        $val->name('phone')->value($phone)->max(20);
        $val->name('naissance')->value($naissance)->pattern('date_ymd')->max(10);

        if ($val->isSuccess()) {

            $client = new Client;
            $insert = $client->insert($_POST);

            RequirePage::redirect('client');
        } else {
            //var_dump($val->getErrors());
            $errors = $val->displayErrors();

            // print_r($errors);
            // die();
            $ville = new Ville;
            $selectVille = $ville->select();
            //RequirePage::redirect('client/create');
            Twig::render('client-create.php', ['villes' => $selectVille, 'errors' => $errors, 'data' => $_POST]);
        }
    }

    public function show($id)
    {
        $client = new Client;
        $selectId = $client->selectId($id);
        //print_r($selectId);
        //echo $selectId['ville_id'];
        $ville = new Ville;
        $selectVille = $ville->selectId($selectId['ville_id']);
        //print_r($selectVille);
        $ville = $selectVille['ville'];
        //die();
        Twig::render('client-show.php', ['client' => $selectId, 'ville' => $ville]);
    }

    public function edit($id)
    {
        $client = new Client;
        $selectId = $client->selectId($id);
        $ville = new Ville;
        $selectVille = $ville->select();
        Twig::render('client-edit.php', ['client' => $selectId, 'villes' => $selectVille]);
    }

    public function update()
    {
        //print_r($_POST);
        $client = new Client;
        $update = $client->update($_POST);
        if ($update) {
            RequirePage::redirect('client');
        } else {
            print_r($update);
        }
    }

    public function destroy()
    {
        // print_r($_POST);
        // die();
        $client = new Client;
        $delete = $client->delete($_POST['id']);
        // echo $delete;
        // die();
        if ($delete) {
            RequirePage::redirect('client');
        } else {
            print_r($delete);
        }
    }
}
