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

namespace Developersspot\Ewarranty\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Install Schema
 */
class InstallSchema implements InstallSchemaInterface
{
	
	public function install(
		SchemaSetupInterface $setup,
		ModuleContextInterface $context
	)
	{
		$installer = $setup;
		$installer->startSetup();

		if (! $installer->tableExists('developersspot_ewarranty') ) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('developersspot_ewarranty')
			)
				->addColumn(
					'ewarranty_id', Table::TYPE_INTEGER, 11,
					[
						'identity' => true,
						'nullable' => false,
						'primary' => true,
						'unsigned' => true,
					],
					'Ewarranty ID'
				)
				->addColumn(
					'salutation' , Table::TYPE_TEXT, 10,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'customer_name' , Table::TYPE_TEXT, 225,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'customer_email' , Table::TYPE_TEXT, 225,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'customer_mobile' , Table::TYPE_TEXT, 225,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'customer_dob' , Table::TYPE_DATE, null,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'customer_address' , Table::TYPE_TEXT, null,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'postal_code' , Table::TYPE_TEXT, 15,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'invoice_number' , Table::TYPE_TEXT, 50,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'invoice_number' , Table::TYPE_TEXT, 50,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'place_of_purchase' , Table::TYPE_TEXT, 225,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'date_of_purchase' , Table::TYPE_DATE, null,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'date_of_deliver' , Table::TYPE_DATE, null,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'model_name' , Table::TYPE_TEXT, 225,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'serial_number' , Table::TYPE_TEXT, 225,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'purchase_experience' , Table::TYPE_INTEGER, 1,
					[
						'nullable' => false,
						'default' => 1
					]
				)
				->addColumn(
					'delivery_experience' , Table::TYPE_INTEGER, 1,
					[
						'nullable' => false,
						'default' => 1
					]
				)
				->addColumn(
					'message' , Table::TYPE_TEXT, null,
					[
						'nullable' => true
					]
				)
				->addColumn(
					'status' , Table::TYPE_INTEGER, 1,
					[
						'nullable' => false,
						'default' => 0
					]
				)
				->addColumn(
					'created_at' , Table::TYPE_TIMESTAMP, null,
					[
						'nullable' => false,
						'default' => Table::TIMESTAMP_INIT
					]
				)
				->addColumn(
					'updated_at' , Table::TYPE_TIMESTAMP, null,
					[
						'nullable' => false,
						'default' => Table::TIMESTAMP_INIT_UPDATE
					]
				)
				->setComment('E-Warranty Requests');

			$installer->getConnection()->createTable($table);
		}

		$installer->endSetup();
	}
}
