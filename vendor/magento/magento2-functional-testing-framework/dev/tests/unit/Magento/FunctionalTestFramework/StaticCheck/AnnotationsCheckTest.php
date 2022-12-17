<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace tests\unit\Magento\FunctionalTestFramework\StaticCheck;

use AspectMock\Test as AspectMock;
use Magento\FunctionalTestingFramework\StaticCheck\AnnotationsCheck;
use Magento\FunctionalTestingFramework\Test\Objects\TestObject;
use tests\unit\Util\MagentoTestCase;
use ReflectionClass;

class AnnotationsCheckTest extends MagentoTestCase
{
    /** @var  AnnotationsCheck */
    private $staticCheck;

    /** @var ReflectionClass*/
    private $staticCheckClass;

    public function setUp(): void
    {
        $this->staticCheck = new AnnotationsCheck();
        $this->staticCheckClass = new \ReflectionClass($this->staticCheck);
    }

    public function tearDown(): void
    {
        AspectMock::clean();
    }

    public function testValidateRequiredAnnotationsNoError()
    {
        $annotations = [
            'features' => [
                0 => 'feature1'
            ],
            'stories' => [
                0 => 'story1'
            ],
            'description' => [
                'main' => 'description1',
                'test_files' => 'file1',
                'deprecated' => [
                    0 => 'deprecated1'
                ]
            ],
            'severity' => [
                0 => 'severity1'
            ],
            'title' => [
                0 => '[NO TESTCASEID]: title1'
            ],
        ];
        $expected = [];

        // mock test object
        $test = AspectMock::double(
            TestObject::class,
            ['getAnnotations' => $annotations, 'getName' => 'AnnotationsCheckTest']
        )->make();

        $validateRequiredAnnotations = $this->staticCheckClass->getMethod('validateRequiredAnnotations');
        $validateRequiredAnnotations->setAccessible(true);

        $validateRequiredAnnotations->invoke($this->staticCheck, $test);
        $this->assertEquals($expected, $this->staticCheck->getErrors());
    }

    public function testValidateRequiredAnnotationsMissing()
    {
        $testCaseId = 'MC-12345';

        $annotations = [
            'features' => [
                0 => 'feature1'
            ],
            'stories' => [
                0 => 'story1'
            ],
            'description' => [
                'test_files' => 'file1',
                'deprecated' => [
                    0 => 'deprecated1'
                ]
            ],
            'title' => [
                0 => $testCaseId . ': title1'
            ],
            'testCaseId' => [
                0 => $testCaseId
            ]
        ];
        $expected = [
            0 => [
                0 => 'Test AnnotationsCheckTest is missing the required annotations: description, severity'
            ]
        ];

        // mock test object
        $test = AspectMock::double(
            TestObject::class,
            ['getAnnotations' => $annotations, 'getName' => 'AnnotationsCheckTest']
        )->make();

        $validateRequiredAnnotations = $this->staticCheckClass->getMethod('validateRequiredAnnotations');
        $validateRequiredAnnotations->setAccessible(true);

        $validateRequiredAnnotations->invoke($this->staticCheck, $test);
        $this->assertEquals($expected, $this->staticCheck->getErrors());
    }

    public function testValidateRequiredAnnotationsMissingNoTestCaseId()
    {
        $annotations = [
            'features' => [
                0 => 'feature1'
            ],
            'stories' => [
                0 => 'story1'
            ],
            'description' => [
                'test_files' => 'file1',
                'deprecated' => [
                    0 => 'deprecated1'
                ]
            ],
            'title' => [
                0 => "[NO TESTCASEID]: \t"
            ],
        ];
        $expected = [
            0 => [
                0 => 'Test AnnotationsCheckTest is missing the required annotations: title, description, severity'
            ]
        ];

        // mock test object
        $test = AspectMock::double(
            TestObject::class,
            ['getAnnotations' => $annotations, 'getName' => 'AnnotationsCheckTest']
        )->make();

        $validateRequiredAnnotations = $this->staticCheckClass->getMethod('validateRequiredAnnotations');
        $validateRequiredAnnotations->setAccessible(true);

        $validateRequiredAnnotations->invoke($this->staticCheck, $test);
        $this->assertEquals($expected, $this->staticCheck->getErrors());
    }

    public function testValidateRequiredAnnotationsEmpty()
    {
        $annotations = [
            'features' => [
                0 => 'feature1'
            ],
            'stories' => [
                0 => 'story1'
            ],
            'description' => [
                'main' => 'description1',
                'test_files' => 'file1',
                'deprecated' => [
                    0 => 'deprecated1'
                ]
            ],
            'severity' => [
                0 => 'severity1'
            ],
            'title' => [
                0 => ''
            ],
        ];
        $expected = [
            0 => [
                0 => 'Test AnnotationsCheckTest is missing the required annotations: title'
            ]
        ];

        // mock test object
        $test = AspectMock::double(
            TestObject::class,
            ['getAnnotations' => $annotations, 'getName' => 'AnnotationsCheckTest']
        )->make();

        $validateRequiredAnnotations = $this->staticCheckClass->getMethod('validateRequiredAnnotations');
        $validateRequiredAnnotations->setAccessible(true);

        $validateRequiredAnnotations->invoke($this->staticCheck, $test);
        $this->assertEquals($expected, $this->staticCheck->getErrors());
    }
}
