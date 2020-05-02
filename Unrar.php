#!/usr/bin/php
<?php

namespace Synology\DirectoryUtility;

class Unrar
{

	private $indexFilePattern = ".sfv";
	
	private $isComplete = false;
	
	private $dirToScan;
	
	private $indexFile;
	
	private $rarFiles = [];
	
	public function __construct($dirToScan)
	{
		$this->dirToScan 	= rtrim($dirToScan, DIRECTORY_SEPARATOR);
		$this->checkDir();
	}
	
	private function checkDir()
	{
		if (!is_dir($this->dirToScan)) {
			throw new \Exception(sprintf('\'%s\' not is a valid dir', $this->dirToScan));
		}
		$dirIterator = new \DirectoryIterator($this->dirToScan);

		$sfvFound = false;
		foreach ($dirIterator as $item) {
			if ($item->isDot() || $item->isDir()) continue;
			if (strpos($item->getFilename(), $this->indexFilePattern) !== false) {
				$sfvFound = true;
				$this->indexFile = $item->getPathName();
				break;
			}
		}
		if ($sfvFound) {
			//var_dump($this->indexFile);
			$temp = explode("\n", file_get_contents($this->indexFile));
			//preg_match("/^(?P<file>.*\.r\d{1,3})\s(?P<hash>[a-h0-9]*)$/", $input_line, $output_array);
			foreach ($temp as $line) {
				if (strlen(trim($line)) == 0 ) continue;
				$detail = (explode(" ", $line));
				$this->rarFiles[trim($detail[1])] = $this->dirToScan.DIRECTORY_SEPARATOR.trim($detail[0]);
			}
		}

		if (count($this->rarFiles) == 0) {
			$this->isComplete = false;
			return;
		}
		$fileExistence = true;
		
		foreach ($this->rarFiles as $crcHex => $file) {
			//echo "$file\n";
			if (!is_file($file)) {
				var_dump("xxx-->".$file);
				$fileExistence = false;
				break;
			}
		}
		$isComplete = true;
		if ($fileExistence) {
			foreach ($this->rarFiles as $crcHex => $file) {
				if (!$this->crcIsValid($crcHex, $file)) {
					$isComplete = false;
					
					break;
				}
			}
		}
		//var_dump($fileExistence);
		//var_dump($isComplete);
		$this->isComplete = $fileExistence && $isComplete;
	}
	
	private function crcIsValid($hexa, $file)
	{
		echo "file: $file\n";
		$founded =  str_pad ( \dechex($this->getCrc($file)), 8, $pad_string = "0", STR_PAD_LEFT);
		echo sprintf("found :%s = %s", $founded, $hexa)."\n";
		return $founded == $hexa;
	}
	
	private function getCrc($file) 
	{
		$file_string = file_get_contents($file); 
		$crc = crc32($file_string); 
		unset($file_string);
		return sprintf("%s", $crc); 
	}
	
	public function isComplete() {
		return $this->isComplete;
	}
	
	public function run()
	{
		$file = end($this->rarFiles);
		$cmd = sprintf("unrar x -y %s %s > /dev/null", $file, $this->dirToScan);
		
		$return_var;
		echo $cmd."\n";
		$buff = system ( $cmd, $return_var );
		
		if( $return_var == 0) {
			foreach ($this->rarFiles as $file) {
				echo "Remove $file \n";
				unlink($file);
			}
			unlink($this->indexFile);
		}
	}
	public function containRar()
	{
		return count($this->rarFiles) > 0;
	}
	
}

$cdw = is_dir($argv[1]) ? $argv[1] : dirname(__FILE__);
ini_set('memory_limit', '-1');
$unraredDir = new Unrar($cdw);
if ($unraredDir->containRar()) {
	if ($unraredDir->isComplete()) {
		$unraredDir->run();
	} else {
		echo "$cdw is not complete\n";
	}
} else {
	//echo "$cdw Doesn't contain rar files\n";
}
//$history->write();
