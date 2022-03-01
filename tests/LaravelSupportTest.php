<?php

use Orchestra\Testbench\TestCase;
use Tongedev\RfbDocument\CNPJDocument;
use Tongedev\RfbDocument\CPFDocument;
use Tongedev\RfbDocument\Facades\CNPJ;
use Tongedev\RfbDocument\Facades\CPF;
use Tongedev\RfbDocument\RfbDocumentServiceProvider;

class LaravelSupportTest extends TestCase
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

    /** @test */
    public function should_validate_a_CPF_using_facade()
    {
        $cpf = CPF::generate(true);

        $result = CPF::validate($cpf);

        $this->assertTrue($result);
    }

    /** @test */
    public function should_validate_a_CNPJ_using_facade()
    {
        $cpf = CNPJ::generate(true);

        $result = CNPJ::validate($cpf);

        $this->assertTrue($result);
    }
}