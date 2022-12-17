<?php

namespace Dotdigitalgroup\Email\Test\Unit\Model\Catalog;

use PHPUnit\Framework\TestCase;
use Magento\Catalog\Model\Product;
use Dotdigitalgroup\Email\Model\Product\ParentFinder;
use Dotdigitalgroup\Email\Model\ResourceModel\Catalog;
use Dotdigitalgroup\Email\Model\CatalogFactory;
use Dotdigitalgroup\Email\Model\Catalog\UpdateCatalog as Update;
use Dotdigitalgroup\Email\Model\Catalog as ModelCatalog;

class UpdateCatalogTest extends TestCase
{

    /**
     * @var Catalog
     */
    private $catalogResourceMock;

    /**
     * @var CatalogFactory
     */
    private $catalogFactoryMock;

    /**
     * @var Update
     */
    private $updateCatalog;

    /**
     * @var ModelCatalog
     */
    private $catalogMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $parentFinderMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $productMock;

    protected function setUp() :void
    {
        $this->productMock = $this->createMock(Product::class);
        $this->catalogResourceMock = $this->createMock(Catalog::class);
        $this->catalogFactoryMock = $this->createMock(CatalogFactory::class);
        $this->catalogMock = $this->getMockBuilder(ModelCatalog::class)
            ->setMethods(['loadProductById', 'getId', 'getProcessed', 'setProductId'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->parentFinderMock = $this->createMock(ParentFinder::class);
        $this->updateCatalog = new Update(
            $this->catalogResourceMock,
            $this->catalogFactoryMock,
            $this->parentFinderMock
        );
    }

    public function testThatIfProductExistsNewEntryNeverCreated()
    {
        $this->catalogFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->catalogMock);

        $this->catalogMock->expects($this->once())
            ->method('loadProductById')
            ->willReturn($this->catalogMock);

        $this->catalogMock->expects($this->once())
            ->method('getId')
            ->willReturn(2455);

        $this->catalogMock->expects($this->never())
            ->method('setProductId');

        $this->productMock->expects($this->once())
            ->method('getData')
            ->willReturn($toUpdate = [
                'entity_id' => 54
            ]);

        $this->parentFinderMock->expects($this->once())
            ->method('getConfigurableParentsFromBunchOfProducts')
            ->willReturn([]);

        $this->catalogResourceMock->expects($this->once())
            ->method('setUnprocessedByIds');

        $this->updateCatalog->execute($this->productMock);
    }

    public function testIfProductNotExistsNewEntryCreated()
    {
        $this->catalogFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->catalogMock);

        $this->catalogMock->expects($this->once())
            ->method('loadProductById')
            ->willReturn($this->catalogMock);

        $this->catalogMock->expects($this->once())
            ->method('getId')
            ->willReturn(null);

        $this->catalogMock->expects($this->once())
            ->method('setProductId');

        $this->updateCatalog->execute($this->productMock);
    }
}
