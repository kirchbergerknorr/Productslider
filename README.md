Kirchbergerknorr Productslider
=================================

Productslider module is designed to add a slider to the cart with defined category products.

Installation
------------

1. Add `require` and `repositories` sections to your composer.json as shown in example below and run `composer update`.
2. Configure options in in System -> Configuration -> Kirchbergerknorr -> Productslider. 
3. Activate logs and module.

*composer.json example*

```
{
    ...
    
    "repositories": [
        {"type": "git", "url": "https://github.com/kirchbergerknorr/Productslider"},
    ],
    
    "require": {
        "kirchbergerknorr/productslider": "*"
    },
    
    ...
}
```

Usage
-----

*Configure the extension in magento backend
*Call <?php echo $this->getChildHtml('kk_productslider');?> in cart.phtml


Support
-------

Please [report new bugs](https://github.com/kirchbergerknorr/Productslider/issues/new).