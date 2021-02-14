<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\BinaryTree;

/**
 * Class Node
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class Node
{
    public $data;

    /**
     * @var Node|null
     */
    public ?Node $left = null;

    /**
     * @var Node|null
     */
    public ?Node $right = null;

    public function __construct($data, ?Node $left = null, ?Node $right = null)
    {
        $this->data = $data;
        $this->left = $left;
        $this->right = $right;
    }
}