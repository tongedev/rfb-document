<?php

namespace Tongedev\RfbDocument\Tests;

use \Orchestra\Testbench\TestCase as OrchestraTestCase;
use Tongedev\RfbDocument\CNPJDocument;
use Tongedev\RfbDocument\CPFDocument;
use Tongedev\RfbDocument\RfbDocumentServiceProvider;

class LaravelTestCase extends OrchestraTestCase
{
    public function getPackageProviders($app)
    {
        return [
            RfbDocumentServiceProvider::class,
        ];
    }

    public function getPackageAliases($app)
    {
        return [
            'CPF' => CPFDocument::class,
            'CNPJ' => CNPJDocument::class,
        ];
    }
}
