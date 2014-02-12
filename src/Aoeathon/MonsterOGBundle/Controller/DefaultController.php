<?php

namespace Aoeathon\MonsterOGBundle\Controller;

use Aoeathon\MonsterOGBundle\FileInfo\HttpFileInfo;
use Aoeathon\MonsterOGBundle\FileInfo\LocalFileInfo;
use Aoeathon\MonsterOGBundle\Service\ScreenshotService;
use Aoeathon\MonsterOGBundle\Validator;
use Aoeathon\MonsterOGBundle\Validator\AccountRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class DefaultController extends Controller {

	public function indexAction(Request $request) {
		$accountRequestConstraint = $this->get('aoeathon_monster_og.request_validator_constraint');
		$errorList = $this->get('validator')->validateValue($request,$accountRequestConstraint);

		if (count($errorList) == 0) {
			/** @var ScreenshotService $screenshotService */
			$screenshotService 	= $this->get('aoeathon_monster_og.screenshot_service');
			$url 				= $this->getRequest()->query->get('url');
			$screenshot 		= $screenshotService->getScreenshotByUrl($url);
			$fileInfo 			= $screenshot->getFileInfo();

			if($fileInfo instanceof LocalFileInfo) {
				$response = new Response($fileInfo->getContents());
				$response->headers->set('Content-Type', 'image/png');
				$response->headers->set('Content-Length',strlen($fileInfo->getContents()));
				return $response;
			} elseif($fileInfo instanceof HttpFileInfo) {
				// @TODO
			}

			throw new \RuntimeException('fileInfo is of unknown class ' . get_class($fileInfo));
		} else {
			$errorMessage = $errorList[0]->getMessage();
			throw new \Exception($errorMessage);
		}
	}
}
