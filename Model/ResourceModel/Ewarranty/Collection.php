<?php
/**
 * Developersspot
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Developersspot.com license 
 * that is available through the world-wide-web at this URL:
 * https://developersspot.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to ypgrade this extension to newer
 * version in the future.
 *
 * @category	Developersspot 
 * @package 	Developersspot_Ewarranty
 * @copyright 	Copyright (c) 2019 Developersspot (http://developersspot.com)
 * @license 	https://developersspot.com/LICENSE.txt
 */

namespace Developersspot\Ewarranty\Model\ResourceModel\Ewarranty;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Ewarranty Collection
 */
class Collection extends AbstractCollection
{
	protected $_idFieldName = 'ewarranty_id';
	
	protected function _construct()
	{
		$this->_init('Developersspot\Ewarranty\Model\Ewarranty', 'Developersspot\Ewarranty\Model\ResourceModel\Ewarranty');
	}
}
