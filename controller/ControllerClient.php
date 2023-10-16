<?php

RequirePage::model('Client');
RequirePage::model('City');

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
        CheckSession::sessionAuth();
        $city = new City;
        $selectCity = $city->select();
        // print_r($selectCity);
        // die();
        Twig::render('client-create.php', ['cities' => $selectCity]);
    }



    public function store()
    {
        CheckSession::sessionAuth();
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            RequirePage::redirect('client/create');
            exit();
        }

        RequirePage::library('Validation');
        extract($_POST);
        $val = new Validation();
        $val->name('name')->value($name)->max(30)->min(2)->pattern('alpha');
        $val->name('address')->value($address)->max(50);
        $val->name('postal_code')->value($postal_code)->max(10);
        $val->name('email')->value($email)->pattern('email')->required()->max(50);
        $val->name('phone')->value($phone)->max(20);


        if ($val->isSuccess()) {

            $client = new Client;
            $insert = $client->insert($_POST);

            RequirePage::redirect('client');
        } else {
            //var_dump($val->getErrors());
            $errors = $val->displayErrors();

            // print_r($errors);
            // die();
            $city = new City;
            $selectCity = $city->select();
            //RequirePage::redirect('client/create');
            Twig::render('client-create.php', ['cities' => $selectCity, 'errors' => $errors, 'data' => $_POST]);
        }
    }



    public function show($id)
    {
        CheckSession::sessionAuth();
        $client = new Client;
        $selectId = $client->selectId($id);
        //print_r($selectId);
        //echo $selectId['city_id'];
        $city = new City;
        $selectCity = $city->selectId($selectId['city_id']);
        //print_r($selectCity);
        $city = $selectCity['city'];
        //die();
        Twig::render('client-show.php', ['client' => $selectId, 'city' => $city]);
    }



    public function edit($id)
    {
        CheckSession::sessionAuth();
        $client = new Client;
        $selectId = $client->selectId($id);
        $city = new City;
        $selectCity = $city->select();
        Twig::render('client-edit.php', ['client' => $selectId, 'cities' => $selectCity]);
    }



    public function update()
    {
        CheckSession::sessionAuth();
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
