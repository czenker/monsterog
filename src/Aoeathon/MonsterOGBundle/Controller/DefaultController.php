<?php

namespace Aoeathon\MonsterOGBundle\Controller;

use Aoeathon\ScreenshotBundle\Service\ScreenshotService;
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
		$screenshotService = $this->get('aoeathon_screenshot.screenshot_service');

		// @TODO: caching

		$file = $screenshotService->createPngScreenshotFromUrl($url);

		$response = new Response(file_get_contents($file->getRealPath()));
		$response->headers->set('Content-Type', 'image/png');
		return $response;
	}
}
