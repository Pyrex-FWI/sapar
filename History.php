#!/usr/bin/php
<?php

namespace Synology\DirectoryUtility;

class History
{

	CONST ORDER_BY_DIR_NAME_ASC 	= 1;
	CONST ORDER_BY_DIR_NAME_DESC	= 2;
	CONST ORDER_BY_DIR_DATE_ASC		= 3;
	CONST ORDER_BY_DIR_DATE_DESC	= 4;
	
	CONST MAX_DATE = '2 month';
	
	private $dirToScan;
	
	private $outputFileName;
	
	private $itemsIterator = [];
	
	private $minTimestamp;
	
	public function __construct($dirToScan, $outputFileName = 'history.txt')
	{
		$this->dirToScan 	= $dirToScan;
		$this->outputFileName 	= $outputFileName;
		$this->checkDir();
		$this->minTimestamp = (new \DateTime())->modify(sprintf('- %s', self::MAX_DATE))->getTimestamp();
	}
	
	private function checkDir()
	{
		if (!is_dir($this->dirToScan)) {
			throw new \Exception(sprintf('\'%s\' not is a valid dir', $this->dirToScan));
		}
	}
	
	public function run()
	{
		$this->buildIterator();
		$this->mergeCurrentHistory();
		//var_dump($this->itemsIterator);
		$this->filter();
		echo $this->__toString();
	}
	
	public function mergeCurrentHistory()
	{
		if (is_file($this->outputFile)) {
			$handler = fopen($this->outputFile, 'r');
			while (($buffer = fread($handler, 2048))  != EOF) {
				$dateDir = explode("\t", $buffer);
				$this->itemsIterator[trim($dateDir[1])] = trim($dateDir[0]);
			}
			fclose($handler);
		}
	}
	
	public function filter()
	{
		ksort($this->itemsIterator);
		//var_dump(count($this->itemsIterator));
		foreach($this->itemsIterator as $CTime => &$getPathname) {
			//echo $item->getCTime() .' >= '. $this->minTimestamp . " ";
			//var_dump($CTime >= $this->minTimestamp);
			if ($CTime >= $this->minTimestamp) {
				unset($getPathname);
			}
		}
		//var_dump(count($this->itemsIterator));
	}
	
	public function buildIterator()
	{
		$dirIterator = new \DirectoryIterator($this->dirToScan);
		foreach ($dirIterator as $item) {
			if ($item->isDot() || $item->isFile()) continue;
			$this->itemsIterator[$item->getFilename()] = $item->getCTime();
		}
		
	}
	
	public function __toString()
	{
		$string = '';
		foreach($this->itemsIterator as $CTime => $pathName) {
			$string .=  sprintf("%s\t %s", $pathName, $CTime). "\n";
		}
		return $string;
	}
	
	public function write()
	{
		$buffer = $this->__toString();
		file_put_contents($this->dirToScan.DIRECTORY_SEPARATOR.$this->outputFileName, $buffer);
	}
}

$cdw = is_dir($argv[1]) ? $argv[1] : dirname(__FILE__);

$history = new History($cdw);
$history->run();
$history->write();
