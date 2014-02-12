<?php

namespace Aoeathon\MonsterOGBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class AccountRequest extends Constraint
{
    public $message = 'Unallowed servie request.';
}
