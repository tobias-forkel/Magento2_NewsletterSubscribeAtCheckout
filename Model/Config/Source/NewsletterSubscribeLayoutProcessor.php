<?php
/**
 * Forkel NewsletterSubscriptionAtCheckout
 *
 * @category    Forkel
 * @package     Forkel_NewsletterSubscriptionAtCheckout
 * @copyright   Copyright (c) 2017 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Forkel\NewsletterSubscribeAtCheckout\Model\Config\Source;

use Forkel\NewsletterSubscribeAtCheckout\Helper\Config as Helper;

/**
 * Class NewsletterSubscribeLayoutProcessor
 */
class NewsletterSubscribeLayoutProcessor
{
    /**
     * @var \Forkel\NewsletterSubscribeAtCheckout\Helper\Config
     */
    protected $_helper;

    /**
     * @param \Forkel\NewsletterSubscribeAtCheckout\Helper\Config $helper
     */
    public function __construct(Helper $helper)
    {
        $this->_helper = $helper;
    }

    /**
     * {@inheritdoc}
     */
    public function process($jsLayout)
    {
        $enabled = ($this->_helper->getConfig('enabled')) ? 1 : 0;
        $checked = ($this->_helper->getConfig('checked')) ? 1 : 0;
        $label = $this->_helper->getConfig('label');
        $note_enabled = $this->_helper->getConfig('note_enabled');
        $note = $this->_helper->getConfig('note');

        $config = [
            'customer-email' => [
                'children' => [
                    'newsletter_subscribe' => [
                        'config' => [
                            'enabled' => $enabled,
                            'checked' => $checked,
                            'label' => $label,
                            'note_enabled' => $note_enabled,
                            'note' => $note
                        ]
                    ]
                ]
            ]
        ];

        $updateLayout = [
            'components' => [
                'checkout' => [
                    'children' => [
                        'steps' => [
                            'children' => [
                                'billing-step' => [
                                    'children' => [
                                        'payment' => [
                                            'children' => $config
                                        ]
                                    ]
                                ],
                                'shipping-step' => [
                                    'children' => [
                                        'shippingAddress' => [
                                            'children' => $config
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        // Merge updated layout with existing one
        return array_merge_recursive($jsLayout, $updateLayout);
    }
}