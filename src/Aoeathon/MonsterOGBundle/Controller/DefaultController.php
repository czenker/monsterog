<?php

namespace Aoeathon\MonsterOGBundle\Controller;

use Aoeathon\MonsterOGBundle\FileInfo\HttpFileInfo;
use Aoeathon\MonsterOGBundle\FileInfo\LocalFileInfo;
use Aoeathon\MonsterOGBundle\Service\ScreenshotService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DefaultController extends Controller {

	public function indexAction() {
		$url = $this->getRequest()->query->get('url');
		if(!$url) {
			throw new BadRequestHttpException('Parameter "url" missing in request.');
		}

		// @TODO: validate url

		/** @var ScreenshotService $screenshotService */
		$screenshotService = $this->get('aoeathon_monster_og.screenshot_service');
		$screenshot = $screenshotService->getScreenshotByUrl($url);
		$fileInfo = $screenshot->getFileInfo();

		if($fileInfo instanceof LocalFileInfo) {
//			$response = new Response($fileInfo->getContents());
//			$response->headers->set('Content-Type', 'image/png');
//			return $response;
		} elseif($fileInfo instanceof HttpFileInfo) {
			// @TODO

		}

		throw new \RuntimeException('fileInfo is of unknown class ' . get_class($fileInfo));
	}
}
