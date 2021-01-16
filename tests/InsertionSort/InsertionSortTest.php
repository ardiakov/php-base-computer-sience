<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\Tests\InsertionSort;

use Ardiakov\PhpBase\InsertionSort\InsertionSort;
use PHPUnit\Framework\TestCase;

/**
 * Class InsertionSortTest
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class InsertionSortTest extends TestCase
{
    public function testWithEmptyArray(): void
    {
        $integers = [];
        $sort = (new InsertionSort($integers))();

        $this->assertEquals($integers, $sort);
    }

    public function testWithOneElement(): void
    {
        $integers = [1];
        $sort = (new InsertionSort($integers))();

        $this->assertEquals($integers, $sort);
    }

    public function testSort(): void
    {
        $integers = [77, 99, 44, 55, 22, 88, 11, 0, 66, 33];
        $sort = (new InsertionSort($integers))();

        $this->assertEquals([0, 11, 22, 33, 44, 55, 66, 77, 88, 99], $sort);
    }
}