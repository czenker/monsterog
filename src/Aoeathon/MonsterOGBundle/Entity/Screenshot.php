<?php

namespace Aoeathon\MonsterOGBundle\Entity;

use Aoeathon\MonsterOGBundle\FileInfo\AbstractFileInfo;

class Screenshot {

	/**
	 * @var AbstractFileInfo
	 */
	protected $fileInfo;

	/**
	 * @param \Aoeathon\MonsterOGBundle\FileInfo\AbstractFileInfo $fileInfo
	 */
	public function setFileInfo($fileInfo) {
		$this->fileInfo = $fileInfo;
	}

	/**
	 * @return \Aoeathon\MonsterOGBundle\FileInfo\AbstractFileInfo
	 */
	public function getFileInfo() {
		return $this->fileInfo;
	}



}