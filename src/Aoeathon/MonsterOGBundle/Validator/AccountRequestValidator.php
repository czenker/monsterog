<?php

namespace Aoeathon\MonsterOGBundle\Validator;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;

class AccountRequestValidator extends ConstraintValidator {

	/**
	 * @param Request $request
	 * @param Constraint $constraint
	 *
	 * @throws \InvalidArgumentException
	 * @return boolean
	 */
	public function validate($request,Constraint $constraint) {
		$account			= $request->query->get('account');
		$publicKey			= $request->query->get('key');
		$imageUrl			= $request->query->get('url');
		$imageUrlArray 		= parse_url($imageUrl);
		$imageHostname 		= isset($imageUrlArray['host']) ? $imageUrlArray['host'] : false;

		if(!$imageHostname) {
			$this->context->addViolation("No image hostname found");
		}

		$privateKey	= $constraint->getPrivateKeyForAccount($account);
		if(!$privateKey) {
			$this->context->addViolation("No account found: We did now find your account");
		}

		$isValidImageHostname 		= sha1($imageHostname.$privateKey) === $publicKey;
		if(!$isValidImageHostname) {
			$this->context->addViolation("Invalid key: Do you have a valid account to create this shot?");
		}

		return $isValidImageHostname;
	}
}