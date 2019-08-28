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

use Developersspot\Ewarranty\Model\Ewarranty;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Delete extends Action
{
	protected $_model;

	public function _construct(
		Context $context,
		Ewarranty $model
	)
	{
		parent::_construct($context);
		$this->_model = $model;
	}

	public function execute()
	{
		$id = $this->getRequest()->getParam('id');

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_model;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('E-Warranty Deleted'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->messageManager->addError(__('E-Warranty does not exist'));
        return $resultRedirect->setPath('*/*/');
	}
}
