# PHPToJS

PHPToJS's class convert php variable's content to js variable's content preserving javascript expression (like function).

This class is perfect if you were limited by php function `json_encode`, json's validity and/or `JSON.parse` when you have a function.

## Installation
You can clone this git, download the class
```php
include 'PHPToJS.php';
```

Or use Composer :
```json
{
    "require": {
        "ropendev/phptojs": "dev-master"
    }
}
```

## Use

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
echo phpToJS::render($options);
```


## Licence
MIT

## Contributor
* [Robin](http://www.robin-d.fr/)
