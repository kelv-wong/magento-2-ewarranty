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

namespace Developersspot\Ewarranty\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class Ewarranty extends Action
{
	/**
     * Init actions
     *
     * @return $this
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'Developersspot_Ewarranty::ewarranty_manage'
        )->_addBreadcrumb(
            __('E-warranty'),
            __('E-warranty')
        );
        return $this;
    }
}
