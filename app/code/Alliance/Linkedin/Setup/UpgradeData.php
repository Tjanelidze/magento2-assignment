<?php


namespace Alliance\Linkedin\Setup;

use Alliance\Linkedin\Setup\Table;
use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Customer\Setup\CustomerSetupFactory;

class UpgradeData implements UpgradeDataInterface
{

    protected $customerSetupFactory;
    private $attributeSetFactory;

    /**
     * Constructor
     *
     * @param \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory
     * @param AttributeSetFactory $attributeSetFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {

        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();
        /** @var $attributeSet AttributeSet */
        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);



        if (version_compare($context->getVersion(), '1.0.6') < 0) {

            $customerSetup->addAttribute(Customer::ENTITY,'linkedin_profile',	[
                    'type'         => 'varchar', // attribute with varchar type
                    'label'        => 'LinkedIn Profile',
                    'input'        => 'text',  // attribute input field is text
                    'required'     => false,  // field is not required
                    'visible'      => true,
                    'user_defined' => true,
                    'position'     => 999,
                    'sort_order'  => 999,
                    'system'       => 0,
                    'is_used_in_grid' => 1,   //setting grid options
                    'is_visible_in_grid' => 1,
                    'is_filterable_in_grid' => 1,
                    'is_searchable_in_grid' => 1,
                    'unique' => true,
                ]
            );


            $sampleAttribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'linkedin_profile')
                ->addData(
                    [
                        'attribute_set_id' => $attributeSetId,
                        'attribute_group_id' => $attributeGroupId,
                        'used_in_forms' => ['adminhtml_customer','customer_account_edit','customer_account_create'],
                    ]
// more used_in_forms ['adminhtml_checkout','adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_address_edit','customer_register_address']
                );
            $sampleAttribute->save();
        }


    }
}
