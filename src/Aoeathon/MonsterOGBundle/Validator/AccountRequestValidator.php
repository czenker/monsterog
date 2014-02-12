<?php

namespace Aoeathon\MonsterOGBundle\Validator;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;

class AccountRequestValidator extends ConstraintValidator {

	/**
	 * @var array
	 */
	protected $accounts = array(
		'www.aoemedia.de' => array(
			'privateKey' => 'sasaDKSD',
			'publicKey' => '162514ebc691ebe06363df71a880d8306f0c2fb5'
		)
	);

	/**
	 * @param string $account
	 * @param string $privateKey
	 */
	public function addAccount($account, $privateKey) {
		$this->accounts[$account] = array('privateKey' => $privateKey);
	}

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

		$privateKey	= $this->getPrivateKeyForAccount($account);
		if(!$privateKey) {
			$this->context->addViolation("No account found: We did now find your account");
		}

		$isValidImageHostname 		= sha1($imageHostname.$privateKey) === $publicKey;
		if(!$isValidImageHostname) {
			$this->context->addViolation("Invalid key: Do you have a valid account to create this shot?");
		}

		return $isValidImageHostname;
	}

	/**
	 * @param string $account
	 * @return boolean
	 */
	protected function getPrivateKeyForAccount($account) {
		return isset($this->accounts[$account]['privateKey']) ? $this->accounts[$account]['privateKey'] : false;
	}
}