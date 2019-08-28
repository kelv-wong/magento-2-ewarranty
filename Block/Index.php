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

namespace Developersspot\Ewarranty\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\StoreManagerInterface;
 
class Index extends \Magento\Framework\View\Element\Template
{
	protected $_storeManager;

	public function __construct(
		Context $context,
		StoreManagerInterface $storeManager
	)
	{
		parent::__construct($context);
		$this->_storeManager = $storeManager;
	}

	public function getStoreNames()
    {
        $stores = $this->_storeManager->getStores();
        $options = [];

        foreach($stores as $key => $store)
        {
            $options[] = [
            	'code' => $store['code'],
            	'name' => $store['name'],
            	'value' => $key
            ];
        }

        return $options;
    }

	public function _prepareLayout()
	{
		$breadcrumbs = $this->getLayout()->getBlock('breadcrumbs');
		$breadcrumbs->addCrumb('home', array('label'=>__('Home'), 'title'=>__('Home Page'), 'link'=> 'home'));
		$breadcrumbs->addCrumb('an_alias', array('label'=>'E-Warranty', 'title'=>'E-Warranty', 'link'=> ''));

		return parent::_prepareLayout();
	}
}
