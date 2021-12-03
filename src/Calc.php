<?php

namespace App;

class Calc
{
    public const SUM_OPERATION = '+';
    public const SUB_OPERATION = '-';
    public const MULTIPLY_OPERATION = '*';
    public const DIVIDE_OPERATION = '/';
    public const AVAILABLE_OPERATIONS = [
        self::SUM_OPERATION,
        self::SUB_OPERATION,
        self::MULTIPLY_OPERATION,
        self::DIVIDE_OPERATION
    ];

    public static function calculate(float $firstNumber, string $operation, float $secondNumber): float
    {
        switch ($operation) {
            case self::SUM_OPERATION:
                $solution = $firstNumber + $secondNumber;
                break;
            case self::SUB_OPERATION:
                $solution = $firstNumber - $secondNumber;
                break;
            case self::MULTIPLY_OPERATION:
                $solution = $firstNumber * $secondNumber;
                break;
            default:
                $solution = $firstNumber / $secondNumber;
                break;
        }

        return $solution;
    }

    public static function validateOperation(string $operation, float $secondNumber): array
    {
        $errors = [];

        if ($secondNumber == 0 && $operation == self::DIVIDE_OPERATION) {
            $errors[] = 'Сan not be divided by zero';
        }

        if (!in_array($operation, self::AVAILABLE_OPERATIONS)) {
            $errors[] = 'Operation is not valid';
        }

        return $errors;
    }
}
