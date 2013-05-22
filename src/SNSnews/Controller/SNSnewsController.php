<?php
namespace SNSnews\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SNSnewsController extends AbstractActionController{
	public function indexAction(){
		return new ViewModel();
	}
}