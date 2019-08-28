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

namespace Developersspot\Ewarranty\Controller\Index;

use Developersspot\Ewarranty\Model\Ewarranty;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * 
 */
class Index extends Action
{
	protected $_pageFactory;

	protected $_ewarrantyFactory;
	
	public function __construct(
		Context $context,
		PageFactory $pageFactory
	)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$post = (array) $this->getRequest()->getPost();

		if( ! empty($post) )
		{
			$resultRedirect = $this->resultRedirectFactory->create();

			$model = $this->_objectManager->create('Developersspot\Ewarranty\Model\Ewarranty');
			$data = [
				'salutation' => $post['salutation'],
				'customer_name' => $post['customer_name'],
				'customer_email' => $post['customer_email'],
				'customer_mobile' => $post['customer_mobile'],
				'customer_dob' => $post['date_of_birth'],
				'customer_address' => $post['address'],
				'postal_code' => $post['postal'],
				'place_of_purchase' => $post['place_of_purchase'],
				'invoice_number' => $post['invoice_number'],
				'date_of_purchase' => $post['date_of_purchase'],
				'date_of_deliver' => $post['date_of_delivery'],
				'model_name' => $post['model_name'],
				'serial_number' => $post['serial_number'],
				'purchase_experience' => $post['purchase_experience'],
				'delivery_experience' => $post['purchase_delivery'],
				'message' => $post['feedback'],
				'status' => 2,
			];

			$model->setData($data);

			try {
                // save the data
                $model->save();

                $this->messageManager->addSuccess(__('E-Warranty requested successfully.'));
				return $resultRedirect->setPath('*/');

            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/');
            }			
		}
		
		$resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->set((__('E-Warranty')));
        return $resultPage;	
	}
}
