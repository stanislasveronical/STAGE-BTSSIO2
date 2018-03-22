<?php

/**
 * This script is to test the bridge to the private endpoint
 * 
 * Usage :
 * ---- for references ----
 * php test.php <username> <password> getActivites
 * php test.php <username> <password> getAvissDecision
 * php test.php <username> <password> getCategories
 * php test.php <username> <password> getCivilites
 * php test.php <username> <password> getCommunes
 * php test.php <username> <password> getDepartements
 * php test.php <username> <password> getEtats
 * php test.php <username> <password> getGrillesCandidature
 * php test.php <username> <password> getGrillesEvaluation
 * php test.php <username> <password> getRegions
 * php test.php <username> <password> getTypesClassement
 * php test.php <username> <password> getTypesDemande
 * php test.php <username> <password> getTypesPieceJointe
 * 
 * ---- for specifics ----
 * 
 * php test.php <username> <password> getDemandeById <demande_id>
 * php test.php <username> <password> getEtablissementById <etablissement_id>
 * 
 * @author Anastaszor
 */

use PhpExtended\Gmth\GmthApiPrivateEndpoint;
use PhpExtended\Gmth\GmthDataRepository;

global $argv;

if(!isset($argv[1]))
	throw new InvalidArgumentException('The first argument should be the username of the login account.');
if(!isset($argv[2]))
	throw new InvalidArgumentException('The second argument should be the password of the login account.');
if(!isset($argv[3]))
	throw new InvalidArgumentException('The third argument should be the method of the bridge to call.');

$composer = __DIR__.'/vendor/autoload.php';
if(!is_file($composer))
	throw new RuntimeException('You should run composer first.');
require $composer;

$username = trim($argv[1]);
$password = trim($argv[2]);
$method = trim($argv[3]);

if(is_file(__DIR__.'/proxy.txt'))
{
	$proxy = require __DIR__.'/proxy.txt';
	$proxy_hst = $proxy['hostname'];
	$proxy_usr = $proxy['username'];
	$proxy_pwd = $proxy['password'];
}
else
{
	$proxy_hst = null;
	$proxy_usr = null;
	$proxy_pwd = null;
}

class ConsoleLogger extends \Psr\Log\AbstractLogger
{
	
	/**
	 * {@inheritDoc}
	 * @see \Psr\Log\LoggerInterface::log()
	 */
	public function log($level, $message, array $context = array())
	{
		$dt = new DateTime();
		$args = array_map(function($value) { return (string) $value; }, $context);
		$formattedMsg = strtr($message, $args);
		echo '['.$dt->format('H:i:s').']['.str_pad($level, 9, ' ', STR_PAD_BOTH).'] '.$formattedMsg."\n";
	}
	
}

if(is_file(__DIR__.'/cookie.txt'))
	unlink(__DIR__.'/cookie.txt');

$rclass = new ReflectionClass(GmthDataRepository::class);
$rmethod = $rclass->getMethod($method);
if($rmethod === null)
	throw new InvalidArgumentException('The method "'.$method.'" does not exists into the bridge.');

$endpoint = new GmthApiPrivateEndpoint('demandes-gmth.entreprises.gouv.fr', new ConsoleLogger(), __DIR__.'/cookie.txt', $proxy_hst, $proxy_usr, $proxy_pwd);

$endpoint->login($username, $password);

$bridge = new GmthDataRepository($endpoint);

$argcount = count($rmethod->getParameters());
$args = array();
for($i = 0; $i < $argcount; $i++)
{
	if(!isset($argv[4+$i]))
		throw new InvalidArgumentException('The '.(4+$i).'th argument should not be empty.');
	$args[] = $argv[4+$i];
}

$result = call_user_func_array(array($bridge, $method), $args);

var_dump($result);

