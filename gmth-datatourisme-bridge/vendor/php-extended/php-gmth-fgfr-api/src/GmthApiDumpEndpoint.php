<?php

namespace PhpExtended\Gmth;

class GmthApiDumpEndpoint
{
	
	/**
	 * Gets an api dump object from the given file at specified location.
	 * 
	 * @param unknown $fileName
	 * @return \PhpExtended\Gmth\GmthApiDump
	 * @throws \RuntimeException if the file cannot be json-decoded
	 * @throws GmthApiException if the data cannot fit into the models
	 */
	public function getFromFile($fileName)
	{
		if(!is_file($fileName))
			throw new \RuntimeException(strtr('Failed to find file at "{path}".',
				array('{path}' => $fileName)));
		$contents = @file_get_contents($fileName);
		if($contents === false)
			throw new \RuntimeException(strtr('Failed to read file at "{path}".',
				array('{path}' => $fileName)));
		$json = json_decode($contents, true);
		if($json === false)
			throw new \RuntimeException(strtr('Failed to decode json data at "{path}".',
				array('{path}' => $fileName)));
		return new GmthApiDump($json);
	}
	
}
