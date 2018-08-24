```
NOTE: This repository has moved to https://github.com/magenizr/Magenizr_NewsletterSubscribeAtCheckout and will be continued there.
```

# Magento2 NewsletterSubscribeAtCheckout
This Magento 2 module allows you to enable a newsletter subscription checkbox on the checkout page. Customers can subscribe to your newsletter list in `Marketing > Communications > Newsletter Subscribers` during checkout.

![Magento2 NewsletterSubscribeAtCheckout - Intro](http://www.tobiasforkel.de/public/magento/forkel_newslettersubscribeatcheckout/2/version/1.0.0/screenshots/github/intro.gif)

![Magento2 NewsletterSubscribeAtCheckout - Frontend - Checkout](http://www.tobiasforkel.de/public/magento/forkel_newslettersubscribeatcheckout/2/version/1.0.0/screenshots/github/frontend/checkout.gif)

![Magento2 NewsletterSubscribeAtCheckout - Backend - Configuration](http://www.tobiasforkel.de/public/magento/forkel_newslettersubscribeatcheckout/2/version/1.0.0/screenshots/github/backend/config.gif)

![Magento2 NewsletterSubscribeAtCheckout - Backend - Newsletter](http://www.tobiasforkel.de/public/magento/forkel_newslettersubscribeatcheckout/2/version/1.0.0/screenshots/github/backend/subscription.gif)

## Installation (Composer)

1. Add this extension to your repository `composer config repositories.tobias-forkel/magento2-newsletter-subscribe-at-checkout vcs https://github.com/tobias-forkel/Magento2_NewsletterSubscribeAtCheckout.git`
2. Update your composer.json `composer require "tobias-forkel/magento2-newsletter-subscribe-at-checkout":"1.0.3"`

```
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)              
Package operations: 1 install, 0 updates, 0 removals
  - Installing tobias-forkel/magento2-newsletter-subscribe-at-checkout (1.0.3): Downloading (100%)         
Writing lock file
Generating autoload files
```

3. Enable the module and clear static content.

```
php bin/magento module:enable Forkel_NewsletterSubscribeAtCheckout --clear-static-content
php bin/magento setup:upgrade
```

## Installation (Manually)
1. Pull the code.
2. Copy the code in `./app/code/Forkel/NewsletterSubscribeAtCheckout/`.
3. Enable the module and clear static content.

```
php bin/magento module:enable Forkel_NewsletterSubscribeAtCheckout --clear-static-content
php bin/magento setup:upgrade
```

## Features
* The option `Checked` allows you to pre-tick the newsletter checkbox. Default is `No`.
* The text field `Label` allows you to display a custom label.
* With the option `Note` you can display a custom text right below the newsletter subscription.

## Usage
The functionality can be used in the backend section `Stores > Configuration > Sales > Checkout > Newsletter Subscribe At Checkout`.

## Support
If you have any issues with this extension, open an issue on [Github](https://github.com/tobias-forkel/Magento2_NewsletterSubscribeAtCheckout/issues). For a custom build, please contact me on http://www.tobiasforkel.de.

## Contributing
1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`.
3. Commit your changes: `git commit -am 'Add some feature'`.
4. Push to the branch: `git push origin my-new-feature`.
5. Submit a pull request.

Follow me on [GitHub](https://github.com/tobias-forkel) and [Twitter](https://twitter.com/tobiasforkel).

## History
===== 1.0.3 =====
* Option `Enable Note` had no effect. [[#4](https://github.com/tobias-forkel/Magento2_NewsletterSubscribeAtCheckout/pull/4)] [[pooshok](https://github.com/pooshok)]
* Code Cleanup.
* Added `<depends>` in system.xml to hide all fields in `Stores > Configuration > Sales > Checkout > Newsletter Subscribe At Checkout` unless you enable the module.

===== 1.0.2 =====
* Updated composer require. [[#1](https://github.com/tobias-forkel/Magento2_NewsletterSubscribeAtCheckout/pull/1)] [[Rakhal](https://github.com/rakibabu)]
* Removed ifconfig from referenceBlock for 2.2.x compatibility. [[#1](https://github.com/tobias-forkel/Magento2_NewsletterSubscribeAtCheckout/pull/1)] [[Rakhal](https://github.com/rakibabu)]

===== 1.0.1 =====
* Variable note didn't exist when note was disabled.

===== 1.0.0 =====
* Stable version of this module.

## License
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)
