<?php

namespace Aoeathon\ScreenshotBundle\Provider;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class WkhtmltoimageProvider.php
 *
 * @package Aoeathon\ScreenshotBundle\Provider
 */
abstract class AbstractProvider {
	/**
	 * @var string
	 */
	protected $url;
	/**
	 * @var string
	 */
	protected $height;
	/**
	 * @var string
	 */
	protected $width;

	/**
	 * @param string $height
	 */
	public function setHeight($height) {
		$this->height = $height;
		return $this;
	}

	/**
	 * @param string $width
	 */
	public function setWidth($width) {
		$this->width = $width;
		return $this;
	}

	/**
	 * @param string $url
	 */
	public function setUrl($url) {
		$this->url = $url;
		return $this;
	}

	/**
	 * @return mixed
	 */
	abstract public function getScreenshot();
}