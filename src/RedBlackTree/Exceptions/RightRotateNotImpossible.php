<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\RedBlackTree\Exceptions;

use Exception;

/**
 * Class RightRotateNotImpossible
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class RightRotateNotImpossible extends Exception
{
    protected $message = 'Left child doesnt exists. Right rotate impossible.';
}