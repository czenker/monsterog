<?php

namespace Aoeathon\MonsterOGBundle\Service;

use Aoeathon\MonsterOGBundle\Entity\Screenshot;
use Aoeathon\MonsterOGBundle\Entity\ScreenshotRepository;
use Aoeathon\MonsterOGBundle\FileInfo\LocalFileInfo;

class ScreenshotService {

	/**
	 * @var ScreenshotRepository
	 */
	protected $screenshotRepository;

	/**
	 * @var \Aoeathon\ScreenshotBundle\Service\ScreenshotService
	 */
	protected $screenshotService;

	/**
	 * @param ScreenshotRepository $screenshotRepository
	 * @param \Aoeathon\ScreenshotBundle\Service\ScreenshotService $screenshotService
	 */
	public function __construct($screenshotRepository, $screenshotService) {
		$this->screenshotRepository = $screenshotRepository;
		$this->screenshotService = $screenshotService;
	}

	/**
	 * @param string $url an url
	 * @return Screenshot
	 */
	public function getScreenshotByUrl($url) {
		$identifier = $this->getIdentifier($url);

		$screenshot = $this->screenshotRepository->findByIdentifier($identifier);

		if(!$screenshot) {
			$screenshot = $this->createScreenshot($url);
			$this->screenshotRepository->persist($identifier, $screenshot);
		}

		return $screenshot;
	}

	/**
	 * get a unique identifier for the requested resource
	 *
	 * @param $url
	 * @return string
	 */
	protected function getIdentifier($url) {
		// @TODO sorting of query string
		return md5($url);
	}

	/**
	 * @param $url
	 * @return Screenshot
	 */
	protected function createScreenshot($url) {
		$splFileInfo = $this->screenshotService->createPngScreenshotFromUrl($url);

		$localFileInfo = new LocalFileInfo($splFileInfo->getRealPath());
		$screenshotObject = new Screenshot();
		$screenshotObject->setFileInfo($localFileInfo);

		return $screenshotObject;
	}
}