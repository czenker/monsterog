<?php

namespace Aoeathon\MonsterOGBundle\ScreenshotStorage;

use Aoeathon\MonsterOGBundle\Entity\Screenshot;
use Aoeathon\MonsterOGBundle\FileInfo\AbstractFileInfo;
use Aoeathon\MonsterOGBundle\FileInfo\LocalFileInfo;
use Aoeathon\MonsterOGBundle\ScreenshotDataStorage\ScreenshotDataStorageInterface;
use Aoeathon\MonsterOGBundle\ScreenshotMetaStorage\ScreenshotMetaStorageInterface;
use Symfony\Component\Filesystem\Filesystem;

class FilesystemScreenshotStorage implements ScreenshotDataStorageInterface, ScreenshotMetaStorageInterface {

	/**
	 * @var string
	 */
	protected $basePath;

	public function __construct($basePath) {
		if(!file_exists($basePath)) {
			throw new \InvalidArgumentException(sprintf(
				'Path "%s" does not exist.',
				$basePath
			));
		}
		if(!is_dir($basePath)) {
			throw new \InvalidArgumentException(sprintf(
				'Path "%s" is no directory',
				$basePath
			));
		}
		if(!is_writable($basePath)) {
			throw new \InvalidArgumentException(sprintf(
				'Path "%s" is not writable',
				$basePath
			));
		}
		$this->basePath = $basePath;
	}

	/**
	 * @param $identifier string
	 * @param $splFileInfo LocalFileInfo
	 * @return boolean
	 */
	public function storeData($identifier, $splFileInfo) {
		$filesystem = new Filesystem();
		$filesystem->copy($splFileInfo->getAbsoluteFilePath(), $this->getFilePath($identifier), TRUE);
	}

	/**
	 * @param $identifier
	 * @return AbstractFileInfo
	 */
	public function fetchData($identifier) {
		return new LocalFileInfo($this->getFilePath($identifier));
	}


	/**
	 * @param $identifier string
	 * @param $screenshotObject Screenshot
	 * @return boolean
	 */
	public function storeMeta($identifier, $screenshotObject)
	{
		return TRUE;
	}

	/**
	 * @param $identifier string
	 * @return Screenshot
	 */
	public function fetchMeta($identifier)
	{
		return new Screenshot();
	}

	/**
	 * @param $identifier string
	 * @return boolean
	 */
	public function has($identifier) {
		return file_exists($this->getFilePath($identifier));
	}

	/**
	 * @param $identifier string
	 * @return string
	 */
	protected function getFilePath($identifier) {
		return $this->basePath . DIRECTORY_SEPARATOR . $identifier;
	}
}