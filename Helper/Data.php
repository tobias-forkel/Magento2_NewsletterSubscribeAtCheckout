<?php
/**
 * Forkel NewsletterSubscriptionAtCheckout
 *
 * @category    Forkel
 * @package     Forkel_NewsletterSubscriptionAtCheckout
 * @copyright   Copyright (c) 2017 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Forkel\NewsletterSubscribeAtCheckout\Helper;

/**
 * Class Data
 * @package Forkel\NewsletterSubscribeAtCheckout\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var string
     */
    private $tab = 'checkout';

    /**
     * Get module configuration values from core_config_data
     *
     * @param $setting
     * @return mixed
     */
    public function getConfig($setting)
    {
        return $this->scopeConfig->getValue(
            $this->tab . '/forkel_newslettersubscribeatcheckout/' . $setting,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
