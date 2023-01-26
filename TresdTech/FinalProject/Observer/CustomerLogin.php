<?php 
namespace TresdTech\FinalProject\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;

class CustomerLogin implements ObserverInterface
{
    public function __construct(   
        ManagerInterface $messageManager
    )
    {   
        $this->messageManager = $messageManager;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $email = $customer->getEmail(); //Get customer Email
        $name = $customer->getName(); //Get customer Name
        $message = "Bienvenido ".$name;
        $this->messageManager->addSuccessMessage(__($message));
        
    }
}
?>