<?php

namespace Dotdigitalgroup\Email\Setup\Schema;

use \Magento\Framework\Setup\SchemaSetupInterface;
use Dotdigitalgroup\Email\Setup\SchemaInterface as Schema;

class Shared
{
    /**
     * Create abandoned cart table
     *
     * @param SchemaSetupInterface $installer
     * @param string $tableName
     */
    public function createAbandonedCartTable($installer, $tableName)
    {
        $abandonedCartTable = $installer->getConnection()->newTable($installer->getTable($tableName));
        $abandonedCartTable = $this->addColumnForAbandonedCartTable($abandonedCartTable);
        $abandonedCartTable = $this->addIndexKeyForAbandonedCarts($installer, $abandonedCartTable);
        $abandonedCartTable->setComment('Abandoned Carts Table');
        $installer->getConnection()->createTable($abandonedCartTable);
    }

    /**
     * @param \Magento\Framework\DB\Ddl\Table $table
     * @return mixed
     */
    private function addColumnForAbandonedCartTable($table)
    {
        return $table->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'primary' => true,
                'identity' => true,
                'unsigned' => true,
                'nullable' => false
            ],
            'Primary Key'
        )
            ->addColumn(
                'quote_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => true],
                'Quote Id'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                10,
                ['unsigned' => true, 'nullable' => true],
                'Store Id'
            )
            ->addColumn(
                'customer_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                ['unsigned' => true, 'nullable' => true, 'default' => null],
                'Customer ID'
            )
            ->addColumn(
                'email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Email'
            )
            ->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Contact Status'
            )
            ->addColumn(
                'is_active',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                5,
                ['unsigned' => true, 'nullable' => false, 'default' => '1'],
                'Quote Active'
            )
            ->addColumn(
                'quote_updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                'Quote updated at'
            )
            ->addColumn(
                'abandoned_cart_number',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0],
                'Abandoned Cart number'
            )
            ->addColumn(
                'items_count',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => true, 'default' => 0],
                'Quote items count'
            )
            ->addColumn(
                'items_ids',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['unsigned' => true, 'nullable' => true],
                'Quote item ids'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                'Created At'
            )
            ->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                'Updated at'
            );
    }

    /**
     * @param SchemaSetupInterface $installer
     * @param \Magento\Framework\DB\Ddl\Table $abandonedCartTable
     * @return mixed
     */
    private function addIndexKeyForAbandonedCarts($installer, $abandonedCartTable)
    {
        return $abandonedCartTable->addIndex(
            $installer->getIdxName(Schema::EMAIL_ABANDONED_CART_TABLE, ['quote_id']),
            ['quote_id']
        )
            ->addIndex(
                $installer->getIdxName(Schema::EMAIL_ABANDONED_CART_TABLE, ['store_id']),
                ['store_id']
            )
            ->addIndex(
                $installer->getIdxName(Schema::EMAIL_ABANDONED_CART_TABLE, ['customer_id']),
                ['customer_id']
            )
            ->addIndex(
                $installer->getIdxName(Schema::EMAIL_ABANDONED_CART_TABLE, ['email']),
                ['email']
            );
    }

    /**
     * Create consent table
     *
     * @param SchemaSetupInterface $installer
     * @param string $tableName
     */
    public function createConsentTable($installer, $tableName)
    {
        $emailContactConsentTable = $installer->getConnection()->newTable($installer->getTable($tableName));
        $emailContactConsentTable = $this->addColumnForConsentTable($emailContactConsentTable);
        $emailContactConsentTable = $this->addIndexToConsentTable($installer, $emailContactConsentTable);
        $emailContactConsentTable = $this->addKeyForConsentTable($installer, $emailContactConsentTable);
        $emailContactConsentTable->setComment('Email contact consent table.');
        $installer->getConnection()->createTable($emailContactConsentTable);
    }

    /**
     * @param \Magento\Framework\DB\Ddl\Table $emailContactConsentTable
     * @return mixed
     */
    private function addColumnForConsentTable($emailContactConsentTable)
    {
        $emailContactConsentTable
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                [
                    'primary' => true,
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false
                ],
                'Primary Key'
            )
            ->addColumn(
                'email_contact_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => true],
                'Email Contact Id'
            )
            ->addColumn(
                'consent_url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['unsigned' => true, 'nullable' => true],
                'Contact consent url'
            )
            ->addColumn(
                'consent_datetime',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                null,
                [],
                'Contact consent datetime'
            )
            ->addColumn(
                'consent_ip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['unsigned' => true, 'nullable' => true],
                'Contact consent ip'
            )
            ->addColumn(
                'consent_user_agent',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['unsigned' => true, 'nullable' => true],
                'Contact consent user agent'
            );

        return $emailContactConsentTable;
    }

    /**
     * @param SchemaSetupInterface $installer
     * @param \Magento\Framework\DB\Ddl\Table $emailContactConsentTable
     * @return mixed
     */
    private function addKeyForConsentTable($installer, $emailContactConsentTable)
    {
        return $emailContactConsentTable->addForeignKey(
            $installer->getFkName(
                Schema::EMAIL_CONTACT_CONSENT_TABLE,
                'email_contact_id',
                Schema::EMAIL_CONTACT_TABLE,
                'email_contact_id'
            ),
            'email_contact_id',
            $installer->getTable(Schema::EMAIL_CONTACT_TABLE),
            'email_contact_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );
    }

    /**
     * @param SchemaSetupInterface $installer
     * @param \Magento\Framework\DB\Ddl\Table $table
     * @return mixed]
     */
    private function addIndexToConsentTable($installer, $table)
    {
        return $table->addIndex(
            $installer->getIdxName($installer->getTable(Schema::EMAIL_CONTACT_CONSENT_TABLE), ['email_contact_id']),
            ['email_contact_id']
        );
    }

    /**
     * Create failed auth table
     *
     * @param SchemaSetupInterface $installer
     * @param string $tableName
     */
    public function createFailedAuthTable($installer, $tableName)
    {
        $emailAuthEdc = $installer->getConnection()->newTable($installer->getTable($tableName));
        $emailAuthEdc = $this->addColumnForFailedAuthTable($emailAuthEdc);
        $emailAuthEdc = $this->addIndexToFailedAuthTable($installer, $emailAuthEdc);
        $emailAuthEdc->setComment('Email Failed Auth Table.');
        $installer->getConnection()->createTable($emailAuthEdc);
    }

    /**
     * @param \Magento\Framework\DB\Ddl\Table $table
     * @return mixed
     */
    private function addColumnForFailedAuthTable($table)
    {
        $table
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                [
                    'primary' => true,
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false
                ],
                'Primary Key'
            )
            ->addColumn(
                'failures_num',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => true],
                'Number of fails'
            )
            ->addColumn(
                'first_attempt_date',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                null,
                [],
                'First attempt date'
            )
            ->addColumn(
                'last_attempt_date',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                null,
                [],
                'Last attempt date'
            )
            ->addColumn(
                'url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['unsigned' => true, 'nullable' => true],
                'URL'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => true],
                'Store Id'
            );

        return $table;
    }

    /**
     * @param SchemaSetupInterface $installer
     * @param \Magento\Framework\DB\Ddl\Table $emailAuthEdc
     * @return mixed
     */
    private function addIndexToFailedAuthTable($installer, $emailAuthEdc)
    {
        return $emailAuthEdc
            ->addIndex(
                $installer->getIdxName('email_auth_edc', ['store_id']),
                ['store_id']
            );
    }

    /**
     * Create coupon table
     *
     * @param SchemaSetupInterface $installer
     * @param string $tableName
     */
    public function createCouponTable($installer, $tableName)
    {
        $couponTable = $installer->getConnection()->newTable($installer->getTable($tableName));
        $couponTable = $this->addColumnsToCouponTable($couponTable);
        $couponTable = $this->addKeyToCouponTable($installer, $couponTable);
        $couponTable = $this->addIndexesToCouponTable($installer, $couponTable);
        $couponTable->setComment('Dotdigital coupon attributes table');
        $installer->getConnection()->createTable($couponTable);
    }

    /**
     * @param \Magento\Framework\DB\Ddl\Table $table
     * @return mixed
     */
    private function addColumnsToCouponTable($table)
    {
        return $table
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                [
                    'primary' => true,
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false
                ],
                'Primary Key'
            )
            ->addColumn(
                'coupon_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                [
                    'unsigned' => true,
                    'nullable' => false
                ],
                'Coupon Id'
            )
            ->addColumn(
                'email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Email'
            );
    }

    /**
     * @param SchemaSetupInterface $installer
     * @param \Magento\Framework\DB\Ddl\Table $table
     * @return mixed
     */
    private function addKeyToCouponTable($installer, $table)
    {
        return $table->addForeignKey(
            $installer->getFkName(
                $installer->getTable(Schema::EMAIL_COUPON_TABLE),
                'coupon_id',
                'salesrule_coupon',
                'coupon_id'
            ),
            'coupon_id',
            $installer->getTable('salesrule_coupon'),
            'coupon_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );
    }

    /**
     * @param SchemaSetupInterface $installer
     * @param \Magento\Framework\DB\Ddl\Table $table
     * @return mixed
     */
    private function addIndexesToCouponTable($installer, $table)
    {
        return $table
            ->addIndex(
                $installer->getIdxName(Schema::EMAIL_COUPON_TABLE, ['coupon_id']),
                ['coupon_id']
            )
            ->addIndex(
                $installer->getIdxName(Schema::EMAIL_COUPON_TABLE, ['email']),
                ['email']
            );
    }
}
