# php-inspect
A library to tell what is that variable, safely.

## Installation

The installation of this library is made via composer.
Download `composer.phar` from [their website](https://getcomposer.org/download/).
Then add to your composer.json :

```json
	"require": {
		...
		"php-extended/php-inspect": "^1.0",
		...
	}
```

Then run `php composer.phar update` to install this library.
The autoloading of all classes of this library is made through composer's autoloader.

## Basic Usage

In your code (for example, when trying to use a variable in an exception):

```php 

use PhpExtended\Inspect\Inspector;

if(!'<condition not satisfied with $myVar >')
{
	throw new Exception(strtr(
		'The given variable "myVar" is not an object, it\'s a {thing}.',
		array('{thing}' => Inspector::inspect($myVar))
	));
}

```

The expected results are the following :

```php

use PhpExtended\Inspect\Inspector;

echo Inspector::inspect(null); 					// echo 'null'
echo Inspector::inspect(false); 				// echo 'boolean'
echo Inspector::inspect('myvar');				// echo 'string'
echo Inspector::inspect(1);						// echo 'integer'
echo Inspector::inspect(1.5);					// echo 'float'
echo Inspector::inspect(new stdClass()); 		// echo 'object(stdClass)'
echo Inspector::inspect(fopen(__FILE__, 'r'));	// echo 'resource(stream)'
echo Inspector::inspect(array(1)); 				// echo 'array(integer)'
echo Inspector::inspect(array(1.5));			// echo 'array(float)'
echo Inspector::inspect(array(1, 1.5));			// echo 'array(integer,float)'
echo Inspector::inspect(array(1, 2, 3));		// echo 'array(integer)'
echo Inspector::inspect(array(new stdClass()));	// echo 'array(object(stdClass))'
echo Inspector::inspect(array(array(1)));		// echo 'array(array(integer))'

```

## License

MIT (See [license file](LICENSE)).
