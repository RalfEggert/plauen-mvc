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
use CustomerMvc\Form\CustomerForm;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 *
 * @package CustomerMvc\Controller
 * @method Request getRequest()
 */
class IndexController extends AbstractActionController
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * @var CustomerForm
     */
    private $customerForm;

    /**
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function setCustomerRepository(
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param CustomerForm $customerForm
     */
    public function setCustomerForm(CustomerForm $customerForm)
    {
        $this->customerForm = $customerForm;
    }

    /**
     * @return ViewModel
     */
    public function indexAction(): ViewModel
    {
        $customerList = $this->customerRepository->getCustomerList();

        $viewModel = new ViewModel();
        $viewModel->setVariable('name', 'Ralf');
        $viewModel->setVariable('customerList', $customerList);

        return $viewModel;
    }

    /**
     * @return \Zend\Http\Response|ViewModel
     */
    public function showAction()
    {
        $id = $this->params()->fromRoute('id', false);

        if ($id === false) {
            return $this->redirect()->toRoute('customer');
        }

        $customer = $this->customerRepository->getCustomerById($id);

        if ($customer === false) {
            return $this->redirect()->toRoute('customer');
        }

        $viewModel = new ViewModel();
        $viewModel->setVariable('customer', $customer);

        return $viewModel;
    }

    public function createAction()
    {
        if ($this->getRequest()->isPost()) {
            $postData = $this->params()->fromPost();

            $this->customerForm->setData($postData);

            $isValid = $this->customerForm->isValid();

            if ($isValid) {
                $this->customerRepository->saveCustomer(
                    $this->customerForm->getData()
                );

                return $this->redirect()->toRoute('customer');
            }
        }

        $viewModel = new ViewModel();
        $viewModel->setVariable('customerForm', $this->customerForm);

        return $viewModel;
    }
}
