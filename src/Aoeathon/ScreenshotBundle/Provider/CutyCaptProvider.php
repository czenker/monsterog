<?php

namespace Aoeathon\ScreenshotBundle\Provider;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class WkhtmltoimageProvider.php
 *
 * @package Aoeathon\ScreenshotBundle\Provider
 */
class CutyCaptProvider {

    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $height;
    /**
     * @var string
     */
    private $width;

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
     * @return \SplFileInfo
     */
    public function getScreenshot(){
        $fileName = '/tmp/cutycapt'.rand().'.png';
		$resolution          = $this->width."x".$this->height."x24";
		$exec               = 'xvfb-run --server-args="-screen 0, '.$resolution.'" CutyCapt --url='.$this->url.' --out='.$fileName;

        exec($exec, $output);
        if ($output == 1){
            throw new Exception('cant create image');
        }
        return new \SplFileInfo($fileName);
    }
}