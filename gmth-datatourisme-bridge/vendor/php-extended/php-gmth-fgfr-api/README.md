# php-gmth-fgfr-api
A php API wrapper to connect to gmth.finances.gouv.fr instances


## Installation

The installation of this library is made via composer.
Download `composer.phar` from [their website](https://getcomposer.org/download/).
Then add to your composer.json :

```json
	"require": {
		...
		"php-extended/php-gmth-fgfr-api": "~1",
		...
	}
```

Then run `php composer.phar update` to install this library.
The autoloading of all classes of this library is made through composer's autoloader.


## Basic Usage

There is two endpoints to use this api.

The first one is the `GmthApiPrivateEndpoint` which refers to the main application
and uses the application's servers to get the json documents. This endpoint
should have low memory footprint if you use iterators instead of collections
of objects.

The second one is the `GmthApiDumpEndpoint` which refers to files that are created
in case of emergencies. As this endpoint gets its output data in one json 
decoding pass, this may use a lot of memory before being to access the stored
objects. 


## License

MIT (See [license file](LICENSE)).
