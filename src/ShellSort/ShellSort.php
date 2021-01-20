<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\ShellSort;

/**
 * Class ShellSort
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class ShellSort
{
    /**
     * @var array
     */
    private array $integers;

    /**
     * @var int
     */
    private int   $count;

    public function __construct(array $integers)
    {
        $this->integers = $integers;
        $this->count = count($integers);
    }

    public function __invoke()
    {
        if ([] === $this->integers) {
            return $this->integers;
        }

        if (1 === $this->count) {
            return $this->integers;
        }

        $numbers = $this->integers;

        $recursive = function ($count) use (&$recursive, $numbers) {
            $step = (int) $count / 2;

            for ($i = $step; $i < $count; $i++) {
                $leftIndex = $i - $step;
                $rightIndex = $i;

                while ($leftIndex >= 0 && $numbers[$rightIndex] > $numbers[$leftIndex]) {
                    $temp = $numbers[$leftIndex];
                    $numbers[$leftIndex] = $numbers[$rightIndex];
                    $numbers[$rightIndex] = $temp;

                    $i = $i - $step;
                }
            }
        };

        $recursive($this->count);

        return $this->integers;
    }
}