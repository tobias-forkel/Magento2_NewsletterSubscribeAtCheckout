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

use Magento\Quote\Model\QuoteRepository;
use Magento\Checkout\Model\ShippingInformationManagement as ShippingManagement;
use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Forkel\NewsletterSubscribeAtCheckout\Helper\Config as Helper;

class ShippingInformationManagement
{
    /**
     * @var \Magento\Checkout\Api\Data\ShippingInformationExtensionFactory
     */
    protected $_extensionFactory;

    protected $_logger;

    /**
     * @var \Forkel\NewsletterSubscribeAtCheckout\Helper\Config
     */
    protected $_helper;

    /**
     * @var \Magento\Quote\Model\QuoteRepository
     */
    protected $_quoteRepository;

    /**
     * @param \Magento\Quote\Model\QuoteRepository $quoteRepository
     * @param \Forkel\NewsletterSubscribeAtCheckout\Helper\Config $helper
     */
    public function __construct(
        \Magento\Quote\Model\QuoteRepository $quoteRepository,
        \Forkel\NewsletterSubscribeAtCheckout\Helper\Config $helper,
        \Magento\Checkout\Api\Data\ShippingInformationExtensionFactory $extensionFactory,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_quoteRepository = $quoteRepository;
        $this->_helper = $helper;
        $this->_extensionFactory = $extensionFactory;
        $this->_logger = $logger;
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
        if ($this->_helper->getConfig('enabled'))
        {
            $extAttributes = $addressInformation->getExtensionAttributes();
            $newsletterSubscribe = $extAttributes->getNewsletterSubscribe() ? 1 : 0;

            $quote = $this->_quoteRepository->getActive($cartId);
            $quote->setNewsletterSubscribe($newsletterSubscribe);
        }
    }
}