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
 * @category    Developersspot 
 * @package     Developersspot_Ewarranty
 * @copyright   Copyright (c) 2019 Developersspot (http://developersspot.com)
 * @license     https://developersspot.com/LICENSE.txt
 */

namespace Developersspot\Ewarranty\Controller\Adminhtml\Ewarranty;

use Developersspot\Ewarranty\Controller\Adminhtml\Ewarranty;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_pageFactory;

    protected $_storeManager;

    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
         parent::__construct($context);
         $this->_pageFactory = $pageFactory;
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->setActiveMenu('Developersspot_Ewarranty::ewarranty');
        $resultPage->getConfig()->getTitle()->prepend((__('E-Warranty')));
        return $resultPage;
    }
}
