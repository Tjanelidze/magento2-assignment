<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\AdobeStockImageAdminUi\Controller\Adminhtml\Preview;

use Magento\AdobeStockAssetApi\Api\GetAssetByIdInterface;
use Magento\AdobeStockImageApi\Api\SaveImageInterface;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\AuthenticationException;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;

/**
 * Controller for downloading the Adobe Stock asset preview by the id
 */
class Download extends Action implements HttpPostActionInterface
{
    private const HTTP_OK = 200;
    private const HTTP_BAD_REQUEST = 400;
    private const HTTP_INTERNAL_ERROR = 500;
    private const IMAGE_URL_FIELD = 'thumbnail_500_url';

    /**
     * @see _isAllowed()
     */
    public const ADMIN_RESOURCE = 'Magento_AdobeStockImageAdminUi::save_preview_images';

    /**
     * @var GetAssetByIdInterface
     */
    private $getAssetById;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var SaveImageInterface
     */
    private $saveImage;

    /**
     * @param Action\Context $context
     * @param SaveImageInterface $save
     * @param LoggerInterface $logger
     * @param GetAssetByIdInterface $getAssetById
     */
    public function __construct(
        Action\Context $context,
        SaveImageInterface $save,
        LoggerInterface $logger,
        GetAssetByIdInterface $getAssetById
    ) {
        parent::__construct($context);

        $this->saveImage = $save;
        $this->getAssetById = $getAssetById;
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        try {
            $params = $this->getRequest()->getParams();

            $document = $this->getAssetById->execute((int) $params['media_id']);

            $this->saveImage->execute(
                $document,
                $document->getCustomAttribute(self::IMAGE_URL_FIELD)->getValue(),
                (string) $params['destination_path']
            );

            $responseCode = self::HTTP_OK;
            $responseContent = [
                'success' => true,
                'message' => __('You have successfully downloaded the image.'),
            ];
        } catch (AuthenticationException $exception) {
            $responseCode = self::HTTP_BAD_REQUEST;
            $responseContent = [
                'success' => false,
                'message' => __(
                    'Failed to authenticate to Adobe Stock API. <br> Please correct the API credentials in '
                    . '<a href="%url">Configuration → System → Adobe Stock Integration.</a>',
                    [
                        'url' => $this->getUrl(
                            'adminhtml/system_config/edit',
                            [
                                'section' => 'system',
                                '_fragment' => 'system_adobe_stock_integration-link'
                            ]
                        )
                    ]
                ),
            ];
        } catch (LocalizedException $exception) {
            $responseCode = self::HTTP_BAD_REQUEST;
            $responseContent = [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        } catch (\Exception $exception) {
            $responseCode = self::HTTP_INTERNAL_ERROR;
            $this->logger->critical($exception);
            $responseContent = [
                'success' => false,
                'message' => __('An error occurred on attempt to save the image.'),
            ];
        }

        /** @var Json $resultJson */
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setHttpResponseCode($responseCode);
        $resultJson->setData($responseContent);

        return $resultJson;
    }
}
