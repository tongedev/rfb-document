<?php

use Tongedev\RfbDocument\Facades\CPF;
use Tongedev\RfbDocument\Facades\CNPJ;
use Tongedev\RfbDocument\Tests\LaravelTestCase;

uses(LaravelTestCase::class);

it('should validate a CPF using facade', function () {
    $cpf = CPF::generate(true);

    expect(CPF::validate($cpf))->toBeTrue();
});

it('should validate a CNPJ using facade', function () {
    $cnpj = CNPJ::generate(true);

    expect(CNPJ::validate($cnpj))->toBeTrue();
});
