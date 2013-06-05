<?php
namespace SNSnews\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use SNSnews\Model\SNSnews;

class SNSnewsController extends AbstractActionController{
    public function indexAction(){
        $snsnews = new SNSnews;
        $fb_info = $snsnews->getFbSelfLikeInfo();
        return new ViewModel(array('FB' => $fb_info));
    }

    public function logoutAction(){
        SNSnews::setLogoutFlag(true);
        return $this->redirect()->toRoute('snsnews');
    }
}