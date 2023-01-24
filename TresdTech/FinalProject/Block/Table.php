<?php
namespace TresdTech\FinalProject\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use TresdTech\FinalProject\Model\ResourceModel\Post\CollectionFactory;
use TresdTech\FinalProject\Model\PostFactory;

class Table extends Template
{
    public $collection;

    public function __construct(
        Context $context, 
        CollectionFactory $collectionFactory,
        PostFactory $postFactory, 
        array $data = [])
    {
        $this->collection = $collectionFactory;
        $this->_postFactory = $postFactory;
        parent::__construct($context, $data);
    }
 
    public function getCollection()
    {
        return $this->collection->create();
    }
    public function getPostCollection(){
		$post = $this->_postFactory->create();
		return $post->getCollection();
	}
}
