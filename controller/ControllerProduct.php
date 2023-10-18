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
            // File processing code
            if (!empty($_FILES['image_path']['name'])) {

                $targetDirectory = "C:\wamp64\www\cours-PHP2\TRAVAUX\php2-tp3\assets\img\uploads\\" ; // Directory to store the uploaded image

                $targetFile = $targetDirectory . basename($_FILES['image_path']['name']); // Path of the uploaded image file

                // Move the uploaded image to the target directory
                if (move_uploaded_file($_FILES['image_path']['tmp_name'], $targetFile)) {
                    // The image file was successfully uploaded
                    // You can save the file path or perform further processing if needed
                    $imagePath = $targetFile; // Save the file path for database insertion
                    // print_r($imagePath);
                    // die();
                } else {
                    // The image file was not uploaded successfully
                    // Handle the error according to your needs
                    echo "Error uploading image.";
                    exit;
                }
            } else {
                // No image file was uploaded
                // Handle the case where the image is required or provide a default image
                echo "No image file provided.";
                exit;
            }
            
            $insertImage = [
                'image_path' => $imagePath
            ];

            $product = new Product;
            $insert = $product->insert($_POST, $insertImage);

            RequirePage::redirect('product');
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
