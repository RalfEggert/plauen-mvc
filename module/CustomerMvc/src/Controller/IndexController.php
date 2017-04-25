<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerMvc\Controller;

use CustomerDomain\Repository\CustomerRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 *
 * @package CustomerMvc\Controller
 */
class IndexController extends AbstractActionController
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function setCustomerRepository(
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @return ViewModel
     */
    public function indexAction() : ViewModel
    {
        $customerList = $this->customerRepository->getCustomerList();

        $viewModel = new ViewModel();
        $viewModel->setVariable('name', 'Ralf');
        $viewModel->setVariable('customerList', $customerList);

        return $viewModel;
    }
}
