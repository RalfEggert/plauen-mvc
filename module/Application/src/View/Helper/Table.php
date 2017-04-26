<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class Table extends AbstractHelper
{
    public function __invoke(
        array $data = [], array $columns = [], string $parentRoute
    ) {
        $viewModel = new ViewModel();
        $viewModel->setVariable('data', $data);
        $viewModel->setVariable('columns', $columns);
        $viewModel->setVariable('parentRoute', $parentRoute);
        $viewModel->setTemplate('application/view/helper/table');

        return $this->getView()->render($viewModel);
    }
}
