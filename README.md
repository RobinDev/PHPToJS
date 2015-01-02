# PHPToJS

PHPToJS's class convert php variable's content to js variable's content preserving javascript expression (like function).

This class is perfect if you were limited by php function `json_encode`, json's validity and/or `JSON.parse` when you have a javascript function.

## Installation

Composer Friendly (via [packagist](https://packagist.org/packages/ropendev/phptojs)):
```json
composer require ropendev/phptojs
```

## Usage

You just need to call static function `\rOpenDev\PHPToJS::render($mixed)`. Example :
```php
use \rOpenDev\PHPToJS;

$options = (object) array(
    'title' => (object) array(
        'label' => 'PHP To JS charts',
        'class' => 'titlechart',
        'formatter' => 'function(s) { return s.replace("-", "/"); }',
    ),
    'data' => array(2014,2013,2012,2011)
);
echo PHPToJS::render($options);
```
Will render :
```
{title:{label:"PHP To JS charts",class:"titlechart",formatter:function(s) { return s.replace("-", "/"); }},data:[2014,2013,2012,2011]}
```

You can use `renderReadable` function which would render :
```
{
	title: {
		label: "PHP To JS charts",
		class: "titlechart",
		formatter: function(s) { return s.replace("-", "/"); }
	},
	data: [
		2014,
		2013,
		2012,
		2011
	]
}
```
**This function is available only in v1.0.0 !**

## Licence
MIT

## Contributors
* [Robin](http://www.robin-d.fr/)
