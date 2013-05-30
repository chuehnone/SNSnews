<?php
namespace SNSnews\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use SNSnews\Model\SNSnews;

class SNSnewsController extends AbstractActionController{
    public function indexAction(){
        /*$test = get_included_files();
        foreach ($test as $value) {
            echo $value,"<br>";
        }*/

        $snsnews = new SNSnews;
        $fb_info = $snsnews->showFB();

        return new ViewModel(array('FB' => $fb_info));
    }
}