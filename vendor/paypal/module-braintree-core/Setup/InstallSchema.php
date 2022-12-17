<?php

namespace PayPal\Braintree\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Zend_Db_Exception;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        if (!$installer->tableExists('braintree_transaction_details', 'sales')) {
            $this->braintreeTransactionDetails($installer);
        }
        if (!$installer->tableExists('braintree_credit_prices')) {
            $this->braintreeCreditPrices($installer);
        }

        $installer->endSetup();
    }

    /**
     * Create the braintree_transaction_details table
     *
     * @param SchemaSetupInterface $installer
     * @throws Zend_Db_Exception
     */
    private function braintreeTransactionDetails(SchemaSetupInterface $installer)
    {
        /**
         * Create table 'braintree_transaction_details'
         */
        $connection = $installer->getConnection('sales');
        $table = $connection
            ->newTable($installer->getTable('braintree_transaction_details'))
            ->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'order_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Order Id'
            )
            ->addColumn(
                'transaction_source',
                Table::TYPE_TEXT,
                12,
                ['nullable' => true],
                'Transaction Source'
            )
            ->addIndex(
                $installer->getIdxName('braintree_transaction_details', ['order_id']),
                ['order_id']
            )
            ->addForeignKey(
                $installer->getFkName('braintree_transaction_details', 'order_id', 'sales_order', 'entity_id'),
                'order_id',
                $installer->getTable('sales_order'),
                'entity_id',
                Table::ACTION_CASCADE
            )
            ->setComment('Braintree transaction details table');
        $connection->createTable($table);
    }

    /**
     * Create the braintree_credit_prices table
     *
     * @param SchemaSetupInterface $installer
     * @throws Zend_Db_Exception
     */
    private function braintreeCreditPrices(SchemaSetupInterface $installer)
    {
        $table = $installer->getConnection()
            ->newTable($installer->getTable('braintree_credit_prices'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Row ID'
            )
            ->addColumn(
                'product_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Product Id'
            )
            ->addColumn(
                'term',
                Table::TYPE_INTEGER,
                4,
                ['nullable' => false],
                'Credit Term'
            )
            ->addColumn(
                'monthly_payment',
                Table::TYPE_DECIMAL,
                '12,2',
                ['nullable' => false],
                'Monthly Payment'
            )
            ->addColumn(
                'instalment_rate',
                Table::TYPE_DECIMAL,
                '12,2',
                ['nullable' => false],
                'Instalment Rate'
            )
            ->addColumn(
                'cost_of_purchase',
                Table::TYPE_DECIMAL,
                '12,2',
                ['nullable' => false],
                'Cost of purchase'
            )
            ->addColumn(
                'total_inc_interest',
                Table::TYPE_DECIMAL,
                '12,2',
                ['nullable' => false],
                'Total Inc Interest'
            )
            ->addIndex(
                $installer->getIdxName('braintree_credit_prices', ['product_id']),
                ['product_id']
            )
            ->addIndex(
                $installer->getIdxName(
                    'braintree_credit_prices',
                    ['product_id', 'term'],
                    AdapterInterface::INDEX_TYPE_UNIQUE
                ),
                ['product_id', 'term'],
                ['type' => AdapterInterface::INDEX_TYPE_UNIQUE]
            )
            ->setComment('Braintree credit rates');
        $installer->getConnection()->createTable($table);
    }
}
