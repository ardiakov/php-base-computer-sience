<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\RedBlackTree\Exceptions;

use Exception;

/**
 * Class RootMustBeBlack
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class R2RootMustBeBlack extends Exception
{
    protected $message = 'Root must be black.';
}