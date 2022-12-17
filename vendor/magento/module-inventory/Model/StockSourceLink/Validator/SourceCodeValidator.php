<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Inventory\Model\StockSourceLink\Validator;

use Magento\Framework\Validation\ValidationResult;
use Magento\Framework\Validation\ValidationResultFactory;
use Magento\Inventory\Model\Validators\NotAnEmptyString;
use Magento\Inventory\Model\Validators\NoWhitespaceInString;
use Magento\InventoryApi\Api\Data\StockSourceLinkInterface;
use Magento\InventoryApi\Model\StockSourceLinkValidatorInterface;

/**
 * Check that source code is valid
 */
class SourceCodeValidator implements StockSourceLinkValidatorInterface
{
    /**
     * @var ValidationResultFactory
     */
    private $validationResultFactory;

    /**
     * @var NotAnEmptyString
     */
    private $notAnEmptyString;

    /**
     * @var NoWhitespaceInString
     */
    private $noWhitespaceInString;

    /**
     * @param ValidationResultFactory $validationResultFactory
     * @param NotAnEmptyString $notAnEmptyString
     * @param NoWhitespaceInString $noWhitespaceInString
     */
    public function __construct(
        ValidationResultFactory $validationResultFactory,
        NotAnEmptyString $notAnEmptyString,
        NoWhitespaceInString $noWhitespaceInString
    ) {
        $this->validationResultFactory = $validationResultFactory;
        $this->notAnEmptyString = $notAnEmptyString;
        $this->noWhitespaceInString = $noWhitespaceInString;
    }

    /**
     * @inheritdoc
     */
    public function validate(StockSourceLinkInterface $link): ValidationResult
    {
        $value = (string)$link->getSourceCode();
        $errors = [
            $this->notAnEmptyString->execute(StockSourceLinkInterface::SOURCE_CODE, $value),
            $this->noWhitespaceInString->execute(StockSourceLinkInterface::SOURCE_CODE, $value)
        ];
        $errors = !empty($errors) ? array_merge(...$errors) : $errors;

        return $this->validationResultFactory->create(['errors' => $errors]);
    }
}
