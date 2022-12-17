<?php

namespace Dotdigitalgroup\Email\Model;

use Dotdigitalgroup\Email\Helper\Data;
use Magento\Store\Model\StoreManagerInterface;
use Dotdigitalgroup\Email\Model\Catalog\UrlFinder;
use Dotdigitalgroup\Email\Logger\Logger;
use Magento\Framework\UrlInterface;

class DummyRecordsData
{
    const PRODUCT_NAME = 'Chaz Kangeroo Hoodie';
    const EMAIL_PROPERTY_NAME = 'MainEmail';

    /**
     * @var Data
     */
    private $helper;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var UrlFinder
     */
    private $urlFinder;

    /**
     * @var string
     */
    private $email;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * DummyRecordsData constructor.
     * @param Data $helper
     * @param StoreManagerInterface $storeManager
     * @param UrlFinder $urlFinder
     * @param Logger $logger
     */
    public function __construct(
        Data $helper,
        StoreManagerInterface $storeManager,
        UrlFinder $urlFinder,
        Logger $logger
    ) {
        $this->helper = $helper;
        $this->storeManager = $storeManager;
        $this->urlFinder = $urlFinder;
        $this->logger = $logger;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getDummyContactData(): array
    {
        $websiteData = [];
        $users = [];
        foreach ($this->storeManager->getWebsites(true) as $website) {
            if (!$this->helper->isEnabled($website->getId()) ||
                isset($websiteData[$website->getId()]) ||
                in_array($this->helper->getApiUsername($website->getId()), $users)
            ) {
                continue;
            }

            $accountInfo = $this->helper->getWebsiteApiClient()->getAccountInfo();

            if (isset($accountInfo->properties)) {
                $emailKey = $this->getEmailKey($accountInfo->properties);
                if (!$emailKey) {
                    $this->logger->debug('Email Info not found for that account');
                    continue;
                }
            } else {
                continue;
            }

            $this->email = $accountInfo->properties[$emailKey]->value;

            $users[] = $this->helper->getApiUsername($website->getId());
            $websiteData[$website->getId()] = [
                    'email' => $this->email
                ];
        }

        return $websiteData;
    }

    /**
     * @param $websiteId
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getContactInsightData($websiteId): array
    {
        $store = $this->getStore($websiteId);
        return $this->getStaticData($store);
    }

    /**
     * @param $websiteId
     * @return \Magento\Store\Api\Data\StoreInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    private function getStore($websiteId)
    {
        foreach ($this->storeManager->getStores(true) as $store) {
            if ($store->getWebsiteId() == $websiteId) {
                return $store;
            }
        }
        return $this->storeManager->getStore();
    }

    /**
     * @param $store
     * @return array
     */
    private function getStaticData($store)
    {
        $data = [
            'key' => '1',
            'contactIdentifier' => $this->email,
            'json' => [
                'cartId' => '1',
                'cartUrl' => $store->getBaseUrl(
                    UrlInterface::URL_TYPE_WEB,
                    $store->isCurrentlySecure()
                ).'connector/email/getbasket/quote_id/1/',
                'createdDate' => date(\Zend_Date::ISO_8601, time()),
                'modifiedDate' => date(\Zend_Date::ISO_8601, time()),
                'currency' => 'USD',
                'subTotal' => round(52, 2),
                'taxAmount' => (float) 0,
                'grandTotal' => round(52, 2)
            ]
        ];

        $lineItems[] = [
            'sku' => 'MH06-M-Blue',
            'imageUrl' => $this->getImageUrl(),
            'productUrl' => $store->getBaseUrl(
                UrlInterface::URL_TYPE_WEB,
                $store->isCurrentlySecure()
            ),
            'name' => self::PRODUCT_NAME,
            'unitPrice' => 0,
            'quantity' => 1,
            'salePrice' => round(52, 2),
            'totalPrice' => round(52, 2)
        ];

        $data['json']['discountAmount'] = 0;
        $data['json']['lineItems'] = $lineItems;
        $data['json']['cartPhase'] = 'ORDER_PENDING';

        return $data;
    }

    /**
     * @return string
     */
    private function getImageUrl()
    {
        return 'https://raw.githubusercontent.com/'
               .'magento/magento2-sample-data/'
               .'2.3/pub/media/catalog/product/m/h/mh01-black_main.jpg';
    }

    /**
     * @param array $properties
     * @return int|string
     */
    private function getEmailKey(array $properties)
    {
        foreach ($properties as $key => $property) {
            if ($property->name === self::EMAIL_PROPERTY_NAME) {
                return $key;
            }
        }
    }
}
