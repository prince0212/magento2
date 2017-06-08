<?php

namespace Baju\FrontController\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.0') < 0) {
            $setup->startSetup();
            /**
             * Create table 'learn_crud'
             */
            $table = $setup->getConnection()->newTable(
                $setup->getTable('baju_front')
            )->addColumn(
                'front_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Crud Id'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                225,
                [],
                'Name'
            )->addColumn(
                'email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                225,
                [],
                'Email'
            )->addColumn(
                'mobile',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                10,
                [],
                'mobile'
            )->setComment('Baju FrontController');

        $setup->getConnection()->createTable($table);
		}

        $setup->endSetup();
    }
}