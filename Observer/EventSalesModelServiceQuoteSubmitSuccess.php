<?php
/**
 * Forkel NewsletterSubscriptionAtCheckout
 *
 * @category    Forkel
 * @package     Forkel_NewsletterSubscriptionAtCheckout
 * @copyright   Copyright (c) 2017 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Forkel\NewsletterSubscribeAtCheckout\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Newsletter\Model\Subscriber as Subscriber;
use Forkel\NewsletterSubscribeAtCheckout\Helper\Config as Helper;

class EventSalesModelServiceQuoteSubmitSuccess implements ObserverInterface
{
    /**
     * @var \Magento\Newsletter\Model\Subscriber
     */
    protected $_subscriber;

    /**
     * @var \Forkel\NewsletterSubscribeAtCheckout\Helper\Config
     */
    protected $_helper;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $_logger;

    /**
     * @param Subscriber $subscriber
     * @param Helper $helper
     */
    public function __construct(
        Subscriber $subscriber,
        Helper $helper,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_subscriber = $subscriber;
        $this->_helper = $helper;
        $this->_logger = $logger;
    }

    /**
     * Subscribe to newsletters if customer checked the checkbox
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return boolean|$this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // Check if feature is disabled
        if (!$this->_helper->getConfig('enabled'))
        {
            return;
        }

        $quote = $observer->getQuote();

        // Get newsletter subscription flag from quote
        if ($quote->getNewsletterSubscribe())
        {
            try {

                $email = $quote->getCustomerEmail();
                $this->_subscriber->subscribe($email);

            } catch (\Exception $e) {
                $this->_logger->error($e->getMessage());
            }
        }
        
        return $this;
    }
}