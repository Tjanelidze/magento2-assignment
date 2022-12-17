<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryImportExport\Test\Integration\Model\Import;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\CatalogImportExport\Model\Import\Product;
use Magento\CatalogImportExport\Model\Import\ProductFactory;
use Magento\Framework\Api\SearchCriteria;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaBuilderFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Filesystem;
use Magento\ImportExport\Model\Import;
use Magento\ImportExport\Model\Import\Source\Csv;
use Magento\InventoryApi\Api\Data\SourceItemInterface;
use Magento\InventoryApi\Api\Data\SourceItemSearchResultsInterface;
use Magento\InventoryApi\Api\SourceItemRepositoryInterface;
use Magento\InventoryCatalogApi\Api\DefaultSourceProviderInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

/**
 * @see https://app.hiptest.com/projects/69435/test-plan/folders/908874/scenarios/2219820
 *
 * @magentoDbIsolation disabled
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ProductTest extends TestCase
{
    /**
     * @var DefaultSourceProviderInterface
     */
    private $defaultSourceProvider;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var ProductFactory
     */
    private $productImporterFactory;

    /**
     * @var SearchCriteriaBuilderFactory
     */
    private $searchCriteriaBuilderFactory;

    /**
     * @var SourceItemRepositoryInterface
     */
    private $sourceItemRepository;

    /**
     * @var string[]
     */
    private $importedProducts;

    /**
     * Setup Test for Product Import
     */
    public function setUp(): void
    {
        $this->defaultSourceProvider = Bootstrap::getObjectManager()->get(
            DefaultSourceProviderInterface::class
        );
        $this->filesystem = Bootstrap::getObjectManager()->get(
            Filesystem::class
        );
        $this->productImporterFactory = Bootstrap::getObjectManager()->get(
            ProductFactory::class
        );
        $this->searchCriteriaBuilderFactory = Bootstrap::getObjectManager()->get(
            SearchCriteriaBuilderFactory::class
        );
        $this->sourceItemRepository = Bootstrap::getObjectManager()->get(
            SourceItemRepositoryInterface::class
        );
    }

    /**
     * Test that following a Product Import Source Item is created as expected
     *
     * @return void
     */
    public function testSourceItemCreatedOnProductImport(): void
    {
        $pathToFile = __DIR__ . '/_files/product_import.csv';
        /** @var Product $productImporterModel */
        $productImporterModel = $this->getProductImporterModel($pathToFile);
        $errors = $productImporterModel->validateData();
        $this->assertTrue($errors->getErrorsCount() == 0);
        $productImporterModel->importData();
        $sku = 'example_simple_for_source_item';
        $compareData = $this->buildDataArray(
            $this->getSourceItemList()->getItems()
        );
        $expectedData = [
            SourceItemInterface::SKU => $sku,
            SourceItemInterface::QUANTITY => 100.0000,
            SourceItemInterface::SOURCE_CODE => $this->defaultSourceProvider->getCode(),
            SourceItemInterface::STATUS => SourceItemInterface::STATUS_IN_STOCK,
        ];
        $this->assertArrayHasKey(
            $sku,
            $compareData
        );
        $this->assertSame(
            $expectedData,
            $compareData[$sku]
        );
        $this->importedProducts = [$sku];
    }

    /**
     * Test that following a Product Import Source Item is updated as expected
     *
     * @return void
     */
    public function testSourceItemUpdatedOnProductImport(): void
    {
        $pathToFile = __DIR__ . '/_files/product_import_updated_qty.csv';
        /** @var Product $productImporterModel */
        $productImporterModel = $this->getProductImporterModel($pathToFile);
        $errors = $productImporterModel->validateData();
        $this->assertTrue($errors->getErrorsCount() == 0);
        $productImporterModel->importData();
        $sku = 'example_simple_for_source_item';
        $compareData = $this->buildDataArray(
            $this->getSourceItemList()->getItems()
        );
        $expectedData = [
            SourceItemInterface::SKU => $sku,
            SourceItemInterface::QUANTITY => 150.0000,
            SourceItemInterface::SOURCE_CODE => $this->defaultSourceProvider->getCode(),
            SourceItemInterface::STATUS => SourceItemInterface::STATUS_IN_STOCK,
        ];
        $this->assertArrayHasKey(
            $sku,
            $compareData
        );
        $this->assertSame(
            $expectedData,
            $compareData[$sku]
        );
        $this->importedProducts = [$sku];
    }

    /**
     * Get List of Source Items which match SKU and Source ID of dummy data
     *
     * @return SourceItemSearchResultsInterface
     */
    private function getSourceItemList(): SourceItemSearchResultsInterface
    {
        /** @var SearchCriteriaBuilder $searchCriteria */
        $searchCriteriaBuilder = $this->searchCriteriaBuilderFactory->create();

        $searchCriteriaBuilder->addFilter(
            SourceItemInterface::SKU,
            'example_simple_for_source_item'
        );

        $searchCriteriaBuilder->addFilter(
            SourceItemInterface::SOURCE_CODE,
            $this->defaultSourceProvider->getCode()
        );

        /** @var SearchCriteria $searchCriteria */
        $searchCriteria = $searchCriteriaBuilder->create();

        return $this->sourceItemRepository->getList($searchCriteria);
    }

    /**
     * @param SourceItemInterface[] $sourceItems
     * @return array
     */
    private function buildDataArray(array $sourceItems): array
    {
        $comparableArray = [];
        foreach ($sourceItems as $sourceItem) {
            $comparableArray[$sourceItem->getSku()] = [
                SourceItemInterface::SKU => $sourceItem->getSku(),
                SourceItemInterface::QUANTITY => $sourceItem->getQuantity(),
                SourceItemInterface::SOURCE_CODE => $sourceItem->getSourceCode(),
                SourceItemInterface::STATUS => $sourceItem->getStatus(),
            ];
        }

        return $comparableArray;
    }

    /**
     * Return Product Importer Model for use with tests requires path to CSV import file
     *
     * @param string $pathToFile
     * @param string $behavior
     * @return Product
     */
    private function getProductImporterModel(
        $pathToFile,
        $behavior = Import::BEHAVIOR_ADD_UPDATE
    ): Product {
        /** @var Filesystem\Directory\WriteInterface $directory */
        $directory = $this->filesystem
            ->getDirectoryWrite(DirectoryList::ROOT);
        /** @var Csv $source */
        $source = Bootstrap::getObjectManager()->create(
            Csv::class,
            [
                'file' => $pathToFile,
                'directory' => $directory
            ]
        );
        $productImporter = $this->productImporterFactory->create();
        $productImporter->setParameters(
            [
                'behavior' => $behavior,
                'entity' => \Magento\Catalog\Model\Product::ENTITY
            ]
        )->setSource($source);

        return $productImporter;
    }

    /**
     * Cleanup test by removing products.
     *
     * @param string[] $skus
     * @return void
     */
    protected function tearDown(): void
    {
        if (!empty($this->importedProducts)) {
            $objectManager = Bootstrap::getObjectManager();
            /** @var ProductRepositoryInterface $productRepository */
            $productRepository = $objectManager->create(ProductRepositoryInterface::class);
            $registry = $objectManager->get(\Magento\Framework\Registry::class);
            /** @var ProductRepositoryInterface $productRepository */
            $registry->unregister('isSecureArea');
            $registry->register('isSecureArea', true);

            foreach ($this->importedProducts as $sku) {
                try {
                    $productRepository->deleteById($sku);
                } catch (NoSuchEntityException $e) {
                    // product already deleted
                }
            }
            $registry->unregister('isSecureArea');
            $registry->register('isSecureArea', false);
        }
    }
}
