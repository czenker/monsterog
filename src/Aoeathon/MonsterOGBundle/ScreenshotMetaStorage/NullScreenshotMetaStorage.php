<?php

namespace Aoeathon\MonsterOGBundle\ScreenshotMetaStorage;
use Aoeathon\MonsterOGBundle\Entity\Screenshot;

/**
 * a storage to store which screenshots are available
 *
 * @package Aoeathon\MonsterOGBundle\DataStorage
 */
class NullScreenshotMetaStorage implements ScreenshotMetaStorageInterface {

	/**
	 * @param $identifier string
	 * @param $screenshotObject Screenshot
	 * @return boolean
	 */
	public function storeMeta($identifier, $screenshotObject) {
		return TRUE;
	}

	/**
	 * @param $identifier string
	 * @return Screenshot
	 */
	public function fetchMeta($identifier) {
		return NULL;
	}

	/**
	 * @param $identifier string
	 * @return boolean
	 */
	public function has($identifier) {
		return FALSE;
	}

}