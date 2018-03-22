# php-json-object
A php helper to manipulate json objects

## Installation

The installation of this library is made via composer.
Download `composer.phar` from [their website](https://getcomposer.org/download/).
Then add to your composer.json :

```json
	"require": {
		...
		"php-extended/php-json-object": "~3",
		...
	}
```

Then run `php composer.phar update` to install this library.
The autoloading of all classes of this library is made through composer's autoloader.

## Basic Usage

This class is a helper, it is done to be extended. For example, an object that
represents a price with the following information:

```json
{
	"price": "199.99",
	"currency": "USD",
	"date": "2017-07-12 21:21:42"
}
```

This object should be parsed with the native `json_decode` php function, 
and then the returning array should be given to the following class :

```php

use PhpExtended\Json\JsonObject;

class ExamplePrice extends JsonObject
{
	
	/**
	 * 
	 * @var float
	 */
	public $_price = null;
	
	/**
	 *
	 * @var string
	 */
	public $_currency = null;
	
	/**
	 *
	 * @var \DateTime
	 */
	public $_date = null;
	
	public function __construct(array $json, $silent = false)
	{
		// filters all error, status and code attributes for error handling
		$data = parent::__construct($json, $silent);
		
		// then iterates on the remaining elements
		foreach($data as $key => $value)
		{
			switch($key)
			{
				case 'price':
					$this->_price = $this->asFloat($value, $silent);
					break;
				case 'currency':
					$this->_currency = $this->asString($value, $silent);
					break;
				case 'date':
					$this->_date = $this->asDatetime($value, 'Y-m-d H:i:s', $silent);
					break;
				default:
					if(!$silent)
						throw new IllegalArgumentException();
			}
		}
	}
	
}

```

Then this class may be used with the following code :

```php

$json_array = json_decode($json_string, true);		// important to have arrays
$json_object = new ExamplePrice($json_array, true);	// set to false if you want exceptions on errors
echo $json_object->_currency;		// should echo 'USD'
var_dump($json_object->_price);		// should echo float:199.99

```

The `JsonCollection` object is made to handle [{ ... }, { ... }] situations.

In the outer object, you need to handle the key of the json object and then,
create a JsonCollection object with the class name of the object inside the
array.

The `JsonCollection` object may also gather error messages, if the key of
the json that was found contains the word `error`. Those will not throw the
`JsonException` that is thrown when the key values are not
acceptable (i.e. they all must be integers for a collection).

The `JsonObject` object may also gather status codes if they are
provided by the json, on `status` or `code` words, and error messages on
`error` or `message` words. Note that if multiple attributes matches those
words, only the first will be taken by this object, depending on the order of
the attributes which are given into the json.

The `JsonSuccess` object may also gather boolean responses from the server
if they are provided by the json on `success` or `response` words.

The `JsonCount` object may also gather integer responses from the server
if they are provided by the json on `count` or `value` words.


## License

MIT (See [license file](LICENSE)).
