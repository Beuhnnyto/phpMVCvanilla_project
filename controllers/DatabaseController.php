<?php

require_once './models/DatabaseModel.php';

class DatabaseController {
    public function index() {
        require_once './config/twigConfig.php';
        $model = new DatabaseModel();
        $data = $model->getAllData();
        $header = $twig->load('header.php.twig');
        echo $header->render(
            [
                'title' => 'CKOI1CRUD'
            ]
        
        );
        require_once './views/DatabaseView.php';
        $footer = $twig->load('footer.php.twig');
        echo $footer->render();
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['title'];
            $model = new DatabaseModel();
            $model->insertData($data);
            echo "ajouté";
            header('Location: /');
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $model = new DatabaseModel();
        $model->deleteData($id);
        echo "supprimé";
        header('Location: /');
    }
} 
