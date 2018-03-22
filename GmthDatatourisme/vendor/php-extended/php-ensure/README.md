# php-ensure
A library to safely convert pointers to the right data type

## Installation

The installation of this library is made via composer.
Download `composer.phar` from [their website](https://getcomposer.org/download/).
Then add to your composer.json :

```json
	"require": {
		...
		"php-extended/php-ensure": "~2",
		...
	}
```

Then run `php composer.phar update` to install this library.
The autoloading of all classes of this library is made through composer's autoloader.

## Basic Usage

This class provides multiple methods `isSomething` to ensure that the given
data is with the right type. Those method, on silent mode will try to convert
the give value to the appropriate type, and if they cannot, throw an exception.
On normal mode, they will throw an exception if the value is not of the right
type.

Note that those methods allow null as any type except boolean (which is always
converted to false).

## License

MIT (See [license file](LICENSE)).