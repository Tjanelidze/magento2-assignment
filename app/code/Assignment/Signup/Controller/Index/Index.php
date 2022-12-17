<?php
namespace Assignment\Signup\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Assignment\Signup\Model\SignupFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        SignupFactory $signupFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->signUpFactory = $signupFactory;
        return parent::__construct($context);
    }
    public function execute()
    {

        $post = (array) $this->getRequest()->getPost();

            if (!empty($post)) {
            // Retrieve form data
            $name   = $post['name'];
            $date    = $post['date'];


            // Display the succes form validation message
            $model = $this->signUpFactory->create();
            $model->setName($name);
            $model->setDate($date);
            $model->save();
            $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));


            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/signup/index/index');

            return $resultRedirect;

        }

        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
