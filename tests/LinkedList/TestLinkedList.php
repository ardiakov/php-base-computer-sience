<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\Tests\LinkedList;

use Ardiakov\PhpBase\LinkedList\LinkedList;
use PHPUnit\Framework\TestCase;

/**
 * Class TestLinkedList
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class TestLinkedList extends TestCase
{
    public function testCreate(): void
    {
        $linkedList = new LinkedList();

        $linkedList->addNode(10);
        $linkedList->addNode(16);
        $linkedList->addNode(20);

        $this->assertEquals([20, 16, 10], $linkedList->displayData());
        $this->assertEquals(3, $linkedList->counter());
    }
}