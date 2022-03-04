<?php

namespace Tongedev\RfbDocument;

use Tongedev\RfbDocument\Exceptions\RfbDocumentException;

abstract class Document
{
    /**
     * document size
     *
     * @var integer
     */
    protected int $size;

    /**
     * document prefix size
     *
     * @var integer
     */
    protected int $prefixSize;

    /**
     * document format pattern
     *
     * @var string
     */
    protected string $format;

    /**
     * sanitized document regex pattern
     *
     * @var string
     */
    protected string $regexMatch;

    /**
     * document prefix range
     *
     * @var array
     */
    protected array $prefixRange;

    /**
     * array of values to weighted sum
     *
     * @var array
     */
    protected array $weithedValues;

    /**
     * additional weith to second verifying digit
     *
     * @var integer
     */
    protected int $additionalWeith;


    /**
     * Generate a new document
     *
     * @param bool $formatted
     * @return string
     */
    public function generate(bool $formatted = false): string
    {
        $prefix = str_split(mt_rand(...$this->prefixRange));

        $cpf = $this->addVerifyingDigits($prefix);

        return $formatted ? $this->format($cpf) : $cpf;
    }

    /**
     * Sanitize a given document
     *
     * @param string $documentNumber
     * @return string
     */
    public function sanitize(string $documentNumber): string
    {
        return str_replace(['.', '-','/'], '', $documentNumber);
    }

    /**
     * Format a given document
     *
     * @param string $documentNumber
     * @return string
     */
    public function format(string $documentNumber): string
    {
        $this->checkDocument($documentNumber);

        return vsprintf($this->format, str_split($documentNumber));
    }

    /**
     * Validate a given document
     *
     * @param string $documentNumber
     * @return bool
     */
    public function validate(string $documentNumber): bool
    {
        $this->checkDocument($documentNumber);

        $sanitizedDocument = $this->sanitize($documentNumber);

        $documentPrefix = substr($sanitizedDocument, 0, $this->prefixSize);

        $validator = $this->addVerifyingDigits(str_split($documentPrefix));

        return $validator === $sanitizedDocument;
    }

    /**
     * Add verifying digits to a given document prefix
     *
     * @param array $documentPrefix
     * @return string
     */
    private function addVerifyingDigits(array $documentPrefix): string
    {
        $sum = 0;
        $multipliers = $this->weithedValues;

        if (count($documentPrefix) === ($this->size - 1)) {
            array_unshift($multipliers, $this->additionalWeith);
        }

        for ($i = 0; $i < count($multipliers); $i++) {
            $sum += $documentPrefix[$i] * $multipliers[$i];
        }

        $rest = $sum % 11;

        $digit = $rest < 2 ? 0 : 11 - $rest;

        array_push($documentPrefix, $digit);

        if (count($documentPrefix) !== $this->size) {
            return $this->addVerifyingDigits($documentPrefix);
        }

        return implode($documentPrefix);
    }

    /**
     * Check if a given document is valid
     *
     * @param string $documentNumber
     * @return void
     * @throws RfbDocumentException
     */
    private function checkDocument(string $documentNumber): void
    {
        $sanitizedDocument = $this->sanitize($documentNumber);

        if (preg_match($this->regexMatch, $sanitizedDocument) !== 1) {
            throw new RfbDocumentException('The given document is invalid.');
        }
    }
}
