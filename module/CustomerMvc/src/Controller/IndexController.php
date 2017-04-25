<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerMvc\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction() : ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setVariable('name', 'Ralf');

        return $viewModel;
    }
}
