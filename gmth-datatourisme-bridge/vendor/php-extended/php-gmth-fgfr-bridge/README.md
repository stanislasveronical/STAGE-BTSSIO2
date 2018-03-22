# php-gmth-fgfr-bridge
A php application wrapper for the gmth.finances.gouv.fr API


## Installation

The installation of this library is made via composer.
Download `composer.phar` from [their website](https://getcomposer.org/download/).
Then add to your composer.json :

```json
	"require": {
		...
		"php-extended/php-gmth-fgfr-api": "~3",
		...
	}
```

Then run `php composer.phar update` to install this library.
The autoloading of all classes of this library is made through composer's autoloader.


## Basic Usage

This library provides one endpoint (`PhpExtended\Gmth\GmthDataRepository`)
to encapsulates the `PhpExtended\Gmth\GmthApiPrivateEndpoint`
from the `php-extended/php-gmth-fgfr-api` library.

From this repository we can use the `PhpExtended\Gmth\GmthBridgeQuery`
object to get an iterator on `PhpExtend\Gmth\GmthDemandeInterface` 
when calling for `queryDemandes()`, or an iterator on 
`PhpExtended\Gmth\GmthEtablissementInterface` when calling for 
`queryEtablissements()`.


## License

MIT (See [license file](LICENSE)).
