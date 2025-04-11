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
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;

/**
 * 
 */
class Index extends Action
{
	protected $_pageFactory;

	protected $_ewarrantyFactory;

	protected $_inlineTranslation;

	protected $_transportBuilder;

	protected $_scopeConfig;

	protected $storeManager;

	public function __construct(
		Context $context,
		PageFactory $pageFactory,
		ScopeConfigInterface $scopeConfig,
		StateInterface $inlineTranslation,
		TransportBuilder $transportBuilder,
		LoggerInterface $loggerInterface,
		StoreManagerInterface $storeManager
	)
	{

		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$urlInterface = $objectManager->get('\Magento\Framework\UrlInterface');
		$customerSession = $objectManager->get('Magento\Customer\Model\Session');
		if(!$customerSession->isLoggedIn()) {
		        $customerSession->setAfterAuthUrl($urlInterface->getCurrentUrl());
		        $customerSession->authenticate();
		}
		
		$this->_pageFactory = $pageFactory;
		$this->_scopeConfig = $scopeConfig;
		$this->_inlineTranslation = $inlineTranslation;
		$this->_transportBuilder = $transportBuilder;
		$this->_logLoggerInterface = $loggerInterface;
		$this->storeManager = $storeManager;

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

                $this->sendEmailToCustomer($post);

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

	protected function getStoreName()
    {
        return $this->_scopeConfig->getValue(
            'trans_email/ident_general/name',
            ScopeInterface::SCOPE_STORE
        );
    }

	protected function getStoreEmail()
    {
        return $this->_scopeConfig->getValue(
            'trans_email/ident_general/email',
            ScopeInterface::SCOPE_STORE
        );
    }

	protected function sendEmailToCustomer($post)
    {
        try
        {
            // Send Mail
            $this->_inlineTranslation->suspend();
                         
            $sender = [
                'name' => $this->getStoreName(),
                'email' => $this->getStoreEmail()
            ];
             
            $sentToName = $post['customer_name'];
            $sentToEmail = $post['customer_email'];
             
            $transport = $this->_transportBuilder
            ->setTemplateIdentifier('ewarranty_customer_email_template')
            ->setTemplateVars([])
            ->setTemplateOptions(
                [
                    'area' => 'frontend',
                    'store' => $this->storeManager->getStore()->getId()
                ]
            )
            ->setFromByScope($sender)
            ->addTo($sentToEmail, $sentToName)
            ->getTransport();
             
            $transport->sendMessage();
             
            $this->_inlineTranslation->resume();
                 
        } catch(\Exception $e){
            $this->_logLoggerInterface->debug($e->getMessage());
        }
    }
}
