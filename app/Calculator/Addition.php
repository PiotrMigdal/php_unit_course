<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Addition implements OperationInterface
{

    /**
     * @var array
     */
    private $operands;

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }

    /**
     * @throws NoOperandsException
     */
    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOperandsException();
        }
        return array_sum($this->operands);
    }
}