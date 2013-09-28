<?php

namespace Aoeathon\MonsterOGBundle\ScreenshotMetaStorage;
use Aoeathon\MonsterOGBundle\Entity\Screenshot;

/**
 * a storage to store which screenshots are available
 *
 * @package Aoeathon\MonsterOGBundle\DataStorage
 */
interface ScreenshotMetaStorageInterface {

	/**
	 * @param $identifier string
	 * @param $screenshotObject Screenshot
	 * @return boolean
	 */
	public function storeMeta($identifier, $screenshotObject);

	/**
	 * @param $identifier string
	 * @return Screenshot
	 */
	public function fetchMeta($identifier);

	/**
	 * @param $identifier string
	 * @return boolean
	 */
	public function has($identifier);

}