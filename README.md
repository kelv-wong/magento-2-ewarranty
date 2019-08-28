# Magento 2 E-Warranty
E-warranty page for magento 2. Basic bootstrap form element used.
# Instal with composer as you go
1. Go to Magento 2 root folder
2. Enter below command to install E-Warranty module
   ````bash
   composer require developersspot/e-warranty
   ````
3. Enter following command to enable the module

    ````bash
   rm -rf var/view_preprocessed/*
   rm -rf pub/static/adminhtml/*
   rm -rf pub/static/frontend/*
   php bin/magento setup:upgrade
   php bin/magento setup:di:compile
   php bin/magento setup:static-content:deploy
   php bin/magento cache:clean
   php bin/magento cache:flush
   ````
