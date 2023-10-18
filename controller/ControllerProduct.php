<?php

RequirePage::model('Product');

class ControllerProduct extends Controller
{
    public function __construct()
    {
        CheckSession::sessionAuth();
    }



    public function index()
    {
        $product = new Product;
        $select = $product->select();
        Twig::render('product-index.php', ['products' => $select]);
    }



    public function create()
    {
        Twig::render('product-create.php');
    }



    public function store()
    {
        // print_r($_POST);
        $product = new Product;
        $insert = $product->insert($_POST);
        // return $insert;
        RequirePage::redirect('product');
    }



    public function show($id)
    {
        $product = new Product;
        $selectId = $product->selectId($id);
        //print_r($selectId);
        Twig::render('product-show.php', ['product' => $selectId]);
    }



    public function edit($id)
    {
        $product = new Product;
        $selectId = $product->selectId($id);
        Twig::render('product-edit.php', ['product' => $selectId]);
    }



    public function update()
    {
        //print_r($_POST);
        $product = new Product;
        $update = $product->update($_POST);
        if ($update) {
            RequirePage::redirect('product');
        } else {
            print_r($update);
        }
    }


    public function destroy()
    {
        $product = new Product;
        $delete = $product->delete($_POST['id']);
        if ($delete) {
            RequirePage::redirect('product');
        } else {
            print_r($delete);
        }
    }
}
