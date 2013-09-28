<?php

namespace Aoeathon\MonsterOGBundle\ScreenshotDataStorage;
use Aoeathon\MonsterOGBundle\FileInfo\AbstractFileInfo;
use Aoeathon\MonsterOGBundle\FileInfo\LocalFileInfo;

/**
 * a storage that stores binary data of the screenshots
 *
 * @package Aoeathon\MonsterOGBundle\DataStorage
 */
interface ScreenshotDataStorageInterface {

	/**
	 * @param $identifier string
	 * @param $splFileInfo LocalFileInfo
	 * @return boolean
	 */
	public function store($identifier, $splFileInfo);

	/**
	 * @param $identifier
	 * @return AbstractFileInfo
	 */
	public function fetch($identifier);

}