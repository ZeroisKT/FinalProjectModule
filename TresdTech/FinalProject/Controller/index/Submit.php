<?php

namespace TresdTech\FinalProject\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\ObjectManagerInterface;
use TresdTech\FinalProject\Model\Post;

class Submit extends Action
{
    /** @var PageFactory $resultPageFactory */
    protected $resultPageFactory;

    /**
     * Result constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Post $postFactory
        )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    /**
     * The controller action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getPost();
            $fn = $this->getRequest()->getParam('fisrt_name');
            $ln = $this->getRequest()->getParam('last_name');
            $email = $this->getRequest()->getParam('email');
            $telephone = $this->getRequest()->getParam('telephone');

            if ($data&&$fn&&$ln&&$email&&$telephone) {
                $model = $this->_postFactory;
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Se guardaron los datos."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("Ocurrió un error."));
        }

        return $this->_pageFactory->create();
    }
}