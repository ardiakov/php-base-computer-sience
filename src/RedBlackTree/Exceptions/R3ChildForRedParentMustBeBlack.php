<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\RedBlackTree\Exceptions;

use Exception;

/**
 * Class RootMustBeBlack
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class R3ChildForRedParentMustBeBlack extends Exception
{
    protected $message = 'Childs for red parent must be black.';
}