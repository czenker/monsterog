<?php

namespace Aoeathon\MonsterOGBundle\FileInfo;

/**
 * class to provide information on a screenshot file stored on the local filesystem
 *
 * @package Aoeathon\MonsterOGBundle\FileInfo
 */
class LocalFileInfo extends AbstractFileInfo {

	/**
	 * @var string
	 */
	protected $absoluteFilePath;

	/**
	 * @param $absoluteFilePath
	 */
	public function __construct($absoluteFilePath) {
		$this->absoluteFilePath = $absoluteFilePath;
	}

	/**
	 * get the files content
	 *
	 * @return string
	 */
	public function getContents() {
		return file_get_contents($this->absoluteFilePath);
	}

	/**
	 * @return string
	 */
	public function getAbsoluteFilePath() {
		return $this->absoluteFilePath;
	}


}