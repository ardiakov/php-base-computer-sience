<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\InsertionSort;

/**
 * Class InsertionSort
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class InsertionSort
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

        for($i = 1; $i < count($this->integers); $i++) {
            $current = $this->integers[$i];

            $j = $i - 1;
            while ($j !== 0 && $current > $this->integers[$j]) {
                $temp = $this->integers[$j];
                $this->integers[$j] = $current;
                $this->integers[$i] = $temp;

                $j--;
            }
        }

        return $this->integers;
    }
}