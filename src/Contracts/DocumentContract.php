<?php

namespace Tongedev\RfbDocument\Contracts;

interface DocumentContract
{
    public function generate(bool $formatted = true): string;

    public function sanitize(string $documentNumber): string;

    public function format(string $documentNumber): string;

    public function validate(string $documentNumber): bool;
}