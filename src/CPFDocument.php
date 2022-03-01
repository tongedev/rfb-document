<?php

namespace Tongedev\RfbDocument;

use Tongedev\RfbDocument\Contracts\DocumentContract;

class CPFDocument implements DocumentContract
{
    public function generate(bool $formatted = false): string
    {
        $prefix = strval(rand(100000000, 999999999));

        $cpf = $this->addVerifyingDigits(str_split($prefix));

        if($formatted) {
            return $this->format($cpf);
        }

        return $cpf;
    }

    public function sanitize(string $documentNumber): string
    {
        return str_replace(['.', '-'], '', $documentNumber);
    }

    public function format(string $documentNumber): string
    {
        return vsprintf('%s.%s.%s-%s', str_split($documentNumber, 3));
    }

    public function validate(string $documentNumber): bool
    {
        $sanitizedCPF = $this->sanitize($documentNumber);

        if(strlen($sanitizedCPF) !== 11) {
            return false;
        }

        $cpfPrefix = substr($sanitizedCPF, 0, 9);

        $cpf = $this->addVerifyingDigits(str_split($cpfPrefix));

        return $cpf === $sanitizedCPF;
    }

    private function addVerifyingDigits(array $documentPrefix): string
    {
        if(count($documentPrefix) === 11) {
            return implode($documentPrefix);
        }

        $sum = 0;
        $multipliers = [10, 9, 8, 7, 6, 5, 4, 3, 2];

        if(count($documentPrefix) === 10) {
            array_unshift($multipliers, 11);
        }

        for ($i = 0; $i < count($multipliers); $i++) {
            $sum += $documentPrefix[$i] * $multipliers[$i];
        }

        $rest = $sum % 11;

        $digit = $rest < 2 ? 0 : 11 - $rest;

        array_push($documentPrefix, $digit);

        if(count($documentPrefix) !== 11) {
            return $this->addVerifyingDigits($documentPrefix);
        }

        return implode($documentPrefix);
    }
}