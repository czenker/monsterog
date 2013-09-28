<?php

namespace Aoeathon\ScreenshotBundle\Service;
use Aoeathon\ScreenshotBundle\Provider\WkhtmltoimageProvider;

/**
 * Class ScreenshotService
 *
 * @package Aoeathon\ScreenshotBundle\Service
 */
class ScreenshotService {

	/**
	 * width of the screenshot to create
	 *
	 * @var int
	 */
	protected $defaultWidth = 1240;

	/**
	 * $height of the screenshot to create
	 *
	 * @var int
	 */
	protected $defaultHeight = 860;

	/**
	 * @param int|null $defaultWidth
	 * @param int|null $defaultHeight
	 */
	public function __construct($defaultWidth = NULL, $defaultHeight = NULL) {
		if($defaultHeight) $this->defaultHeight = $defaultHeight;
		if($defaultWidth)  $this->defaultWidth  = $defaultWidth;
	}

	/**
	 * return a file that contains a screenshot from the given url
	 *
	 * @param string $url an url to take a screenshot of
	 * @param int|null $width
	 * @param int|null $height
	 * @return \SplFileInfo
	 */
	public function createPngScreenshotFromUrl($url, $width = NULL, $height = NULL) {
		$width = $width ?: $this->defaultWidth;
		$height = $height ?: $this->defaultHeight;

		// @TODO
        $provider = new WkhtmltoimageProvider;
        $provider
            ->setHeight($height)
            ->setWidth($width)
            ->setUrl($url);
		return $provider->getScreenshot();
	}
}