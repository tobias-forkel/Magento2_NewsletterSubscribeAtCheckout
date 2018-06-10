<?php
/**
 * Forkel NewsletterSubscriptionAtCheckout
 *
 * @category    Forkel
 * @package     Forkel_NewsletterSubscriptionAtCheckout
 * @copyright   Copyright (c) 2017 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Forkel\NewsletterSubscribeAtCheckout\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Forkel\NewsletterSubscribeAtCheckout\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();
        $installer->getConnection()->addColumn(
            $installer->getTable('quote'),
            'newsletter_subscribe',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                'unsigned' => true,
                'nullable' => false,
                'default' => 0,
                'comment' => 'Newsletter Subscribe At Checkout'
            ]
        );

        $installer->endSetup();
    }
}
