<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventorySetupFixtureGenerator\Plugin\Setup\Model\FixtureGenerator\EntityGeneratorFactory;

use Magento\Setup\Model\FixtureGenerator\EntityGenerator;
use Magento\Setup\Model\FixtureGenerator\EntityGeneratorFactory;

/**
 * Add inventory_source_item support table to performance toolkit.
 */
class UpdateCustomTableMapPlugin
{
    /**
     * Processed source items for complex products.
     *
     * @var array
     */
    private $sourceItems = [];

    /**
     * Inject inventory_source_item table data to FixtureGenerator\EntityGeneratorFactory arguments.
     *
     * @param EntityGeneratorFactory $subject
     * @param array $data
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeCreate(
        EntityGeneratorFactory $subject,
        array $data
    ): array {
        $data['customTableMap']['inventory_source_item'] = [
            'entity_id_field' => EntityGenerator::SKIP_ENTITY_ID_BINDING,
            'handler' => function ($productId, $entityNumber, $fixture, $binds) {
                foreach ($binds as &$bind) {
                    $sku = $fixture['sku']($productId, $entityNumber);
                    if (in_array($sku, $this->sourceItems)) {
                        return [];
                    }
                    $bind['sku'] = $sku;
                    $this->sourceItems[] = $sku;
                }

                return $binds;
            },
        ];

        return [$data];
    }
}
