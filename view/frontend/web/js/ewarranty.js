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

require([
    "jquery",
    "mage/mage",
    "mage/calendar"
], function ($) {
    var ewarrantyForm = $("#ewarrantyForm");

    ewarrantyForm.mage('validation', {
        errorPlacement: function(error, element) {
            if (element.is(':checkbox')) {
                element.siblings('label').last().after(error);
            } else if (element.is('.datepicker')) {
                element.after(error);
            } else {
                element.after(error);
            }
        },
    });

    $(".datepicker").calendar({
        showsTime: false,
        hideIfNoPrevNext: true,
        changeMonth: true,
        changeYear: true,
        maxDate:0,
        buttonText: "<?php echo __('Select Date') ?>"
    });
});
