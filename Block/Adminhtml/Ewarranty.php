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

namespace Developersspot\Ewarranty\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Ewarranty extends Container
{
    /**
     * Block constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_ewarranty';
        $this->_blockGroup = 'Developersspot_Ewarranty';
        $this->_headerText = __('E-Warranty List');
        $this->_addButtonLabel = __('Add E-Warranty');
        parent::_construct();
        $this->buttonList->remove('add');
    }

}
