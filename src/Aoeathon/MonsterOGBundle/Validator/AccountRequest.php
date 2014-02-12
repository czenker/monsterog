<?php

namespace Aoeathon\MonsterOGBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class AccountRequest extends Constraint{

	/**
	 * @var string
	 */
	public $message = 'Unallowed servie request.';

	/**
	 * @var array
	 */
	protected $accounts = array();

	/**
	 * @param $accounts
	 */
	public function setAccounts($accounts) {
		$this->accounts = $accounts;
	}

	/**
	 * @param string $account
	 * @return boolean
	 */
	public function getPrivateKeyForAccount($account) {
		return isset($this->accounts[$account]['privateKey']) ? $this->accounts[$account]['privateKey'] : false;
	}
}
