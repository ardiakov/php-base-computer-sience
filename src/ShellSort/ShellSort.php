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

        $recursive = function ($count) use (&$recursive) {
            $step = (int) ($count / 2);

            for ($i = $step; $i < $this->count; $i++) {
                $leftIndex = $i - $step;
                $rightIndex = $i;

                while ($leftIndex >= 0 && $this->integers[$leftIndex] > $this->integers[$rightIndex]) {
                    $temp = $this->integers[$leftIndex];
                    $this->integers[$leftIndex] = $this->integers[$rightIndex];
                    $this->integers[$rightIndex] = $temp;

                    $leftIndex -= $step;
                    $rightIndex -= $step;
                }
            }

            if ($step >= 1) {
                $recursive($step);
            }
        };

        $recursive($this->count);

        return $this->integers;
    }
}