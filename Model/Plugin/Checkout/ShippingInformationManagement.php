<?php
/**
 * Forkel NewsletterSubscriptionAtCheckout
 *
 * @category    Forkel
 * @package     Forkel_NewsletterSubscriptionAtCheckout
 * @copyright   Copyright (c) 2017 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Forkel\NewsletterSubscribeAtCheckout\Model\Plugin\Checkout;

use Magento\Quote\Model\QuoteRepository as QuoteRepository;
use Magento\Checkout\Api\Data\ShippingInformationInterface as ShippingInformationInterface;
use Forkel\NewsletterSubscribeAtCheckout\Helper\Data as Helper;

/**
 * Class ShippingInformationManagement
 * @package Forkel\NewsletterSubscribeAtCheckout\Model\Plugin\Checkout
 */
class ShippingInformationManagement
{
    /**
     * @var QuoteRepository
     */
    private $quoteRepository;

    /**
     * @var ShippingInformationInterface
     */
    private $extensionFactory;

    /**
     * @var Helper
     */
    private $helper;

    /**
     * ShippingInformationManagement constructor.
     * @param QuoteRepository $quoteRepository
     * @param Helper $helper
     * @param ShippingInformationInterface $extensionFactory
     */
    public function __construct(
        QuoteRepository $quoteRepository,
        Helper $helper,
        ShippingInformationInterface $extensionFactory
    ) {
        $this->quoteRepository = $quoteRepository;
        $this->helper = $helper;
        $this->extensionFactory = $extensionFactory;
    }

    /**
     * @param \Magento\Checkout\Model\ShippingInformationManagement $subject
     * @param $cartId
     * @param \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
     */
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    ) {

        // Check if feature is enabled
        if ($this->helper->getConfig('enabled')) {
            $extAttributes = $addressInformation->getExtensionAttributes();
            $newsletterSubscribe = $extAttributes->getNewsletterSubscribe() ? 1 : 0;

            $quote = $this->quoteRepository->getActive($cartId);
            $quote->setNewsletterSubscribe($newsletterSubscribe);
        }
    }
}
