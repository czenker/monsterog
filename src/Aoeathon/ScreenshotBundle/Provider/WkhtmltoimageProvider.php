<?php

namespace Aoeathon\ScreenshotBundle\Provider;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class WkhtmltoimageProvider.php
 *
 * @package Aoeathon\ScreenshotBundle\Provider
 */
class WkhtmltoimageProvider extends AbstractProvider{

    /**
     * @return \SplFileInfo
     */
    public function getScreenshot(){
        $fileName = '/tmp/htmltoimg'.rand().'.png';
        $exec = 'xvfb-run --server-args="-screen 0, '.$this->width.'x'.$this->height.'x24" wkhtmltoimage --use-xserver "'.$this->url.'" '.$fileName;

        exec(escapeshellcmd ( $exec ), $output);

        if ($output == 1){
            throw new Exception('cant create image');
        }

        return new \SplFileInfo($fileName);
    }
}