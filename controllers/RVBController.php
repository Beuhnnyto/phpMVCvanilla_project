<?php

require_once './models/RVBModel.php';

class RVBController {
    public function indexRVB() {
        require_once './config/twigConfig.php';
        $model = new RVBModel();
        $nbRed = $model->getCountRed();
        $nbGreen = $model->getCountGreen();
        $nbBlue = $model->getCountBlue();
        $data = [
            'red' => $nbRed,
            'green' => $nbGreen,
            'blue' => $nbBlue
        ];
        $header = $twig->load('header.php.twig');
        echo $header->render(
            [
                'title' => 'KOURS KOULEUR'
            ]
        
        );
        require_once './views/RVBView.php';
        $footer = $twig->load('footer.php.twig');
        echo $footer->render();
    }

    public function addRVB() {
        $rvb = $_GET['rvb'];
        $model = new RVBModel();
        $model->insertData($rvb);
        header('Location: /colorChart');
    }

}
