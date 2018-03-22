# php-gmth-fgfr-interface
A php application wrapper for the gmth.finances.gouv.fr application

## Installation

The installation of this library is made via composer.
Download `composer.phar` from [their website](https://getcomposer.org/download/).
Then add to your composer.json :

```json
	"require": {
		...
		"php-extended/php-gmth-fgfr-interface": "^1.0",
		...
	}
```

Then run `php composer.phar update` to install this library.
The autoloading of all classes of this library is made through composer's autoloader.

## Basic Usage

This is an interface library. An implementation is available at 
[php-extended/php-gmth-fgfr-bridge](https://github.com/php-extended/php-gmth-fgfr-bridge).

## License

MIT (See [license file](LICENSE)).