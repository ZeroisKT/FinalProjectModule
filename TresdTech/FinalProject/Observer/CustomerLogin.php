<?php 
namespace TresdTech\FinalProject\Observer;

use Magento\Framework\Event\ObserverInterface;

class CustomerLogin implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        
        $customer = $observer->getEvent()->getCustomer();
        $email = $customer->getEmail(); //Get customer Email
        $name = $customer->getName(); //Get customer Name
        echo "Welcome ".$name;
        exit;
    }
}
?>