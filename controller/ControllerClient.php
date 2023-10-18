<?php

RequirePage::model('Client');
RequirePage::model('City');

class ControllerClient extends Controller
{
    public function __construct()
    {
        CheckSession::sessionAuth();
    }


    public function index()
    {
        $client = new Client;
        $select = $client->select();

        Twig::render('client-index.php', ['clients' => $select]);
    }



    public function create()
    {

        $city = new City;
        $selectCity = $city->select();

        Twig::render('client-create.php', ['cities' => $selectCity]);
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
        $val->name('name')->value($name)->max(100)->min(2)->pattern('words');
        $val->name('contact')->value($contact)->max(100)->min(2)->pattern('words');
        $val->name('address')->value($address)->max(50);
        $val->name('postal_code')->value($postal_code)->max(10);
        $val->name('email')->value($email)->pattern('email')->required()->max(50);
        $val->name('phone')->value($phone)->max(20);


        if ($val->isSuccess()) {

            $client = new Client;
            $insert = $client->insert($_POST);

            RequirePage::redirect('client');
        } else {

            $errors = $val->displayErrors();
            $city = new City;
            $selectCity = $city->select();
            //RequirePage::redirect('client/create');
            Twig::render('client-create.php', ['cities' => $selectCity, 'errors' => $errors, 'data' => $_POST]);
        }
    }



    public function show($id)
    {
        $client = new Client;
        $selectId = $client->selectId($id);
        $city = new City;
        $selectCity = $city->selectId($selectId['city_id']);
        $city = $selectCity['city'];
        Twig::render('client-show.php', ['client' => $selectId, 'city' => $city]);
    }

    // public function show($id, $innerjoin)
    // {

    //     $client = new Client;
    //     $selectIdInnerjoin = $client->selectId($id);
    //     $city = new City;
    //     $selectCity = $city->selectId($selectId['city_id']);
    //     $city = $selectCity['city'];
    //     Twig::render('client-show.php', ['client' => $selectId, 'city' => $city]);
    // }

    public function edit($id)
    {

        $client = new Client;
        $selectId = $client->selectId($id);
        $city = new City;
        $selectCity = $city->select();
        Twig::render('client-edit.php', ['client' => $selectId, 'cities' => $selectCity]);
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
        $client = new Client;
        $delete = $client->delete($_POST['id']);
        if ($delete) {
            RequirePage::redirect('client');
        } else {
            print_r($delete);
        }
    }
}
