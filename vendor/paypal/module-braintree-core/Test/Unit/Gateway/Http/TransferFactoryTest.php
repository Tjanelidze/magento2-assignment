<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace PayPal\Braintree\Test\Unit\Gateway\Http;

use PayPal\Braintree\Gateway\Http\TransferFactory;
use Magento\Payment\Gateway\Http\TransferBuilder;
use Magento\Payment\Gateway\Http\TransferInterface;

class TransferFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var TransferFactory
     */
    private $transferFactory;

    /**
     * @var TransferFactory
     */
    private $transferMock;

    /**
     * @var TransferBuilder|\PHPUnit\Framework\MockObject\MockObject
     */
    private $transferBuilder;

    protected function setUp(): void
    {
        $this->transferBuilder = $this->createMock(TransferBuilder::class);
        $this->transferMock = $this->createMock(TransferInterface::class);

        $this->transferFactory = new TransferFactory(
            $this->transferBuilder
        );
    }

    public function testCreate()
    {
        $request = ['data1', 'data2'];

        $this->transferBuilder->expects($this->once())
            ->method('setBody')
            ->with($request)
            ->willReturnSelf();

        $this->transferBuilder->expects($this->once())
            ->method('build')
            ->willReturn($this->transferMock);

        $this->assertEquals($this->transferMock, $this->transferFactory->create($request));
    }
}
