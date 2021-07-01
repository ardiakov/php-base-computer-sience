<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\RedBlackTree\Exceptions;

use Exception;

/**
 * Class RootMustBeBlack
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class BlackHeightInvalid extends Exception
{
    protected $message = 'Black height invalid.';
}