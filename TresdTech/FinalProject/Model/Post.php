<?php
namespace TresdTech\FinalProject\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'tresdtech_finalproject_post';
    protected $_cacheTag = 'tresdtech_finalproject_post';
    protected $_eventPrefix = 'tresdtech_finalproject_post';

    protected function _construct()
    {
        $this->_init('TresdTech\FinalProject\Model\ResourceModel\Post');
    }
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
