<?php

/**
 * This script is to test the private endpoint.
 * 
 * Usage :
 * php test.php <username> <password> getBootInformation 0
 * php test.php <username> <password> getModelesGrilleCandidature 0
 * php test.php <username> <password> getModelesGrilleEvaluation 0
 * php test.php <username> <password> getConstantes 0
 * php test.php <username> <password> getActivites 0
 * php test.php <username> <password> getCategories 0
 * php test.php <username> <password> getEtats 0
 * php test.php <username> <password> getTypeClassements 0
 * php test.php <username> <password> getTypeDemandes 0
 * php test.php <username> <password> getTypePieceJointes 0
 * php test.php <username> <password> getAvisDecisions 0
 * php test.php <username> <password> getRegions 0
 * php test.php <username> <password> getDepartements 0
 * php test.php <username> <password> getCivilites 0
 * php test.php <username> <password> getCommunes 0
 * php test.php <username> <password> getDemande <demandeid> 0
 * php test.php <username> <password> getEtablissement <etablissementid> 0
 * php test.php <username> <password> getFichier <fichierid> 0
 * 
 * @author Anastaszor
 */

use PhpExtended\Gmth\GmthApiPrivateEndpoint;

global $argv;

if(!isset($argv[1]))
	throw new InvalidArgumentException('The first argument should be the username of the login account.');
if(!isset($argv[2]))
	throw new InvalidArgumentException('The second argument should be the password of the login account.');
if(!isset($argv[3]))
	throw new InvalidArgumentException('The third argument should be the method of the endpoint to call.');

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

$rclass = new ReflectionClass(GmthApiPrivateEndpoint::class);
$rmethod = $rclass->getMethod($method);
if($rmethod === null)
	throw new InvalidArgumentException('The method "'.$method.'" does not exists into the endpoint.');

$endpoint = new GmthApiPrivateEndpoint('demandes-gmth.entreprises.gouv.fr', new ConsoleLogger(), __DIR__.'/cookie.txt', $proxy_hst, $proxy_usr, $proxy_pwd);

$endpoint->login($username, $password);

$argcount = count($rmethod->getParameters());
$args = array();
for($i = 0; $i < $argcount; $i++)
{
	if(!isset($argv[4+$i]))
		throw new InvalidArgumentException('The '.(4+$i).'th argument should not be empty.');
	$args[] = $argv[4+$i];
}

$result = call_user_func_array(array($endpoint, $method), $args);

var_dump($result);
