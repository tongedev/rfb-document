<?php

namespace Tongedev\RfbDocument;

use Tongedev\RfbDocument\Contracts\DocumentContract;

class CNPJDocument implements DocumentContract
{
    public function generate(bool $formatted = true): string
    {
        return 'teste';
    }

    public function sanitize(string $documentNumber): string
    {
        return str_replace(['.', '-','/'], '', $documentNumber);
    }

    public function format(string $documentNumber): string
    {
        return vsprintf('%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s', str_split($documentNumber));
    }

    public function validate(string $documentNumber): bool
    {
        return true;
    }
}