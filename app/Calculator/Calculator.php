<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Calculator
{
    protected $operations = [];

    public function setOperation(OperationInterface $operation)
    {
        $this->operations[] = $operation;
    }

    public function getOperations()
    {
        return $this->operations;
    }

    public function setOperations(array $operations)
    {

        /* Before refactoring */
//        foreach ($operations as $index => $operation) {
//            if (!$operation instanceof OperationInterface) {
//                unset($operations[$index]);
//            }
//        }

        /* After refactoring */
        $filteredOperations = array_filter($operations, function ($operation) {
            return $operation instanceof OperationInterface;
        });

        $this->operations = array_merge($filteredOperations, $this->getOperations());
    }

    public function calculate()
    {
        if (count($this->operations) > 1) {
            return array_map(function ($operation) {
                return $operation->calculate();
            }, $this->operations);
        }

        return $this->operations[0]->calculate();
    }
}