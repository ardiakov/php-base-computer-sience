<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\Tests\BinaryTree;

use Ardiakov\PhpBase\BinaryTree\Tree;
use PHPUnit\Framework\TestCase;

/**
 * Class TestBinaryTree
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class TestBinaryTree extends TestCase
{
    public function test(): void
    {
        $tree = new Tree();
        $tree
            ->add(5)
            ->add(15)
            ->add(3)
            ->add(25);

        print_r($tree->root);
    }
}