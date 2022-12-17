<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\ThemeSampleData\Setup\Patch\Data;

use Magento\Framework\Setup;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;

/**
 * Class InstallThemeSampleData
 * @package Magento\ThemeSampleData\Setup\Patch\Data
 */
class InstallThemeSampleData implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var Setup\SampleData\Executor
     */
    protected $executor;

    /**
     * @var \Magento\ThemeSampleData\Setup\Installer
     */
    protected $installer;

    /**
     * InstallThemeSampleData constructor.
     * @param Setup\SampleData\Executor $executor
     * @param \Magento\ThemeSampleData\Setup\Installer $installer
     */
    public function __construct(
        Setup\SampleData\Executor $executor,
        \Magento\ThemeSampleData\Setup\Installer $installer
    ) {
        $this->executor = $executor;
        $this->installer = $installer;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->executor->exec($this->installer);
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '2.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
