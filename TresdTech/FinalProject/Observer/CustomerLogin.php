<?php 
namespace TresdTech\FinalProject\Observer;

use Magento\Framework\Event\ObserverInterface;

class CustomerLogin implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $layout = $observer->getEvent()->getLayout();
        $email = $customer->getEmail(); //Get customer Email
        $name = $customer->getName(); //Get customer Name
        $message = "Bienvenido ".$name;
        $this->messageManager->addSuccessMessage(__($message));
        $layout->setName($message);
        exit;
    }
}
?>