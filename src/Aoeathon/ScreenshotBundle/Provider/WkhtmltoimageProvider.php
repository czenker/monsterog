<?php

namespace Aoeathon\ScreenshotBundle\Provider;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class WkhtmltoimageProvider.php
 *
 * @package Aoeathon\ScreenshotBundle\Provider
 */
class WkhtmltoimageProvider {

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
        $fileName = '/tmp/htmltoimg'.rand().'.png';
        $exec = 'wkhtmltoimage --crop-h '.$this->height.' --crop-w '.$this->width.' "'.$this->url.'" '.$fileName;
        system($exec, $output);
        if ($output == 1){
            throw new Exception('cant create image');
        }
        return new \SplFileInfo($fileName);
    }
}