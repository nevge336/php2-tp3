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

        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            RequirePage::redirect('product/create');
            exit();
        }

        RequirePage::library('Validation');
        extract($_POST);
        $val = new Validation();
        $val->name('nom')->value($name)->max(100)->min(2)->pattern('words');
        $val->name('description')->value($description)->max(200)->min(2)->pattern('words');
        $val->name('coût')->value($cost)->pattern('int');
        $val->name('prix')->value($price)->pattern('int');


        // Traitement de l'image téléchargée
        if ($val->isSuccess()) {

            $product = new Product;
            // Directory to store the uploaded image
            $targetDirectory = IMG_DIR; 
            // $fileName = $_FILES['image_path']['name']
            $targetFile = $targetDirectory . basename($_FILES['image_path']['name']); // Path of the uploaded image file
            $imageName = $_FILES['image_path']['name'];
            $_POST['image_path'] = $imageName;

            // Move the uploaded image to the target directory
            if (move_uploaded_file($_FILES['image_path']['tmp_name'], $targetFile)) {
                // The image file was successfully uploaded
                $insert = $product->insert($_POST);
                RequirePage::redirect('product');
            } else {
                // The image file was not uploaded successfully
                // Handle the error according to your needs
                echo "Error uploading image.";
                exit;
                RequirePage::redirect('product-create');
            }
        } else {
            $errors = $val->displayErrors();
            Twig::render('product-create.php', ['errors' => $errors, 'data' => $_POST]);
        }
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
