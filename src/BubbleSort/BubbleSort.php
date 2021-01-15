<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\BubbleSort;

/**
 * Class BubbleSort
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class BubbleSort
{
    /**
     * @var array
     */
    private array $integers;

    public function __construct(array $integers)
    {
        $this->integers = $integers;
    }

    public function __invoke(): array
    {
        if ([] === $this->integers) {
            return $this->integers;
        }

        if (1 === count($this->integers)) {
            return $this->integers;
        }

        $swap = function (&$input, $leftIndex, $rightIndex) {
            $temp = $input[$leftIndex];
            $input[$leftIndex] = $input[$rightIndex];
            $input[$rightIndex] = $temp;
        };

        for ($j = count($this->integers) - 1; $j > 1; $j--) {
            for ($i = 1; $i < count($this->integers); $i++) {
                $previousElement = $this->integers[$i - 1];
                $current = $this->integers[$i];

                if ($current < $previousElement) {
                    $swap($this->integers, $i - 1, $i);
                }
            }
        }

        return $this->integers;
    }
}