<?php
namespace TresdTech\FinalProject\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'tresdtech_finalproject_post_collection';
	protected $_eventObject = 'post_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('TresdTech\FinalProject\Model\Post', 'TresdTech\FinalProject\Model\ResourceModel\Post');
	}
}