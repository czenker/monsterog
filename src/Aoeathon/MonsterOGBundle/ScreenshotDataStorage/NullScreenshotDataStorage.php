<?php

namespace Aoeathon\MonsterOGBundle\ScreenshotDataStorage;
use Aoeathon\MonsterOGBundle\FileInfo\AbstractFileInfo;
use Aoeathon\MonsterOGBundle\FileInfo\LocalFileInfo;

class NullScreenshotDataStorage implements ScreenshotDataStorageInterface {

	/**
	 * @param $identifier string
	 * @param $splFileInfo LocalFileInfo
	 * @return boolean
	 */
	public function storeData($identifier, $splFileInfo) {
		return TRUE;
	}

	/**
	 * @param $identifier
	 * @return AbstractFileInfo
	 */
	public function fetchData($identifier) {
		return NULL;
	}

}