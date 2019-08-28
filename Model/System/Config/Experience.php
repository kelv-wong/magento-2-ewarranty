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

namespace Developersspot\Ewarranty\Model\System\Config;

use Magento\Framework\Option\ArrayInterface;

class Experience implements ArrayInterface
{
	const BAD = 0;
	const CAN_BE_IMPROVE = 1;
	const GOOD = 2;
	const EXCELLENT = 3;

	public function toOptionArray()
    {
        $options = [
            self::BAD => __('Bad'),
            self::CAN_BE_IMPROVE => __('Can be improve'),
            self::GOOD => __('Good'),
            self::EXCELLENT => __('Excellent'),
        ];

        return $options;
    }
}
