<?php

namespace Dotdigitalgroup\Email\Model\Sync;

use Dotdigitalgroup\Email\Model\Apiconnector\CustomerDataFieldProvider;
use Dotdigitalgroup\Email\Model\Apiconnector\CustomerDataFieldProviderFactory;

if (!class_exists('\Magento\Catalog\Api\Data\ProductExtensionInterfaceFactory')) {
    require __DIR__ . '/../_files/product_extension_interface_hacktory.php';
}

/**
 * @magentoDataFixture Magento/Store/_files/website.php
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ContactSyncTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    public $objectManager;

    /**
     * @var string
     */
    public $storeId;

    /**
     * @var \Dotdigitalgroup\Email\Model\ResourceModel\Importer\Collection
     */
    public $importerCollection;

    /**
     * @return void
     */
    public function setup() :void
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->importerCollection = $this->objectManager->create(
            \Dotdigitalgroup\Email\Model\ResourceModel\Importer\Collection::class
        );
    }

    /**
     * Run the preparation for the test with already existing data.
     * @return array
     */
    public function prep()
    {
        /** @var  \Magento\Store\Model\Store $store */
        $store = $this->objectManager->create(\Magento\Store\Model\Store::class);
        $store->load(1);
        //load store with the code rather than id: $store->load('test', 'code')

        $helper = $this->getMockbuilder(\Dotdigitalgroup\Email\Helper\Data::class)
            ->disableOriginalConstructor()
            ->getMock();
        $helper->method('isEnabled')->willReturn(true);
        $helper->method('isCustomerSyncEnabled')->willReturn(true);
        $helper->method('getCustomerAddressBook')->willReturn('12345');
        $helper->method('getWebsites')->willReturn([$store->getWebsite()]);
        $helper->method('getApiUsername')->willReturn('apiuser-dummy@apiconnector.com');
        $helper->method('getApiPassword')->willReturn('dummypass');
        $helper->method('getCustomAttributes')->willReturn([]);

        $customerDataFieldProviderMock = $this->createMock(CustomerDataFieldProvider::class);
        $customerDataFieldProviderFactoryMock = $this->createMock(CustomerDataFieldProviderFactory::class);
        $customerDataFieldProviderFactoryMock->method('create')
            ->willReturn($customerDataFieldProviderMock);

        $customerDataFieldProviderMock->method('getCustomerDataFields')
            ->willReturn($this->getHashedDataFields());

        $apiconnectorContact = new \Dotdigitalgroup\Email\Model\Apiconnector\Contact(
            $this->objectManager->create(\Dotdigitalgroup\Email\Model\Apiconnector\CustomerFactory::class),
            $this->objectManager->create(\Dotdigitalgroup\Email\Helper\File::class),
            $helper,
            $this->objectManager->create(\Dotdigitalgroup\Email\Model\ResourceModel\Contact::class),
            $this->objectManager->create(\Dotdigitalgroup\Email\Model\Apiconnector\ContactImportQueueExport::class),
            $this->objectManager->create(\Dotdigitalgroup\Email\Model\ResourceModel\Contact\CollectionFactory::class),
            $customerDataFieldProviderFactoryMock
        );

        return $apiconnectorContact->sync();
    }

    /**
     * Test the bulk imports with the consent data.
     *
     * @magentoDataFixture Magento/Customer/_files/two_customers.php
     * @magentoConfigFixture default_store sync_settings/sync/customer_enabled 1
     * @magentoConfigFixture default_store connector_api_credentials/api/enabled 1
     */
    public function testContactBulkImportCreated()
    {
        $this->createSingleModifiedContact();
        $this->prep();

        $item = $this->importerCollection
            ->addFieldToFilter('import_type', \Dotdigitalgroup\Email\Model\Importer::IMPORT_TYPE_CONTACT)
            ->addFieldToFilter('import_mode', \Dotdigitalgroup\Email\Model\Importer::MODE_BULK)
            ->getFirstItem();

        $this->assertEquals(
            \Dotdigitalgroup\Email\Model\Importer::IMPORT_TYPE_CONTACT,
            $item->getImportType(),
            'Item is not type of contact'
        );
        $this->assertEquals(
            \Dotdigitalgroup\Email\Model\Importer::MODE_BULK,
            $item->getImportMode(),
            'Item is not in bulk mode'
        );
    }

    /**
     *
     *
     * @magentoDataFixture Magento/Customer/_files/two_customers.php
     * @magentoConfigFixture default_store sync_settings/sync/customer_enabled 1
     * @magentoConfigFixture default_store connector_api_credentials/api/enabled 1
     */
    public function testContactWithConsentDataCreated()
    {
        $this->createSingleModifiedContact();
        $this->prep();

        $item = $this->importerCollection
            ->addFieldToFilter('import_type', \Dotdigitalgroup\Email\Model\Importer::IMPORT_TYPE_CONTACT)
            ->addFieldToFilter('import_mode', \Dotdigitalgroup\Email\Model\Importer::MODE_BULK)
            ->getFirstItem();

        $this->assertEquals(
            \Dotdigitalgroup\Email\Model\Importer::IMPORT_TYPE_CONTACT,
            $item->getImportType(),
            'Item is not type of contact'
        );
        $this->assertEquals(
            \Dotdigitalgroup\Email\Model\Importer::MODE_BULK,
            $item->getImportMode(),
            'Item is not in bulk mode'
        );
    }

    /**
     * Create customer and contact with dummy info.
     */
    public function createSingleModifiedContact()
    {
        $customerCollection = $this->objectManager->create(
            \Magento\Customer\Model\ResourceModel\Customer\Collection::class
        );
        $customer = $customerCollection->getFirstItem();
        $this->storeId = $customer->getStoreId();

        $emailContact = $this->objectManager->create(\Dotdigitalgroup\Email\Model\Contact::class)
            ->setCustomerId($customer->getId())
            ->setWebsiteId($customer->getWebsiteId())
            ->setStoreId($customer->getStoreId())
            ->setEmail($customer->getEmail())
            ->setEmailImported(0);

        $emailContact->save();
    }

    private function getHashedDataFields()
    {
        return [
            'customer_id' => "CUSTOMER_ID",
            'firstname' => "FIRSTNAME",
            'lastname' => "LASTNAME",
            'consent_text' => "CONSENTTEXT",
            'consent_url' => "CONSENTURL",
            'consent_datetime' => "CONSENTDATETIME",
            'consent_ip' => "CONSENTIP",
            'consent_user_agent' => "CONSENTUSERAGENT"
        ];
    }
}
