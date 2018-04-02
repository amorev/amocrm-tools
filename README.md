AmoCRM Wrapper
==============
Making work with amocrm testable and usable

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist zvinger/amocrm-tools "*"
```

or add

```
"zvinger/amocrm-tools": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \Zvinger\AmoCRMTools\AutoloadExample::widget(); ?>```