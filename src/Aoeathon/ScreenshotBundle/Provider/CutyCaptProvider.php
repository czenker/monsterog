<?php

namespace Aoeathon\ScreenshotBundle\Provider;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class WkhtmltoimageProvider.php
 *
 * @package Aoeathon\ScreenshotBundle\Provider
 */
class CutyCaptProvider extends AbstractProvider{


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