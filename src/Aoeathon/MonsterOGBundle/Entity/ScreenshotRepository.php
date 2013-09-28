<?php

namespace Aoeathon\MonsterOGBundle\Entity;

use Aoeathon\MonsterOGBundle\ScreenshotDataStorage\ScreenshotDataStorageInterface;
use Aoeathon\MonsterOGBundle\ScreenshotMetaStorage\ScreenshotMetaStorageInterface;

class ScreenshotRepository {

	/**
	 * @var ScreenshotDataStorageInterface
	 */
	protected $screenshotDataStorage;

	/**
	 * @var ScreenshotMetaStorageInterface
	 */
	protected $screenshotMetaStorage;

	public function __construct($screenshotDataStorage, $screenshotMetaStorage) {
		$this->screenshotDataStorage = $screenshotDataStorage;
		$this->screenshotMetaStorage = $screenshotMetaStorage;
	}

	/**
	 * find a screenshot object or return null if not found
	 *
	 * @param $identifier string
	 * @return Screenshot|null
	 */
	public function findByIdentifier($identifier) {
		if(!$this->screenshotMetaStorage->has($identifier)) {
			return null;
		}

		$screenshot = $this->screenshotMetaStorage->fetch($identifier);
		$screenshot->setFileInfo($this->screenshotDataStorage->fetch($identifier));

		return $screenshot;
	}

	/**
	 * @param $identifier string
	 * @param $screenshotObject Screenshot
	 */
	public function persist($identifier, $screenshotObject) {
		// @TODO
	}
}