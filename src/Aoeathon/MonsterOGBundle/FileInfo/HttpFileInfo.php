<?php

namespace Aoeathon\MonsterOGBundle\FileInfo;

/**
 * class to provide information on a screenshot file stored on a remote server accessible via HTTP
 *
 * @package Aoeathon\MonsterOGBundle\FileInfo
 */
class HttpFileInfo extends AbstractFileInfo {

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @param $url
	 */
	public function __construct($url) {
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

}