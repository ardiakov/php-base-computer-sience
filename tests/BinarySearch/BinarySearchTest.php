<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\Tests\BinarySearch;

use Ardiakov\PhpBase\BinarySearch\BinarySearch;
use PHPUnit\Framework\TestCase;

/**
 * Class BinarySearchTest
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class BinarySearchTest extends TestCase
{
    /**
     * Проверка при передаче пустого массива
     */
    public function testEmptyArray(): void
    {
        $searchResult = (new BinarySearch([]))(85);

        $this->assertEquals(null, $searchResult);
    }

    /**
     * Проверка при передаче массива состоящего из одного элемента
     */
    public function testWithOneElementOfArray(): void
    {
        $searchResult = (new BinarySearch([13]))(85);
        $this->assertEquals(null, $searchResult);

        $searchResult = (new BinarySearch([85]))(85);
        $this->assertEquals(85, $searchResult);
    }

    public function testSearch(): void
    {
        $searchResult = (new BinarySearch([5,15,24,32,64,73,85]))(85);

        $this->assertEquals(85, $searchResult);
    }
}